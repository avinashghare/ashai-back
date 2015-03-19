<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class Testimonial_model extends CI_Model
{
    public function create($name,$content,$order,$image)
    {
        $data=array(
                    "name" => $name,
                    "content" => $content,
                    "order" => $order,
                    "image" => $image
                   );
        $query=$this->db->insert( "testimonial", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("testimonial")->row();
        return $query;
    }
    function getsingletestimonial($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("testimonial")->row();
        return $query;
    }
    public function edit($id,$name,$content,$order,$image)
    {
        $data=array(
            "name" => $name,
            "content" => $content,
            "order" => $order,
            "image" => $image
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "testimonial", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `testimonial` WHERE `id`='$id'");
        return $query;
    }
    public function gettestimonialdropdown()
	{
		$query=$this->db->query("SELECT * FROM `testimonial`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
     
	public function gettestimonialimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `testimonial` WHERE `id`='$id'")->row();
		return $query;
	}
}
?>
