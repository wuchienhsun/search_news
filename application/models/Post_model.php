<?php
    class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }

        public function get_news($news_id = FALSE, $limit = FALSE, $offset = FALSE){
          if($limit){
              $this->db->limit($limit, $offset);
          }
            if($news_id === FALSE){
                $this->db->order_by('news_id', 'DESC');
                $query = $this->db->get('news');
                return $query->result_array();
            }

            $query = $this->db->get_where('news', array('news_id' => $news_id));
            return $query->row_array();
        }

        public function delete_news($news_id){
          $this->db->where('news_id', $news_id);
            $this->db->delete('news');
            return true;
        }

        public function update_news(){

            $data = array(
                'Title' => $this->input->post('title'),
                'content' => $this->input->post('body')
            );

             //$sql = "UPDATE news SET Title = '{$this->input->post('title')}', content = '{$this->input->post('body')}' WHERE news_id = '{$this->input->post('id')}'";

            $this->db->where('news_id', $this->input->post('id'));

            return $this->db->update('news', $data);

            //return $this->db->query($sql);

        }

    }
