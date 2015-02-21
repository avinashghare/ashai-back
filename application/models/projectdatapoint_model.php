<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class projectdatapoint_model extends CI_Model
{
	//topic
	public function create($project,$image,$name)
	{
		$data  = array(
			'project' => $project,
			'name' => $name,
			'image' => $image
		);
		$query=$this->db->insert( 'projectdatapoint', $data );
		
		return  1;
	}
	function viewprojectdatapointbyproject($id)
	{
		$query="SELECT `projectdatapoint`.`id`,`projectdatapoint`.`project`, `projectdatapoint`.`image`,`projectdatapoint`.`name`, `powerforone_project`.`name` AS `projectname`
        FROM `projectdatapoint` LEFT OUTER JOIN `powerforone_project` ON `powerforone_project`.`id`=`projectdatapoint`.`project` WHERE `projectdatapoint`.`project`='$id'";
        $result=$this->db->query($query)->result();
        
        return $result;
        
//		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'projectdatapoint' )->row();
		return $query;
	}
    
	public function getprojectdatapointbyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `projectdatapoint` WHERE `id`='$id'")->row();
		return $query;
	}
	
	public function edit( $id,$project,$image,$name)
	{
		$data = array(
			'project' => $project,
			'name' => $name,
			'image' => $image
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'projectdatapoint', $data );
		
		return 1;
	}
	function deleteprojectdatapoint($id)
	{
		$query=$this->db->query("DELETE FROM `projectdatapoint` WHERE `id`='$id'");
		
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