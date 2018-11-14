<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Board_model extends CI_Model
{

    public $table = 'board';
    public $id = 'board.id';
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
    function get_by_user($user){
        $this->db->where('user_id', $user);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_status($user, $params)
    {
        if($params == 'private'){
            $params = 1;
        }else{
            $params = 0;
        }
        $this->db->where('user_id', $user);
        $this->db->where('status', $params);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function get_image_board($params){
        $this->db->select('image.id,image.user_id,image.deskripsi,image.nama,url,image.date,kategori.kategori,user.nama as user, user.foto,website,board_image.date as dateBoard');
        $this->db->join('image','image.id = board_image.image_id');
        $this->db->join('kategori','kategori.id = image.kategori_id');
        $this->db->join('user','user.id = image.user_id');
        $this->db->where('board_id', $params);
        $this->db->order_by('board_image.id', $this->order);
        return $this->db->get('board_image')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('nama_board', $q);
        $this->db->or_like('user_id', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('nama_board', $q);
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
