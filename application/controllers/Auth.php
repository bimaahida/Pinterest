<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Image_model');
        $this->load->model('Board_model');
    }

    public function index()
    {
        $data = array(
            'image' => $this->Image_model->get_all(),
        );
        $this->load->view('login', $data);
    } 
    public function loginAction(){
        $email = $this->input->post('email',TRUE);
        $password = md5($this->input->post('password',TRUE));

        $data = $this->User_model->login($email,$password);
        if($data){
            $this->session->set_userdata('logged_in', $data);
            redirect('image','refresh');
        }else{
            $message['invalid_user'] = 'invalid username or password';
            $this->session->set_flashdata('error_message', $message);
            redirect('auth','refresh');
        }
    }
    public function profile()
    {
        $session_id = $this->session->userdata('logged_in')->id;
        $board_private = array();
        $board_public = array();

        $board = $this->Board_model->get_by_status($session_id,'private');

        foreach ($board as $key) {
            $data = array(
                'board' => $key,
                'image' => $this->Board_model->get_image_board($key->id),
            );
            array_push($board_private,$data);
        }

        $board = $this->Board_model->get_by_status($session_id,'public');

        foreach ($board as $key) {
            $data = array(
                'board' => $key,
                'image' => $this->Board_model->get_image_board($key->id),
            );
            array_push($board_public,$data);
        }

        $data = array(
            'user' => $this->User_model->get_by_id($session_id), 
            'board_private' => $board_private,
            'board_public' => $board_public,
            'pins' => $this->Image_model->get_by_user($session_id),
        );
        // var_dump($data);
        $this->render['content']= $this->load->view('profile/detail_profile', $data, TRUE);
        $this->load->view('template', $this->render);
    }
}