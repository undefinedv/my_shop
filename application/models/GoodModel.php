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

    public function insert_goods($name,$category,$price,$res,$pic)
    {
        $sql = "insert into goods(name,category,price,res,pic) values(:name,:category,:price,:res,:pic)";
        $sql_array = array(
		":name"=>$name,
		":category"=>$category,
		":price"=>$price,
		":res"=>$res,
		":pic"=>$pic
		  
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

    public function edit_goods($good_id, $price, $res)
    {
        $sql = "update goods set price=:price,res=:res where id=:id";
        $sql_array = array(
		":id"=>$good_id,
		":price"=>$price,
		":res"=>$res
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

    public function show_goods($good_id)
    {
    	$sql="select name,category,price,res,pic from goods where id=:id";
	$sql_array=array(
		":id"=$good_id
	);
	$stmt=$this->pdo->prepare($sql);
	$stmt->execute($sql_array);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

	if($result)
	{
		return $result;
	}
	else{
		return False;
	}
    }
}
