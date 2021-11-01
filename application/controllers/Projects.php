<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {
    public function allprojects(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $this->load->model('User');
        $user = $this->User->get_user($this->session->userdata('user'));
        $userid = $user['userid'];

        $this->load->model('WebProjects');
        $data["allwebprojects"] = array_reverse($this->WebProjects->getallweb());
        $favprojectsid = [];
        $savedprojects = $this->WebProjects->getfavweb($userid);
        foreach($savedprojects as $project){
            array_push($favprojectsid,$project["webid"]);
        }
        $data["favprojects"] = $favprojectsid;
        $data['userid'] = $userid;
        $this->load->view('allprojects',$data);
    }
    public function new(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $this->load->view('new_project');
    }
    public function userprojects(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $favprojectsid = [];

        $this->load->model('WebProjects');
        $self_username = $this->session->userdata('user');

        $this->load->model('User');
        $self_user = $this->User->get_user($self_username);
        $self_userid = $self_user['userid'];
        $data["user"] = $self_user;

        $username = $this->uri->segment(2);
        $userid = 'not_found';
        if($username != $self_username){
            $user = $this->User->get_user($username);
            if($user){
                $userid = $user['userid'];
                $savedprojects = $this->WebProjects->getfavweb($self_userid);
                foreach($savedprojects as $project){
                    array_push($favprojectsid,$project["webid"]);
                }
                $data["user"] = $user;
            }
        }else{
            $userid = $self_userid;
        }
        $data["my_websites"] = array_reverse($this->WebProjects->getmyweb($userid));
        $data["favprojects"] = $favprojectsid;
        $data["selfid"] = $self_userid;
        $this->load->view('userprojects',$data);
    }
    public function favorites(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $this->load->model('WebProjects');
        $this->load->model('User');
        $user = $this->User->get_user($this->session->userdata('user'));
        $userid = $user['userid'];
        $favprojectsdata = [];
        $savedprojects = array_reverse($this->WebProjects->getfavweb($userid));
        foreach($savedprojects as $project){
            $webid = $project["webid"];
            array_push($favprojectsdata,$this->WebProjects->getwebbyid($webid));
        }
        $data['my_websites'] = $favprojectsdata;
        $this->load->view('favoriteprojects',$data);
    }
    public function editproject(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $websitetarget = str_replace("%20"," ",$this->uri->segment(2));
        $this->load->model('WebProjects');
        $this->load->model('User');
        $data["website"] = $this->WebProjects->getwebbywebname($websitetarget);
        $uploader = $this->User->getuserbyid($data["website"]["userid"]);
        if($uploader['username'] == $this->session->userdata('user')){
                $this->load->view('editproject',$data);
        }else{
            header("Location: ".BASEURL."");
            exit;
        }
    }
    public function search(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $this->load->model('User');
        $self_user = $this->User->get_user($this->session->userdata('user'));
        $self_userid = $self_user['userid'];

        $keyword = "";
        $result = [];
        $favprojectsid = [];
        if(isset($_POST['search'])){
            $keyword = $this->input->post('keyword');
            if($keyword != ""){
                $this->load->model('WebProjects');
                $result = $this->WebProjects->search($keyword);
                if(count($result) > 0){
                    $savedprojects = $this->WebProjects->getfavweb($self_userid);
                    foreach($savedprojects as $project){
                        array_push($favprojectsid,$project["webid"]);
                    }
                }
            }
        }
        $data["keyword"] = $keyword;
        $data["userid"] = $self_userid;
        $data["favprojects"] = $favprojectsid;
        $data["websites"] = $result;
        $this->load->view('searchproject',$data);
    }
}