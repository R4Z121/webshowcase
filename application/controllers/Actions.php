<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends CI_Controller {
    public function register(){
        if(isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $username = $this->input->post('username');
		$password = $this->input->post('password');
		$cnfrm_password = $this->input->post('confirm-password');

		$this->load->model('User');
		$check_user = $this->User->get_user($username);

		if(count($check_user) == 0){
			if($password == $cnfrm_password){
				$data = [
                    'userid' => 'u'.time(),
                    'fullname' => '',
					'username' => htmlspecialchars($this->input->post('username',true)),
					'password' => password_hash($password,PASSWORD_DEFAULT),
                    'picture' => 'user_default.png'
				];
				$this->User->new_user($data);
				$this->session->set_flashdata('success_register',true);
			}else{
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('confirm_password_error',true);
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('usercheck_error',true);
		}
		header("Location: ".BASEURL."/register");
		exit;
    }
    public function login(){
        if(isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model('User');
		$user = $this->User->get_user($username);
		if(count($user) > 0){
			if(password_verify($password,$user['password'])){
				$this->session->set_userdata('user',$username);
                header("Location: ".BASEURL."");
		        exit;
			}else{
				$this->session->set_flashdata('error',true);
				$this->session->set_flashdata('error_login',true);
			}
		}else{
			$this->session->set_flashdata('error',true);
			$this->session->set_flashdata('error_login',true);
		}
		header("Location: ".BASEURL."/login");
		exit;
    }
    public function addweb(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $website_image = 'default_website.jpg';
        $upload_image = $_FILES['webpict'];
        
        if($upload_image) {
            $config['upload_path'] = './assets/img/website/';
            $config['allowed_types'] = 'gif|png|jpg|bmp';
            $config['max_size'] = '10240';
            
            $this->upload->initialize($config);
            if($this->upload->do_upload('webpict')){
                $website_image = $this->upload->data('file_name');
            }
        }
        $this->load->model('User');
        $user = $this->User->get_user($this->session->userdata('user'));
        $userid = $user['userid'];
        $data = [
            "webid" => time(),
            "userid" => $userid,
            "webname" => htmlspecialchars($this->input->post('webname')),
            "weburl" => htmlspecialchars($this->input->post('weburl')),
            "webpict" => $website_image
        ];

        $this->load->model('WebProjects');
        if($this->WebProjects->insert($data) == 1){
            $this->session->set_flashdata('success',true);
            $this->session->set_flashdata('success_add',true);
        }else{
            $this->session->set_flashdata('error',true);
            $this->session->set_flashdata('error_add',true);
        }
        header("Location: ".BASEURL."/projects/".$this->session->userdata('user')."");
    }
    public function delweb(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $webid = $_GET['webid'];
        $this->load->model('WebProjects');
        if($this->WebProjects->delete($webid) == 1){
            $this->session->set_flashdata('success',true);
            $this->session->set_flashdata('success_delete',true);
        }else{
            $this->session->set_flashdata('error',true);
            $this->session->set_flashdata('error_delete',true);
        }
        header("Location: ".BASEURL."/projects/".$this->session->userdata('user')."");
    }
    public function saveweb(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $webid = $_GET['webid'];
        $page = $_GET['page'];
        $userpage = $_GET['user'];
        $this->load->model('User');
        $user = $this->User->get_user($this->session->userdata('user'));
        $userid = $user['userid'];
        $data = [
            "no" => "",
            "userid" => $userid,
            "webid" => $webid
        ];
        $this->load->model('WebProjects');
        if($this->WebProjects->save($data) == 1){
            $this->session->set_flashdata('success',true);
            $this->session->set_flashdata('success_save',true);
        }else{
            $this->session->set_flashdata('error',true);
            $this->session->set_flashdata('error_save',true);
        }
        if($page == 'favorites'){
            header("Location: ".BASEURL."/projects/favorites");
        }elseif($page == 'all-projects'){
            header("Location: ".BASEURL."/projects/all-projects");
        }else{
            header("Location: ".BASEURL."/projects/".$userpage."");
        }
    }
    public function unsaveweb(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $webid = $_GET['webid'];
        $page = $_GET['page'];
        $user = $_GET['user'];
        $this->load->model('WebProjects');
        if($this->WebProjects->unsave($webid) == 1){
            $this->session->set_flashdata('success',true);
            $this->session->set_flashdata('success_unsave',true);
        }else{
            $this->session->set_flashdata('error',true);
            $this->session->set_flashdata('error_unsave',true);
        }
        if($page == 'favorites'){
            header("Location: ".BASEURL."/projects/favorites");
        }elseif($page == 'all-projects'){
            header("Location: ".BASEURL."/projects/all-projects");
        }else{
            header("Location: ".BASEURL."/projects/".$user."");
        }
    }
    public function edituser(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $username = $this->session->userdata('user');
        $this->load->model('User');
        $user = $this->User->get_user($username);
        $user_image = $user['picture'];

        $new_username = htmlspecialchars($this->input->post('username',true));
        $new_fullname = htmlspecialchars($this->input->post('fullname',true));
        
        $check_user = $this->User->get_user($new_username);
        if($new_username != $username && count($check_user) > 0){
            $this->session->set_flashdata('error',true);
            $this->session->set_flashdata('usercheck_error',true);
        }else{
            $upload_image = $_FILES['userpict']['name'];
            if($upload_image) {
                $config['upload_path'] = './assets/img/user/';
                $config['allowed_types'] = 'gif|png|jpg|bmp';
                $config['max_size'] = '10240';
                $this->upload->initialize($config);
                if($this->upload->do_upload('userpict')){
                    $user_image = $this->upload->data('file_name');
                }else{
                    $this->session->set_flashdata('error',true);
                    $this->session->set_flashdata('error_image',true);
                }
            }
            $data = [
                'fullname' => $new_fullname,
                'username' => $new_username,
                'picture' => $user_image
            ];
            if($this->User->edit_user($username,$data) == 1){
                $this->session->set_flashdata('success',true);
                $this->session->set_flashdata('success_update',true);
                $this->session->set_userdata('user',$new_username);
            }else{
                $this->session->set_flashdata('error',true);
                $this->session->set_flashdata('error_update',true);
            }
        }
        header("Location: ".BASEURL."/dashboard");
        exit;
    }
    public function editwebsite(){
        if(!isset($this->session->user)){
            header("Location: ".BASEURL."");
            exit;
        }
        $webid = $_POST["webid"];
        $this->load->model("WebProjects");
        $thiswebsite = $this->WebProjects->getwebbyid($webid);
        $webpicture = $thiswebsite["webpict"];

        $new_webname = htmlspecialchars($_POST["webname"]);
        $new_weburl = htmlspecialchars($_POST["weburl"]);

        $upload_image = $_FILES['webpict']['name'];
        if($upload_image) {
            $config['upload_path'] = './assets/img/website/';
            $config['allowed_types'] = 'gif|png|jpg|bmp';
            $config['max_size'] = '10240';
            $this->upload->initialize($config);
            if($this->upload->do_upload('webpict')){
                $webpicture = $this->upload->data('file_name');
            }else{
                $this->session->set_flashdata('error',true);
                $this->session->set_flashdata('error_image',true);
            }
        }
        $data = [
            "webname" => $new_webname,
            "weburl" => $new_weburl,
            "webpict" => $webpicture
        ];
        if($this->WebProjects->edit($webid,$data) == 1){
            $this->session->set_flashdata('success',true);
            $this->session->set_flashdata('success_update',true);
        }else{
            $this->session->set_flashdata('error',true);
            $this->session->set_flashdata('error_update',true);
        }
        header("Location: ".BASEURL."/projects/".$this->session->userdata("user")."");
        exit;
    }
}