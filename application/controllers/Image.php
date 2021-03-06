<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Image_model');
        $this->load->model('Komentar_model');
        $this->load->model('Board_model');
        $this->load->model('Board_image_model');
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $session_id = json_decode(json_encode($this->session->userdata('logged_in'),true))->id;
        $board = array();
        $imagearray = array();
        $board_list = $this->Board_model->get_by_user($session_id);

        foreach ($board_list as $key) {
            $data = array(
                'board' => $key,
                'image' => $this->Board_model->get_image_board($key->id),
            );
            array_push($board,$data);
        }
        $this->session->set_userdata('board', $board);

        $params = $this->Kategori_model->get_by_user($session_id);

        foreach ($params as $key) {
            $data = $this->Image_model->get_by_kategori($key->kategori_id);
            $imagearray = (object) array_merge((array) $imagearray, (array) $data);
        }

        $data = array(
            'image' => $imagearray,
        );

        $this->render['content']= $this->load->view('image/image_list', $data, TRUE);
        $this->load->view('template', $this->render);
        // var_dump($data);
    } 
    public function pin($board,$image){
        $data = array(
            'board_id' => $board,
            'image_id' => $image, 
        );
        $this->Board_image_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('board/detail/'.$board));

    }

    public function read($id) 
    {
        $row = $this->Image_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'deskripsi' => $row->deskripsi,
                'nama' => $row->nama,
                'url' => $row->url,
                'date' => $row->date,
                'kategori' => $row->kategori,
                'user' => $row->user,
                'foto' => $row->foto,
                'website' => $row->website,
                'komentar' => json_decode($this->Komentar_model->get_by_image($row->id)),
            );
        // var_dump($data);
            $this->render['content']= $this->load->view('image/detail_image', $data, TRUE);
            $this->load->view('template', $this->render);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('image'));
        }
    }
    
    public function create_action() 
    {
        $session_id = json_decode(json_encode($this->session->userdata('logged_in'),true))->id;
        if(empty($this->input->post('url-web',TRUE))){
            $this->form_validation->set_rules('description-create', 'description-create', 'trim|required');
            $this->form_validation->set_rules('name-create', 'name-create', 'trim|required');
            $this->form_validation->set_rules('website-create', 'website-create', 'trim|required');
            $this->form_validation->set_rules('kategori-create', 'kategori-create', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect(site_url('image'));
            }else{
                $config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000000000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
                $this->load->library('upload', $config);
                // var_dump($this->upload->do_upload('imgInp'));

                if ( ! $this->upload->do_upload('imgInp')){
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                    //$this->load->view('tambah_pegawai_view',$error);
                }else{
                    $data = array(
                        'deskripsi' => $this->input->post('description-create',TRUE),
                        'nama' => $this->input->post('name-create',TRUE),
                        'url' => 'assets/upload/'.$this->upload->data('file_name'),
                        'website' => $this->input->post('website-create',TRUE),
                        'kategori_id' => $this->input->post('kategori-create',TRUE),
                        // 'user_id' => $this->session->userdata('auth'),
                        'user_id' => $session_id,
                    );
                    $this->Image_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('image'));
                }
            }
        }else{
            $this->form_validation->set_rules('url-deskripsi', 'url-deskripsi', 'trim|required');
            $this->form_validation->set_rules('url-name', 'url-name', 'trim|required');
            $this->form_validation->set_rules('url-web', 'imgInp', 'trim|required');
            $this->form_validation->set_rules('url-website', 'website-create', 'trim|required');
            $this->form_validation->set_rules('url-kategori', 'kategori_id', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect(site_url('image'));
            }else{
                
                $data = array(
                    'deskripsi' => $this->input->post('url-deskripsi',TRUE),
                    'nama' => $this->input->post('url-name',TRUE),
                    'url' => $this->input->post('url-web',TRUE),
                    'website' => $this->input->post('url-website',TRUE),
                    'kategori_id' => $this->input->post('url-kategori',TRUE),
                    // 'user_id' => $this->session->userdata('auth'),
                    'user_id' => $session_id,
                );
                $this->Image_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('image'));
            }
        }
    }
    
    public function update_action($id) 
    {
        $this->form_validation->set_rules('name-edit', 'name-edit', 'trim|required');
        $this->form_validation->set_rules('description-edit', 'description-edit', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            // redirect(site_url('image'));
            var_dump($this->input->post('description-edit',TRUE));
        } else {
            $data = array(
                'deskripsi' => $this->input->post('description-edit',TRUE),
                'website' => $this->input->post('website-edit',TRUE),
                'nama' => $this->input->post('name-edit',TRUE),
	        );
            $this->Image_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('image'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Image_model->get_by_id($id);

        if ($row) {
            $this->Image_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('image'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('image'));
        }
    }

    public function komentar_action($image){
        // $user = $this->session->userdata('auth');
        $session_id = json_decode(json_encode($this->session->userdata('logged_in'),true))->id;
        $data = array(
            'komentar' => $this->input->post('commant-text',TRUE),
            'user_id' => $session_id,
            'image_id' => $image,
        );
        $this->Komentar_model->insert($data);
        redirect(site_url('image'));

    }
    public function get_komentar($image){
        $data = $this->Komentar_model->get_by_image($image);
        echo $data;
    }
    public function delete_komentar($id){
        $row = $this->Komentar_model->get_by_id($id);
        
        if ($row) {
            $this->Komentar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('image'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('image'));
        }
    }

    // public function _rules() 
    // {
	// $this->form_validation->set_rules('adreess', 'adreess', 'trim|required');
	// $this->form_validation->set_rules('rt', 'rt', 'trim|required');
	// $this->form_validation->set_rules('rw', 'rw', 'trim|required');
	// $this->form_validation->set_rules('village', 'village', 'trim|required');
	// $this->form_validation->set_rules('districts', 'districts', 'trim|required');

	// $this->form_validation->set_rules('id', 'id', 'trim');
	// $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    // }
}