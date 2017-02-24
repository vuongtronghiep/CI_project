<?php
class login_model extends CI_Model {
    function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

    function login($tendangnhap, $matkhau) 
        {
        $this->db->select('id, userName, passWord');
        $this->db->from('account');
        $this->db->where('userName', $tendangnhap);
        $this->db->where('passWord', $matkhau);
        $query = $this->db->get();           
            if($query->num_rows() == 1)
                {
                 return $query->result();
                }
            else
                {
                 return false;
                }
        } 

}            
?>  