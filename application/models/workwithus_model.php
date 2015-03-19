<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class workwithus_model extends CI_Model
{
    public function create($name,$contact,$email,$country,$city,$message)
    {
        $data=array(
                    "name" => $name,
                    "contact" => $contact,
                    "email" => $email,
                    "country" => $country,
                    "city" => $city,
                    "message" => $message
                   );
        $query=$this->db->insert( "workwithus", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("workwithus")->row();
        return $query;
    }
    function getsingleworkwithus($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("workwithus")->row();
        return $query;
    }
    public function edit($id,$name,$contact,$email,$country,$city,$message)
    {
        $data=array(
                    "name" => $name,
                    "contact" => $contact,
                    "email" => $email,
                    "country" => $country,
                    "city" => $city,
                    "message" => $message
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "workwithus", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `workwithus` WHERE `id`='$id'");
        return $query;
    }
    public function getworkwithusdropdown()
	{
		$query=$this->db->query("SELECT * FROM `workwithus`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
     
	public function getworkwithusimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `workwithus` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
