<?php
    class Searchs extends CI_Controller{
        public function index(){
            $data['title'] = '搜尋條件';


            $this->load->view('templates/header');
            $this->load->view('searchs/index', $data);
            $this->load->view('templates/footer');
        }

        public function execute_search(){
          $data['title'] = '搜尋';
          $data['title2'] = '條件';


          $this->form_validation->set_rules('search', 'Search', 'required');
          $this->form_validation->set_rules('select', 'Select', 'required');
          $this->form_validation->set_message('check_default', 'You need to select something other than the default');


          if($this->form_validation->run() === FALSE){
              $this->load->view('templates/header');
              $this->load->view('searchs/index', $data);
              $this->load->view('templates/footer');
          } else {
            $search_text = $this->input->post('search');
            $search_number = $this->input->post('select');

            $data['results'] = $this->search_model->search_news($search_text, $search_number);


            $data['text'] = $search_text;
            $data['number'] = $search_number;

            $this->load->view('templates/header');
            $this->load->view('searchs/news', $data);
            $this->load->view('templates/footer');

            }
          }
          public function showPost()
          {
              echo "<img src=".$this->image.">";
              echo "<h1>".$this->Title."</h1><hr />";
              echo "<h4>發布時間:".$this->date."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;記者:".$this->reporter."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;總類:".$this->Type."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;國家:".$this->Area."</h4><hr />";

              echo "<h2>內文:</h2><h5>".$this->content."</h5><hr />";
          }
        }
