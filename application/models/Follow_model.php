<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Follow_model extends CI_Model
{

    public $table = 'follow';
    public $id = 'follow.id';
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
    
    function following($user){
        $this->db->where('user1', $user);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function follower($user){
        $this->db->where('user2', $user);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    function get_status($user1,$user2){
        $this->db->where('user1', $user1);
        $this->db->where('user2', $user2);
        $this->db->order_by($this->id, $this->order);
        $data =  $this->db->get($this->table)->row();

        if($data){
            return 'Followed';
        }else{
            return 'Not Followed';
        }
    }
    function get_status_data($user1,$user2){
        $this->db->where('user1', $user1);
        $this->db->where('user2', $user2);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->row();
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