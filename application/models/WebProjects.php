<?php 
    class WebProjects extends CI_Model{
        public function insert($data){
            $this->db->insert('webprojects',$data);
            return $this->db->affected_rows();
        }
        public function getallweb(){
            return $this->db->get('webprojects')->result_array();
        }
        public function getmyweb($userid){
            return $this->db->get_where('webprojects',['userid' => $userid])->result_array();
        }
        public function getfavweb($userid){
            return $this->db->get_where('favprojects',['userid' => $userid])->result_array();
        }
        public function getwebbyid($webid){
            return $this->db->get_where('webprojects',['webid' => $webid])->row_array();
        }
        public function getwebbywebname($webname){
            return $this->db->get_where('webprojects',['webname' => $webname])->row_array();
        }
        public function delete($webid){
            $query = "DELETE FROM webprojects WHERE webid = $webid";
            $this->db->query($query);
            return $this->db->affected_rows();
        }
        public function save($data){
            $this->db->insert('favprojects',$data);
            return $this->db->affected_rows();
        }
        public function unsave($webid){
            $query = "DELETE FROM favprojects WHERE webid = $webid";
            $this->db->query($query);
            return $this->db->affected_rows();
        }
        public function edit($webid,$data){
            $this->db->where('webid',$webid);
            $this->db->update('webprojects',$data);
            return $this->db->affected_rows();
        }
        public function search($keyword){
            $query = "SELECT * FROM webprojects WHERE webname LIKE '%$keyword%'";
            $result = $this->db->query($query)->result_array();
            if(count($result) == 0){
                $user_query = "SELECT * FROM user WHERE username LIKE '%$keyword%'";
                $user = $this->db->query($user_query)->row_array();
                if($user){
                    $userid = $user['userid'];
                    $result = $this->db->get_where('webprojects',['userid' => $userid])->result_array();
                }
            }
            return $result;
        }
    }
?>