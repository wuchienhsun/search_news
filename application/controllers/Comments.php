<?php
    class Comments extends CI_Controller{

        public function create($news_id){
          $news_id = $this->input->post('news_id');

          $data['new'] = $this->post_model->get_news($news_id);

          $this->form_validation->set_rules('body', 'Body', 'required');

          if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
          } else {
              $this->comment_model->create_comment($news_id);
              redirect('posts/'.$news_id);
          }

        }

        public function updates($comment_id){
          $data['title']  = "修改評論";

          if(!$this->session->userdata('logged_in')){
            redirect('users/login');
          }

          $data['comments'] = $this->comment_model->get_comment($comment_id);

          if(empty($data['comments'])){
            show_404();
          }


          $this->load->view('templates/header');
          $this->load->view('posts/comment', $data);
          $this->load->view('templates/footer');

        }

        public function update(){
          if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
          }
          $comment_id = $this->input->post['id'];
          $this->comment_model->update_comment($comment_id);

          $this->session->set_flashdata('comment_updated', 'Your comment has been updated，請至我的頻論看修改內容');

          redirect('posts/'.$news_id);

        }

        public function delete($comment_id){
          if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
          }
          $this->comment_model->delete_comment($comment_id);

          $this->session->set_flashdata('comment_deleted', 'Your post has been deleted');
          redirect('posts/');

        }
    }
