<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class order_model extends CI_Model
{
    public function create($name,$email,$user,$amount,$ngo,$project,$status,$transactionid,$typeofdonation,$advertiser)
    {
        $data=array(
            "name" => $name,
            "email" => $email,
            "user" => $user,
            "amount" => $amount,
            "ngo" => $ngo,
            "status" => $status,
            "transactionid" => $transactionid,
            "typeofdonation" => $typeofdonation,
            "advertiser" => $advertiser,
            "project" => $project
        );
        $query=$this->db->insert( "powerforone_order", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_order")->row();
        return $query;
    }
    function getsingleorder($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_order")->row();
        return $query;
    }
    public function edit($id,$name,$email,$user,$amount,$ngo,$project,$status,$transactionid,$typeofdonation,$advertiser)
    {
        $data=array(
            "name" => $name,
            "email" => $email,
            "user" => $user,
            "amount" => $amount,
            "ngo" => $ngo,
            "status" => $status,
            "transactionid" => $transactionid,
            "typeofdonation" => $typeofdonation,
            "advertiser" => $advertiser,
            "project" => $project
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "powerforone_order", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `powerforone_order` WHERE `id`='$id'");
        return $query;
    }
    
    public function getstatusdropdown()
	{
		$query=$this->db->query("SELECT * FROM `orderstatus`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
	public function getdonationtypedropdown()
	{
		$typeofdonation= array(
			 "1" => "Amount",
			 "0" => "Post",
			);
		return $typeofdonation;
	}
}
?>
