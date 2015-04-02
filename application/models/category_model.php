<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class category_model extends CI_Model
{
    public function create($name,$parent,$json,$order,$views,$image,$description,$status)
    {
        $data=array(
            "name" => $name,
            "parent" => $parent,
            "json" => $json,
            "order" => $order,
            "views" => $views,
            "description" => $description,
            "status" => $status,
            "image" => $image
        );
        $query=$this->db->insert( "powerforone_category", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_category")->row();
        return $query;
    }
    function getsinglecategory($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_category")->row();
        return $query;
    }
    public function edit($id,$name,$parent,$json,$order,$views,$image,$description,$status)
    {
        $data=array(
            "name" => $name,
            "parent" => $parent,
            "json" => $json,
            "order" => $order,
            "views" => $views,
            "description" => $description,
            "status" => $status,
            "image" => $image
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "powerforone_category", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `powerforone_category` WHERE `id`='$id'");
        return $query;
    }
    
    public function getcategorydropdown()
	{
		$query=$this->db->query("SELECT * FROM `powerforone_category`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
	public function getcategoryimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `powerforone_category` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
