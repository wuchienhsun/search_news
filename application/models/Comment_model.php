<?php
    class Comment_model extends CI_Model{
        public function __contruct(){
            $this->load->database();
        }

        public function create_comment($news_id){
          $data = array(
              'body'  => $this->input->post('body'),
              'user_id' =>  $_SESSION['user_id'],
              'news_id' =>  $news_id,
          );
          return $this->db->insert('comment', $data);

        }

        public function show_comment($new_id){
          /*  $result = $this->db->get_where('comment', array('news_id' => $news_id));

            return $result->result_array(); */
            $sql = "SELECT user.Username, comment.body, comment.comment_id, comment.news_id, comment.user_id, comment.created_at FROM user JOIN(news INNER JOIN comment ON '".$new_id."'=comment.news_id=news.news_id) ON comment.user_id=user.user_id";
            $result = $this->db->query($sql);
            return $result->result_array();
        }
        public function get_comment($comment_id){
            $this->db->where('comment_id', $comment_id);
            $result = $this->db->get('comment');
            return $result->result_array();

        }

        public function update_comment($comment_id){
            $data = array(
              'body'  =>  $this->input->post('body')
            );
            $this->db->where('comment_id', $this->input->post('id'));
            return $this->db->update('comment', $data);

        }

        public function delete_comment($comment_id){
          $this->db->where('comment_id', $comment_id);
            $this->db->delete('comment');
            return true;
        }
    }
