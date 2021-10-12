<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_mymodel
 *
 * @author Kanchu
 */
class user_my_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    function login($username, $password)
         {
           $this -> db -> select('id, username, password');
           $this -> db -> from('users_my');
           $this -> db -> where('username', $username);
           $this -> db -> where('password', MD5($password));
           $this -> db -> limit(1);

           $query = $this -> db -> get();

           if($query -> num_rows() == 1)
           {
             return $query->result();
           }
           else
           {
             return false;
           }
         }
    //put your code here
}
