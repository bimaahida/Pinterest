<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image_model extends CI_Model
{

    public $table = 'image';
    public $id = 'image.id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('image.id,image.user_id,image.deskripsi,image.nama,url,image.date,kategori.kategori,user.nama as user, user.foto,website');
        $this->db->join('kategori','kategori.id = image.kategori_id');
        $this->db->join('user','user.id = image.user_id');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('image.id,image.user_id,image.deskripsi,image.nama,url,image.date,kategori.kategori,user.nama as user, user.foto,website');
        $this->db->join('kategori','kategori.id = image.kategori_id');
        $this->db->join('user','user.id = image.user_id');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function get_by_user($user){
        $this->db->select('image.id,image.user_id,image.deskripsi,image.nama,url,image.date,kategori.kategori,user.nama as user, user.foto,website');
        $this->db->join('kategori','kategori.id = image.kategori_id');
        $this->db->join('user','user.id = image.user_id');
        $this->db->where('user_id', $user);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function get_by_kategori($kategori){
        $this->db->select('image.id,image.user_id,image.deskripsi,image.nama,url,image.date,kategori.kategori,user.nama as user, user.foto,website');
        $this->db->join('kategori','kategori.id = image.kategori_id');
        $this->db->join('user','user.id = image.user_id');
        $this->db->where('kategori_id', $kategori);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('deskripsi', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('date', $q);
        $this->db->or_like('user_id', $q);
        $this->db->or_like('kategori_id', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('deskripsi', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('date', $q);
        $this->db->or_like('user_id', $q);
        $this->db->or_like('kategori_id', $q);
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