<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class Blog_model extends CI_Model
{
    public function create($title,$blogcategory,$description,$image)
    {
        $data=array(
            "title" => $title,
            "blogcategory" => $blogcategory,
            "description" => $description,
            "image" => $image
        );
        $query=$this->db->insert( "blog", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("blog")->row();
        return $query;
    }
    function getsingleblog($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("blog")->row();
        return $query;
    }
    public function edit($id,$title,$blogcategory,$description,$image)
    {
        $data=array(
            "title" => $title,
            "blogcategory" => $blogcategory,
            "description" => $description,
            "image" => $image
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "blog", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `blog` WHERE `id`='$id'");
        return $query;
    }
    
	public function getblogimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `blog` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
