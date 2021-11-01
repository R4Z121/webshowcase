<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $this->load->model('User');
        $username = $this->session->userdata('user');
        $data["user"] = $this->User->get_user($username);
        $this->load->view('dashboard',$data);
    }
    public function out(){
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        header("Location: ".BASEURL."");
        exit;
    }
}