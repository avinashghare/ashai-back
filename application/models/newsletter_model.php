<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class Newsletter_model extends CI_Model
{
    public function create($email)
    {
        $data=array(
                    "email" => $email
                   );
        $query=$this->db->insert( "newsletter", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("newsletter")->row();
        return $query;
    }
    function getsinglenewsletter($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("newsletter")->row();
        return $query;
    }
    public function edit($id,$email)
    {
        $data=array(
            "email" => $email
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "newsletter", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `newsletter` WHERE `id`='$id'");
        return $query;
    }
    public function getnewsletterdropdown()
	{
		$query=$this->db->query("SELECT * FROM `newsletter`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
     
	public function getnewsletterimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `newsletter` WHERE `id`='$id'")->row();
		return $query;
	}
    
    function exportnewsletter()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `newsletter`.`id`,`newsletter`.`email` FROM `newsletter`");

        $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';

        if ( ! write_file('./uploads/newsletter.csv', $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url('uploads/newsletter.csv'), 'refresh');
             echo 'File written!';
        }
//        file_put_contents("gs://toykraftdealer/retailerfilefromdashboard_$timestamp.csv", $content);
//		redirect("http://admin.toy-kraft.com/servepublic?name=retailerfilefromdashboard_$timestamp.csv", 'refresh');
	}
}
?>
