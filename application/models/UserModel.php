<?php
/**
 * Created by PhpStorm.
 * User: undefined
 * Date: 2017/12/15
 * Time: AM10:59
 */
class UserModel extends CI_Model{

    private $pdo;

    public function __construct()
    {
        $this->load->database();
        $this->pdo = $this->db->conn_id;
    }

    public function login($username, $password)
    {
        $sql = "select * from user where username = :username and password = :password";
        $sql_array = array(
            ":username" => $username,
            ":password" => $password
        );
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($sql_array);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) == 1)
        {
            return True;
        }
        else{
            return False;
        }
    }

    public function register($username, $password,$address,$tel)
    {
        if($this->check_register($username) == True)
        {
            return False;
        }
        $sql = "insert into user(username, password,address,tel) values(:username,:password,:address,:tel)";
        $sql_array = array(
            ":username" => $username,
	    ":password" => $password,
	    ":address"  => $address,
	    ":tel"      => $tel  
        );
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($sql_array);

        if($stmt->execute($sql_array))
        {
            return True;
        }
        else{
            return False;
        }

    }

    private function check_register($username)
    {
        $sql = "select * from user where username = :username";
        $sql_array = array(
            ":username" => $username
        );
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($sql_array);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) == 1)
        {
            return True;
        }
        else{
            return False;
        }
    }
    public function edit_userInfo($user_id, $phone, $address)
    {
        $sql = "update user set tel = :phone, address = :address where id = :id";
        $sql_array = array(
            ":phone" => $phone,
            ":address" => $address,
            ":id" => $user_id
        );
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($sql_array);

        if($stmt->execute($sql_array))
        {
            return True;
        }
        else{
            return False;
        }
    }
}
