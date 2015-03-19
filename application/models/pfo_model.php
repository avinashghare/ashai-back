<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class pfo_model extends CI_Model
{
    public function create($name,$contact,$email,$country,$city,$message)
    {
        $data=array(
                    "name" => $name,
                    "contact" => $contact,
                    "email" => $email,
                    "country" => $country,
                    "city" => $city,
                    "message" => $message
                   );
        $query=$this->db->insert( "pfo", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("pfo")->row();
        return $query;
    }
    function getsinglepfo($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("pfo")->row();
        return $query;
    }
    public function edit($id,$name,$contact,$email,$country,$city,$message)
    {
        $data=array(
                    "name" => $name,
                    "contact" => $contact,
                    "email" => $email,
                    "country" => $country,
                    "city" => $city,
                    "message" => $message
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "pfo", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `pfo` WHERE `id`='$id'");
        return $query;
    }
    public function getpfodropdown()
	{
		$query=$this->db->query("SELECT * FROM `pfo`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
     
	public function getpfoimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `pfo` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
