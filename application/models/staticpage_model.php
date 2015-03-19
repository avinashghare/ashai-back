<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class staticpage_model extends CI_Model
{
    public function create($name,$content,$order,$bannerimage,$image)
    {
        $data=array(
                    "name" => $name,
                    "content" => $content,
                    "bannerimage" => $bannerimage,
                    "image" => $image,
                    "order" => $order
                   );
        $query=$this->db->insert( "staticpage", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("staticpage")->row();
        return $query;
    }
    function getsinglestaticpage($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("staticpage")->row();
        return $query;
    }
    public function edit($id,$name,$content,$order,$bannerimage,$image)
    {
        $data=array(
            "name" => $name,
            "content" => $content,
            "bannerimage" => $bannerimage,
            "image" => $image,
            "order" => $order
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "staticpage", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `staticpage` WHERE `id`='$id'");
        return $query;
    }
    public function getstaticpagedropdown()
	{
		$query=$this->db->query("SELECT * FROM `staticpage`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
     
	public function getstaticpageimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `staticpage` WHERE `id`='$id'")->row();
		return $query;
	}
	public function getstaticpagebannerimagebyid($id)
	{
		$query=$this->db->query("SELECT `bannerimage` FROM `staticpage` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
