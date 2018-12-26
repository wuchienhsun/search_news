<?php
    class User_model extends CI_Model{
        public function register($enc_passowrd){
            //use data array

            $data = array(
              'first' => $this->input->post('firstname'),
              'Username'  => $this->input->post('username'),
              'email' =>  $this->input->post('email'),
              'password'  =>  $enc_passowrd,
            );

            return $this->db->insert('user', $data);
        }

        public function login($username, $password){
           $params = array(
            'Username' => $username,
            'password' => $password
           );
           $result = $this->db->get_where('user', $params);

           if($result->num_rows() == 1){
            return $result->row();
           } else {
            return false;
           }
          }

        public function get_userdata($news_id){
          $sql = "SELECT user.Username FROM user JOIN(news INNER JOIN comment ON '".$news_id."'=comment.news_id=news.news_id) ON comment.user_id=user.user_id";
          $result = $this->db->query($sql);

          return $result->result_array();
        }

        public function get_usercomment($u_id){

          $sql = "SELECT comment.created_at, user.user_id, comment.body, comment.news_id, news.Title FROM news JOIN(user INNER JOIN comment ON '".$u_id."'=comment.user_id=user.user_id) ON comment.news_id=news.news_id";
          $result = $this->db->query($sql);
          return $result->result_array();


        }

        public function get_pwd($u_id){
          $this->db->select('password');
          $query = $this->db->get_where('user', array ('user_id'  => $u_id));
          foreach($query->result() as $row)
          {
            return $row;
          }
        }
        public function modify_userdata(){
          $data = array (
            'Username'  =>  $this->input->post('username'),
            'email' =>  $this->input->post('email')
          );
          $this->db->where('user_id', $this->session->userdata('user_id'));
          return $this->db->update('user', $data);

        }

        public function modify_password($newpwd){
          $this->db->where('user_id', $this->session->userdata('user_id'));
            return $this->db->update('user', array('password' =>$newpwd));
        }






        public function check_username_exists($username){
            $query = $this->db->get_where('user', array('username' => $username));
            $row = $query->row_array();
            if(empty($row)){
                return true;
            } else {
                return false;
            }
        }

        public function check_email_exists($email){
            $query = $this->db->get_where('user', array('email' => $email));
            $row = $query->row_array();
            if(empty($row)){
                return true;
            } else {
                return false;
            }
        }
    }
