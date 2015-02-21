<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class blogcategory_model extends CI_Model
{
    public function create($name)
    {
        $data=array(
            "name" => $name
        );
        $query=$this->db->insert( "blogcategory", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("blogcategory")->row();
        return $query;
    }
    function getsingleblogcategory($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("blogcategory")->row();
        return $query;
    }
    public function edit($id,$name)
    {
        $data=array(
            "name" => $name
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "blogcategory", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `blogcategory` WHERE `id`='$id'");
        return $query;
    }
    
	public function getisfeatureddropdown()
	{
		$isfeatured= array(
			 "1" => "Yes",
			 "0" => "No",
			);
		return $isfeatured;
	}
	
	public function getisnewdropdown()
	{
		$isnew= array(
			 "1" => "Yes",
			 "0" => "No",
			);
		return $isnew;
	}
	public function getblogcategorylogobyid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `blogcategory` WHERE `id`='$id'")->row();
		return $query;
	}
    
    public function getblogcategorydropdown()
	{
		$query=$this->db->query("SELECT * FROM `blogcategory`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
}
?>
