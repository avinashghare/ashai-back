<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class projectimage_model extends CI_Model
{
	//topic
	public function create($project,$image,$order)
	{
		$data  = array(
			'project' => $project,
			'order' => $order,
			'image' => $image
		);
		$query=$this->db->insert( 'projectimage', $data );
		
		return  1;
	}
	function viewprojectimagebyproject($id)
	{
		$query="SELECT `projectimage`.`id`,`projectimage`.`project`,`projectimage`.`order`, `projectimage`.`image`, `powerforone_project`.`name` AS `projectname`
        FROM `projectimage` LEFT OUTER JOIN `powerforone_project` ON `powerforone_project`.`id`=`projectimage`.`project` WHERE `projectimage`.`project`='$id' ORDER BY `projectimage`.`order`";
        $result=$this->db->query($query)->result();
        
        return $result;
        
//		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'projectimage' )->row();
		return $query;
	}
    
	public function getprojectimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `projectimage` WHERE `id`='$id'")->row();
		return $query;
	}
	
	public function edit( $id,$project,$image,$order)
	{
		$data = array(
			'project' => $project,
			'order' => $order,
			'image' => $image
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'projectimage', $data );
		
		return 1;
	}
	function deleteprojectimage($id)
	{
		$query=$this->db->query("DELETE FROM `projectimage` WHERE `id`='$id'");
		
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