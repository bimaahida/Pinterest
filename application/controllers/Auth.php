<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('google');

        $this->load->model('User_model');
        $this->load->model('Image_model');
        $this->load->model('Board_model');
        $this->load->model('Kategori_model');
        $this->load->model('Follow_model');
                                                                          
    }

    public function index()
    {
        if($this->session->userdata('logged_in') !== null){
            redirect('image','refresh');
            // var_dump($this->session->userdata('logged_in'));
        }else{
            if($this->google->validate()){
                
                $user = $this->google->validate();

                $userDb = $this->User_model->login_google($user['email'],$user['name']);

                if(empty($userDb)){
                    $insert = array(
                        'nama' => $user['name'],
                        'email' => $user['email'],
                        'foto' => $user['profile_pic'],
                        'status' => '1'
                    );
                    $this->User_model->insert($insert);
                }

                $data = array(
                    'id' => $userDb->id,
                    'name'=> $userDb->nama,
                    'email'=> $userDb->email,
                    'source'=>'google',
                    'foto'=> $userDb->foto,
                );
                $this->session->set_userdata('logged_in', $data);
                // redirect('image','location');
                
                echo  "<script type='text/javascript'>";
                echo "window.close();";
                echo "</script>";
            }else{
                // var_dump($this->session->userdata());
                $data = array(
                    'image' => $this->Image_model->get_all(),
                    'url_google' => $this->google->get_login_url(),
                );
                $this->load->view('login', $data);
            }
        }
    }

    public function kategori(){
        if(!empty($this->session->userdata('logged_in')->id)){
            $session_id = $this->session->userdata('logged_in')->id;
        }else{
            $session_id = json_decode(json_encode($this->session->userdata('logged_in'),true))->id;
        }

        $kategori_user = $this->Kategori_model->get_by_user($session_id);

        if(count($kategori_user) > 5){
            redirect(site_url('image'));
        }else{
            $data_kategori = array();
            $kategori = $this->Kategori_model->get_all();

            foreach ($kategori as $key) {
                $params = $this->Kategori_model->get_by_user_and_kategori($session_id,$key->id);
                if($params){
                    $status = '0';
                }else{
                    $status = '1';
                }
                $data = array(
                    'kategori' => $key,
                    'image' => $this->Image_model->get_by_kategori($key->id),
                    'status' => $status,
                );
                array_push($data_kategori,$data);
            }
            $data = array(
                'kategori' => $data_kategori, 
            );
            // var_dump($data);

            $this->render['content']= $this->load->view('kategori/list', $data, TRUE);
            $this->load->view('template', $this->render);   
        }
    }

    public function kategori_action($kategori,$status){
        $session_id = json_decode(json_encode($this->session->userdata('logged_in'),true))->id;

        if($status == 'follow'){
            $data = array(
                'user_id' => $session_id,
                'kategori_id' => $kategori,
            );
    
            $this->Kategori_model->insert_user($data);
    
            $kategori_user = $this->Kategori_model->get_by_user($session_id);
    
            if(count($kategori_user) > 5){
                redirect(site_url('image'));
            }else{
                redirect(site_url('auth/kategori'));
            }
        }else{
            $row = $this->Kategori_model->get_by_user_and_kategori($session_id,$kategori);

            if($row){
                $this->Kategori_model->delete_user($row->id);
                redirect(site_url('auth/kategori'));
            }else{
                redirect(site_url('auth/kategori'));
            }
        }
    }

    public function loginAction(){
        $email = $this->input->post('email',TRUE);
        $password = md5($this->input->post('password',TRUE));

        $data = $this->User_model->login($email,$password);
        if($data){
            $sess = array(
                'id' => $data->id,
                'name'=> $data->nama,
                'email'=> $data->email,
                'source'=>'manual',
                'foto'=> $data->foto,
            );
            $this->session->set_userdata('logged_in', $sess);
            redirect('auth/kategori','refresh');
        }else{
            $message['invalid_user'] = 'invalid username or password';
            $this->session->set_flashdata('error_message', $message);
            redirect('auth','refresh');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('auth','refresh');
    }
    public function register(){

        $config['upload_path']          = './assets/upload/profile/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000000000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('profile')){
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }else{
            $data = array(
                'nama' => $this->input->post('name',TRUE),
                'password' => md5($this->input->post('password',TRUE)),
                'email' => $this->input->post('email',TRUE),
                'foto' => 'assets/upload/profile/'.$this->upload->data('file_name'),
                'status' => '1',
            );
            $this->User_model->insert($data);

            $email = $this->input->post('email',TRUE);
            $password = md5($this->input->post('password',TRUE));

            $data = $this->User_model->login($email,$password);
            if($data){
                $sess = array(
                    'id' => $data->id,
                    'name'=> $data->nama,
                    'email'=> $data->email,
                    'source'=>'manual',
                    'foto'=> $data->foto,
                );
                $this->session->set_userdata('logged_in', $sess);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('auth/kategori'));
            }else{
                $this->session->set_userdata('logged_in', $sess);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('auth'));
            }
            
        }
    }
    public function profile()
    {
        $session_id = json_decode(json_encode($this->session->userdata('logged_in'),true));
        
        // var_dump($session_id->id);
        $board_private = array();
        $board_public = array();

        $board = $this->Board_model->get_by_status($session_id->id,'private');

        foreach ($board as $key) {
            $data = array(
                'board' => $key,
                'image' => $this->Board_model->get_image_board($key->id),
            );
            array_push($board_private,$data);
        }

        $board = $this->Board_model->get_by_status($session_id->id,'public');

        foreach ($board as $key) {
            $data = array(
                'board' => $key,
                'image' => $this->Board_model->get_image_board($key->id),
            );
            array_push($board_public,$data);
        }

        $data = array(
            'user' => $this->User_model->get_by_id($session_id->id), 
            'board_private' => $board_private,
            'board_public' => $board_public,
            'pins' => $this->Image_model->get_by_user($session_id->id),
            'following' => $this->Follow_model->following($session_id->id),
            'follower' => $this->Follow_model->follower($session_id->id),
        );
        // var_dump($data);
        $this->render['content']= $this->load->view('profile/detail_profile', $data, TRUE);
        $this->load->view('template', $this->render);
    }
}