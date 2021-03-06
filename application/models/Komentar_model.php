<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komentar_model extends CI_Model
{

    public $table = 'komentar';
    public $id = 'komentar.id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_image($image)
    {
        $this->db->select('komentar.id,komentar.date,komentar,user.nama,user.foto, user.id as user_id');
        $this->db->join('user','user.id = komentar.user_id');
        $this->db->where('image_id', $image);
        return json_encode($this->db->get($this->table)->result());
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('date', $q);
        $this->db->or_like('komentar', $q);
        $this->db->or_like('user_id', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('date', $q);
        $this->db->or_like('komentar', $q);
        $this->db->or_like('user_id', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $id;
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}