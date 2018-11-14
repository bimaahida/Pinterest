<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Follow extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Follow_model');
    }

    public function index() 
    {
        $session_id = json_decode(json_encode($this->session->userdata('logged_in'),true))->id;
        $user = $this->User_model->get_all_witout($session_id);
        $users = array();

        foreach ($user as $key) {
            $data = array(
                'user' => $key,
                'status' => $this->Follow_model->get_status($session_id,$key->id),
            );
            array_push($users,$data);
        }
        $data = array(
            'user' => $users,
        );
        // var_dump($data);
        $this->render['content']= $this->load->view('follow/list', $data, TRUE);
        $this->load->view('template', $this->render);
    }

    public function follow_action($user2,$status){
        $session_id = json_decode(json_encode($this->session->userdata('logged_in'),true))->id;

        if($status == 'follow'){
            $data = array(
                'user1' => $session_id,
                'user2' => $user2,
            );
    
            $this->Follow_model->insert($data);
            redirect(site_url('follow'));
        }else{
            $row = $this->Follow_model->get_status_data($session_id,$user2);
            // var_dump($row);

            if($row){
                $this->Follow_model->delete($row->id);
                redirect(site_url('follow'));
            }else{
                redirect(site_url('follow'));
            }
        }

    }
    
    
}