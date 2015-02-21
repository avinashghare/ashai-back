<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class projectenquiry_model extends CI_Model
{
	//topic
	public function create($project,$name,$comment,$user,$email)
	{
		$data  = array(
			'project' => $project,
			'name' => $name,
			'comment' => $comment,
			'email' => $email,
			'user' => $user
		);
		$query=$this->db->insert( 'projectenquiry', $data );
		
		return  1;
	}
	function viewprojectenquirybyproject($id)
	{
		$query="SELECT `projectenquiry`.`id`,`projectenquiry`.`project`, `projectenquiry`.`comment`, `projectenquiry`.`name`, `projectenquiry`.`email`,`projectenquiry`.`timestamp`, `projectenquiry`.`user`, `user`.`name` AS `username`, `powerforone_project`.`name` AS `projectname`
        FROM `projectenquiry` LEFT OUTER JOIN `powerforone_project` ON `powerforone_project`.`id`=`projectenquiry`.`project` LEFT OUTER JOIN `user` ON `user`.`id`=`projectenquiry`.`user` WHERE `projectenquiry`.`project`='$id'";
        $result=$this->db->query($query)->result();
        
        return $result;
        
//		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'projectenquiry' )->row();
		return $query;
	}
    
	public function getprojectenquirybyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `projectenquiry` WHERE `id`='$id'")->row();
		return $query;
	}
	
	public function edit( $id,$project,$name,$comment,$user,$email)
	{
		$data = array(
			'project' => $project,
			'name' => $name,
			'comment' => $comment,
			'email' => $email,
			'user' => $user
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'projectenquiry', $data );
		
		return 1;
	}
	function deleteprojectenquiry($id)
	{
		$query=$this->db->query("DELETE FROM `projectenquiry` WHERE `id`='$id'");
		
	}
    
     public function getprojectdropdown()
	{
		$query=$this->db->query("SELECT * FROM `project`  ORDER BY `id` ASC")->result();
		$return=array();
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
    
    
}
?>