<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class ngo_model extends CI_Model
{
    public function create($name,$address,$email,$json,$status,$website)
    {
        $data=array("name" => $name,"address" => $address,"email" => $email,"json" => $json,"status" => $status,"website" => $website);
        $query=$this->db->insert( "powerforone_ngo", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_ngo")->row();
        return $query;
    }
    function getsinglengo($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_ngo")->row();
        return $query;
    }
    public function edit($id,$name,$address,$email,$json,$status,$website)
    {
        $data=array("name" => $name,"address" => $address,"email" => $email,"json" => $json,"status" => $status,"website" => $website);
        $this->db->where( "id", $id );
        $query=$this->db->update( "powerforone_ngo", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `powerforone_ngo` WHERE `id`='$id'");
        return $query;
    }
    public function getngodropdown()
	{
		$query=$this->db->query("SELECT * FROM `powerforone_ngo`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>
