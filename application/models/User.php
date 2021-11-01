<?php 
    class User extends CI_Model{
        public function get_user($username){
            return $this->db->get_where('user',['username' => $username])->row_array();
        }
        public function getuserbyid($userid){
            return $this->db->get_where('user',['userid' => $userid])->row_array();
        }
        public function new_user($data){
            $this->db->insert('user',$data);
            return true;
        }
        public function edit_user($username,$data){
            $this->db->where('username',$username);
            $this->db->update('user',$data);
            return $this->db->affected_rows();
        }
    }
?>