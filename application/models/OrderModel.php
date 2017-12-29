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

    public function insert_orders($buyer_id,$goods_id,$price,$ordertime)
    {
        $sql = "insert into orders(buyer_id,goods_id,price,ordertime) values(:buyer_id,:goods_id,:price,:ordertime)";
        $sql_array = array(
		":buyer_id"=>$buyer_id,
		":goods_id"=>$goods_id,
		":price"=>$price,
		":ordertime"=>$ordertime
		  
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

    public function edit_order($id,$price)
    {
        $sql = "update orders set price=:price where id=:id";
        $sql_array = array(
		":id"=>$good_id,
		":price"=>$price
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

    public function show_orders($id)
    {
    	$sql="select userinfo.username,goods.name,orders.price,orders.ordertime from orders where orders.id=:id and orders.buyer_id=userinfo.id and orders.goods_id=goods.id";
	$sql_array=array(
		":id"=$id
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
