<?php
    class Posts extends CI_Controller{
        public function index($offset = 0){

          //Pagination config
          $config['base_url'] = base_url() . 'posts/index/';
          $config['total_rows'] = $this->db->count_all('news');
          $config['per_page'] = 10;
          $config['uri_segment'] = 3;
          $config['attributes'] = array('class' => 'pagination-links Page navigation example',
          'style' => 'pagination-links{
              margin: 30px 0;
          }
          a.pagination-link{
            padding: 8px 13px;
            margin: 5px;
            background: #f4f4f4;
            border: 1px #ccc solid;
          }

          ',
        );


          //init pagination
            $this->pagination->initialize($config);

            $data['news'] = $this->post_model->get_news(FALSE, $config['per_page'], $offset);

            $data['title'] = '最近新增';

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($news_id){
            $data['content'] = $this->post_model->get_news($news_id);
            $new_id = $data['content']['news_id'];
            $data['comments'] = $this->comment_model->show_comment($new_id);
          /*  $data['user_data'] = $this->user_model->get_userdata($news_id);*/
            if(empty($data['content'])){
                show_404();
            }

            $data['Title'] = $data['content']['Title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }

        public function create(){
          $data['title'] = 'Create Post';

          $this->load->view('templates/header');
          $this->load->view('posts/create', $data);
          $this->load->view('templates/footer');
        }

        public function delete($news_id){
          if(!$this->session->userdata('logged_in')){
            redirect('users/login');
          }

          $this->post_model->delete_news($news_id);

          $this->session->set_flashdata('post_deleted', '新聞已被刪除');

          redirect('posts/');

        }

        public function edit($news_id){
            $data['title'] = "修改新聞";
            if(!$this->session->userdata('logged_in')){
              redirect('users/login');
            }

            $data['news'] = $this->post_model->get_news($news_id);

            if(empty($data['news'])){
              show_404();
            }


            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($news_id){

          if(!$this->session->userdata('logged_in')){
              redirect('users/login');
          }

          $this->post_model->update_news();

          $this->session->set_flashdata('post_updated', 'Your post has been updated');

          redirect('posts/'.$news_id);
        }
        public function wudata(){
            $data['title'] = "吳建勳的資料";

            $this->load->view('templates/header');
            $this->load->view('posts/wudata', $data);
            $this->load->view('templates/footer');
        }

    }
