<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Board extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Image_model');
        $this->load->model('Board_model');
    }

    public function detail($id) 
    {
        $data = array(
            'image' => $this->Board_model->get_image_board($id),
            'board' => $this->Board_model->get_by_id($id)
        );
        // var_dump($data);
        $this->render['content']= $this->load->view('board/detail', $data, TRUE);
        $this->load->view('template', $this->render);
    }
    
    public function create_action() 
    {
        $session_id = json_decode(json_encode($this->session->userdata('logged_in'),true))->id;
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('auth/profile'));
        }else{
            if($this->input->post('status',TRUE) == on){
                $status = 1;
            }else{
                $status = 0;
            }
            $data = array(
                'nama_board' => $this->input->post('name',TRUE),
                'status' => $status,
                'user_id' => $session_id,
            );
            $this->Board_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('auth/profile'));
        }
    }
    
    public function update_action() 
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            redirect(site_url('image'));
        } else {
            if($this->input->post('status',TRUE) == on){
                $status = 1;
            }else{
                $status = 0;
            }

            $data = array(
                'nama_board' => $this->input->post('name',TRUE),
                'status' => $status,
	        );

            $this->Board_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('auth/profile'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Board_model->get_by_id($id);

        if ($row) {
            $this->Board_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('auth/profile'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('auth/profile'));
        }
    }
}