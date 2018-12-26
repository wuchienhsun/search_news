<?php
    class Search_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function search_news($search_text, $search_number){
          switch ($search_number){
            case "不限條件" :
            $sql = "SELECT * FROM `news` WHERE LIKE '%$search_text%'";
            $array = array('context' => $search_text, 'Title' => $search_text, 'Area' => $search_text);

            /*mysqli*/
            $query = $this->db->query($array);
            return $query->result_array();
            /*foreach ($query->result_array() as $row)
            {
              echo $row['Title'];
              echo $row['content'];
              echo $row['date'];
            }*/

            /*PDO*/
            /*$query = $this->db->query($sql);
            $rows = $query->fetchAll(PDO::FETCH_CLASS,"Member");

            foreach($rows as $row)
            {
                $row->showPost();
            };*/

                break;
            case "1" :
                  $sql = "SELECT * FROM `news` WHERE Title LIKE '%$search_text%'";
                  /*mysqli*/
                  $query = $this->db->query($sql);
                  return $query->result_array();
                break;
            case "2" :
                $sql = "SELECT * FROM `news` WHERE content LIKE '%$search_text%'";
                /*mysqli*/
                $query = $this->db->query($sql);
                return $query->result_array();
                break;
            case "4" :
                $sql = "SELECT * FROM `news` WHERE Type LIKE '%$search_text%'";
                /*mysqli*/
                $query = $this->db->query($sql);
                return $query->result_array();
                break;
            case "5" :
                $sql = "SELECT * FROM `news` WHERE Area LIKE '%$search_text%'";
                /*mysqli*/
                $query = $this->db->query($sql);
                return $query->result_array();
                break;
            default:
                echo "error";

          }

        }

    }
