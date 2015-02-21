<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class advertiser_model extends CI_Model
{
    public function create($name,$json,$views,$image)
    {
        $data=array("name" => $name,"json" => $json,"views" => $views,"image" => $image);
        $query=$this->db->insert( "powerforone_advertiser", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_advertiser")->row();
        return $query;
    }
    function getsingleadvertiser($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_advertiser")->row();
        return $query;
    }
    public function edit($id,$name,$json,$views)
    {
        $data=array("name" => $name,"json" => $json,"views" => $views);
        $this->db->where( "id", $id );
        $query=$this->db->update( "powerforone_advertiser", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `powerforone_advertiser` WHERE `id`='$id'");
        return $query;
    }
    public function getadvertiserdropdown()
	{
		$query=$this->db->query("SELECT * FROM `powerforone_advertiser`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
	public function getadvertiserimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `powerforone_advertiser` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
