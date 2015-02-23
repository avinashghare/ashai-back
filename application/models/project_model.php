<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class project_model extends CI_Model
{
    public function create($name,$category,$ngo,$advertiser,$json,$like,$share,$follow,$facebook,$twitter,$google,$status,$order,$views,$video,$content,$contribution,$times,$donate,$tagline,$image)
    {
        $data=array(
            "name" => $name,
            "category" => $category,
            "ngo" => $ngo,
            "advertiser" => $advertiser,
            "json" => $json,
            "like" => $like,
            "share" => $share,
            "follow" => $follow,
            "facebook" => $facebook,
            "twitter" => $twitter,
            "google" => $google,
            "status" => $status,
            "order" => $order,
            "views" => $views,
            "content" => $content,
            "contribution" => $contribution,
            "times" => $times,
            "donate" => $donate,
            "tagline" => $tagline,
            "image" => $image,
            "video" => $video
        );
        $query=$this->db->insert( "powerforone_project", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_project")->row();
        return $query;
    }
    function getsingleproject($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_project")->row();
        return $query;
    }
    public function edit($id,$name,$category,$ngo,$advertiser,$json,$like,$share,$follow,$facebook,$twitter,$google,$status,$order,$views,$video,$content,$contribution,$times,$donate,$tagline,$image)
    {
        $data=array(
            "name" => $name,
            "category" => $category,
            "ngo" => $ngo,
            "advertiser" => $advertiser,
            "json" => $json,
            "like" => $like,
            "share" => $share,
            "follow" => $follow,
            "facebook" => $facebook,
            "twitter" => $twitter,
            "google" => $google,
            "status" => $status,
            "order" => $order,
            "views" => $views,
            "content" => $content,
            "contribution" => $contribution,
            "times" => $times,
            "donate" => $donate,
            "tagline" => $tagline,
            "image" => $image,
            "video" => $video
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "powerforone_project", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `powerforone_project` WHERE `id`='$id'");
        return $query;
    }
    
    public function getprojectdropdown()
	{
		$query=$this->db->query("SELECT * FROM `powerforone_project`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
	public function getprojectimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `powerforone_project` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
