<?php
    class User extends CI_Controller{
        public function register(){
            $data['title'] = '註冊';

            $this->form_validation->set_rules('firstname', 'Name', 'required');
            $this->form_validation->set_rules('username', 'UserName', 'callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');


            if($this->form_validation->run() === FALSE){
              $this->load->view('templates/header');
              $this->load->view('users/register', $data);
              $this->load->view('templates/footer');
            } else {
                $enc_passowrd = md5($this->input->post('password'));

                $this->user_model->register($enc_passowrd);

                $this->session->set_flashdata('user_registered', '你已經成功註冊，可以登入了');

                redirect('user/login');
            }

        }

/*
        public function login(){
            $data['title'] = '登入';

            $this->form_validation->set_rules('username', 'UserName', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
              $this->load->view('templates/header');
              $this->load->view('users/login', $data);
              $this->load->view('templates/footer');
            } else {
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));

                $userData = $this->user_model->login($username, $password);

                if($userData){
                    $user_data = array(
                      'user_id'  => $userData->user_id,
                      'first'  => $userData->first,
                      'Username' => $userData->Username,
                      'email'  => $userData->email,
                      'created_at' => $userData->created_at,
                      'Level'  => $userData->Level,
                      'logged_in' => true,
                    );

                    $this->session->set_userdata($user_data);

                    $this->session->set_flashdata('user_loggedin', '成功登入');

                    redirect('searchs/index');


                } else {
                  $this->session->set_flashdata('login_failed', '登入失敗');
                    redirect('users/login');
    }
   }
}*/



       public function login(){
            $data['title'] = '登入';

            $this->form_validation->set_rules('username', 'UserName', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
              $this->load->view('templates/header');
              $this->load->view('users/login', $data);
              $this->load->view('templates/footer');
            } else {
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));

                $user_id = $this->user_model->login($username, $password);

                if($user_id){

                    $user_data = array(
                      'user_id' => $user_id->user_id,
                      'first' =>  $user_id->first,
                      'Username'  => $user_id->Username,
                      'email' =>  $user_id->email,
                      'created_at'  =>  $user_id->created_at,
                      'Level' => $user_id->Level,
                      'logged_in' =>  true,
                    );

                    $this->session->set_userdata($user_data);

                    $this->session->set_flashdata('user_loggedin', '成功登入');

                    redirect('searchs/index');


                } else {
                    $this->session->set_flashdata('login_failed', '登入失敗');
                    redirect('users/login');
            }
          }
        }

        public function userpage(){
          if(!$this->session->userdata('logged_in')){
            redirect('users/login');
          }
          $data['title'] = '個人資料';


          $this->load->view('templates/header');
          $this->load->view('users/userpage', $data);
          $this->load->view('templates/footer');
        }
        

        public function usercomment(){
            $data['title'] = '我的評論';
            $u_id = $this->session->userdata('user_id');
            $data['comments'] = $this->user_model->get_usercomment($u_id);


            $this->load->view('templates/header');
            $this->load->view('users/usercomment', $data);
            $this->load->view('templates/footer');
        }

        public function logout(){
          // Unset user data
          $this->session->unset_userdata('logged_in');
          $this->session->unset_userdata('user_id');
          $this->session->unset_userdata('username');

          $this->session->set_flashdata('user_loggedout', 'You are now logged out');

          redirect('users/login');



        }
        public function modifyuserdata(){
          if(!$this->session->userdata('logged_in')){
            redirect('users/login');
          }
          $data['title']  = '修改個人資料';
          $this->load->view('templates/header');
          $this->load->view('users/modifyuserdata', $data);
          $this->load->view('templates/footer');

        }

        public function modifyuda(){
          if(!$this->session->userdata('logged_in')){
            redirect('users/login');
          }

          $this->user_model->modify_userdata();

          $this->session->set_flashdata('user_modifydata', '您已成功修改會員資料，請重新登入');
          $this->session->unset_userdata('logged_in');
          $this->session->unset_userdata('user_id');
          $this->session->unset_userdata('username');
          redirect('users/login');

        }




        public function modifypassword(){
          if(!$this->session->userdata('logged_in')){
            redirect('users/login');
          }
          $data['title'] = '修改密碼';

          $this->load->view('templates/header');
          $this->load->view('users/modifypassword', $data);
          $this->load->view('templates/footer');
        }



        public function modifypwd(){

          if(!$this->session->userdata('logged_in')){
            redirect('users/login');
          }
          $u_id = $this->session->userdata('user_id');
          $pwd = md5($this->input->post('password'));
          $newpwd = md5($this->input->post('newpassowrd'));

          $row = $this->user_model->get_pwd($u_id);


          if($row->password == $pwd){

            $this->user_model->modify_password($newpwd);

            $this->session->set_flashdata('user_modifypwd', '您已成功修改密碼，請重新登入');
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            redirect('users/login');

          } else {
            $this->session->set_flashdata('user_modifyerror', '原始密碼錯誤，請重試');

            redirect('users/modifypassword');
          }
        }






        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', '帳號已重複，請重新輸入');

            if($this->user_model->check_username_exists($username)){
              return true;
            } else {
              return false;
        }

      }


      public function check_email_exists($email){
          $this->form_validation->set_message('check_email_exists', '信箱已被註冊，請重新輸入' );

          if($this->user_model->check_email_exists($email)){
            return true;
          } else {
            return false;
      }
    }
  }
