<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Ordercoupon_model extends CI_Model
{
	//topic
	public function create($order,$coupon)
	{
		$data  = array(
			'order' => $order,
			'coupon' => $coupon
		);
		$query=$this->db->insert( 'ordercoupon', $data );
		
		return  1;
	}
	function viewordercouponbyorder($id)
	{
		$query="SELECT `ordercoupon`.`id`,`ordercoupon`.`coupon`, `ordercoupon`.`order`, `powerforone_order`.`name` AS `ordername`, `powerforone_coupon`.`name` AS `couponname`
        FROM `ordercoupon`
        LEFT OUTER JOIN `powerforone_order` ON `powerforone_order`.`id`=`ordercoupon`.`order` 
        LEFT OUTER JOIN `powerforone_coupon` ON `powerforone_coupon`.`id`=`ordercoupon`.`coupon` 
        WHERE `ordercoupon`.`order`='$id'";
        $result=$this->db->query($query)->result();
        
        return $result;
        
//		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'ordercoupon' )->row();
		return $query;
	}
    
	public function getordercouponbyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `ordercoupon` WHERE `id`='$id'")->row();
		return $query;
	}
	
	public function edit( $id,$order,$coupon)
	{
		$data = array(
			'order' => $order,
			'coupon' => $coupon
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'ordercoupon', $data );
		
		return 1;
	}
	function deleteordercoupon($id)
	{
		$query=$this->db->query("DELETE FROM `ordercoupon` WHERE `id`='$id'");
		
	}
    
     public function getcoupondropdown()
	{
		$query=$this->db->query("SELECT * FROM `powerforone_coupon`  ORDER BY `id` ASC")->result();
		$return=array();
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
    
}
?>