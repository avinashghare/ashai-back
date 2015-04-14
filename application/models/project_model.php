<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class project_model extends CI_Model
{
    public function create($name,$category,$ngo,$advertiser,$json,$like,$share,$follow,$facebook,$twitter,$google,$status,$order,$views,$video,$content,$contribution,$times,$donate,$tagline,$image,$video2,$cardtagline,$indiandoner,$foreigndoner,$project,$timesinword,$facebooktext,$twittertext,$sharevalue,$cardimage,$sharevalue,$location,$timesinwordforshare,$remembersharevalue)
    {
        $data=array(
            "name" => $name,
            "category" => $category,
            "ngo" => $ngo,
            "advertiser" => $advertiser,
            "json" => $json,
            "like" => $like,
            "raiseawareness" => $share,
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
            "cardtagline" => $cardtagline,
            "indiandoner" => $indiandoner,
            "foreigndoner" => $foreigndoner,
            "image" => $image,
            "video" => $video,
            "timesinword" => $timesinword,
            "facebooktext" => $facebooktext,
            "twittertext" => $twittertext,
            "sharevalue" => $sharevalue,
            "cardimage" => $cardimage,
            "sharevalue" => $sharevalue,
            "location" => $location,
            "timesinwordforshare" => $timesinwordforshare,
            "remembersharevalue" => $remembersharevalue,
            "video2" => $video2
        );
        $query=$this->db->insert( "powerforone_project", $data );
        $id=$this->db->insert_id();
        
    foreach($project AS $key=>$value)
        {
            $this->project_model->createsimilercausebyproduct($value,$id);
        }
        if(!$query)
            return  0;
        else
            return  $id;
    }
    
    public function createsimilercausebyproduct($value,$projectid)
	{
		$data  = array(
			'similarprojectid' => $value,
			'projectid' => $projectid
		);
		$query=$this->db->insert( 'similercauses', $data );
		return  1;
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
    public function edit($id,$name,$category,$ngo,$advertiser,$json,$like,$share,$follow,$facebook,$twitter,$google,$status,$order,$views,$video,$content,$contribution,$times,$donate,$tagline,$image,$video2,$cardtagline,$indiandoner,$foreigndoner,$project,$timesinword,$facebooktext,$twittertext,$sharevalue,$cardimage,$sharevalue,$location,$timesinwordforshare,$remembersharevalue)
    {
        $data=array(
            "name" => $name,
            "category" => $category,
            "ngo" => $ngo,
            "advertiser" => $advertiser,
            "json" => $json,
            "like" => $like,
            "raiseawareness" => $share,
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
            "cardtagline" => $cardtagline,
            "indiandoner" => $indiandoner,
            "foreigndoner" => $foreigndoner,
            "image" => $image,
            "video" => $video,
            "timesinword" => $timesinword,
            "facebooktext" => $facebooktext,
            "twittertext" => $twittertext,
            "sharevalue" => $sharevalue,
            "cardimage" => $cardimage,
            "location" => $location,
            "timesinwordforshare" => $timesinwordforshare,
            "remembersharevalue" => $remembersharevalue,
            "video2" => $video2
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "powerforone_project", $data );
        $querydelete=$this->db->query("DELETE FROM `similercauses` WHERE `projectid`='$id'");
        foreach($project AS $key=>$value)
        {
            $this->project_model->createsimilercausebyproduct($value,$id);
        }
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
    
	public function getprojectcardimagebyid($id)
	{
		$query=$this->db->query("SELECT `cardimage` FROM `powerforone_project` WHERE `id`='$id'")->row();
		return $query;
	}
    
        
     public function getsimilarcausebyproject($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`projectid`,`similarprojectid` FROM `similercauses`  WHERE `projectid`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->similarprojectid;
            }
        }
         return $return;	
	}
}
?>
