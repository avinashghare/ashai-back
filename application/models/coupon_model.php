<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class coupon_model extends CI_Model
{
    public function create($name,$order,$json,$text,$description,$image,$expirydate,$couponcode,$companyname)
    {
        $data=array(
            "name" => $name,
            "order" => $order,
            "json" => $json,
            "text" => $text,
            "description" => $description,
            "expirydate" => $expirydate,
            "couponcode" => $couponcode,
            "companyname" => $companyname,
            "image" => $image
        );
        $query=$this->db->insert( "powerforone_coupon", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_coupon")->row();
        return $query;
    }
    function getsinglecoupon($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_coupon")->row();
        return $query;
    }
    public function edit($id,$name,$order,$json,$text,$description,$image,$expirydate,$couponcode,$companyname)
    {
        $data=array(
            "name" => $name,
            "order" => $order,
            "json" => $json,
            "text" => $text,
            "description" => $description,
            "expirydate" => $expirydate,
            "couponcode" => $couponcode,
            "companyname" => $companyname,
            "image" => $image
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "powerforone_coupon", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `powerforone_coupon` WHERE `id`='$id'");
        return $query;
    }
    
	public function getcouponimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `powerforone_coupon` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
