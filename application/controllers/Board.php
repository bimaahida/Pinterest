<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class board extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Image_model');
        $this->load->model('Board_model');
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
	    );
            $this->load->view('image/image_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('image'));
        }
    }
    
    public function create_action() 
    {
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
                'user_id' => 1,
            );
            $this->Board_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('auth/profile'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Image_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('image/update_action'),
                'id' => set_value('id', $row->id),
                'deskripsi' => set_value('deskripsi', $row->deskripsi),
                'nama' => set_value('nama', $row->nama),
                'url' => set_value('url', $row->url),
                'kategori_id' => set_value('kategori_id', $row->kategori_id),
                'user_id' => set_value('user_id', $row->user_id),
            );
            $this->load->view('image/image_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('image'));
        }
    }
    
    public function update_action() 
    {
        // $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'url' => $this->input->post('url',TRUE),
                'kategori_id' => $this->input->post('kategori_id',TRUE),
                'user_id' => $this->input->post('user_id',TRUE),
	        );

            $this->Image_model->update($this->input->post('id', TRUE), $data);
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
}