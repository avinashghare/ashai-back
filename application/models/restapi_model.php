<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class restapi_model extends CI_Model
{
    public function getsingleproject($id)
    {
        $query['project']=$this->db->query("SELECT `powerforone_project`.`id`, `powerforone_project`.`name`, `powerforone_project`.`category`, `powerforone_project`.`ngo`, `powerforone_project`.`advertiser`, `powerforone_project`.`json`, `powerforone_project`.`like`, `powerforone_project`.`share`, `powerforone_project`.`follow`, `powerforone_project`.`facebook`, `powerforone_project`.`twitter`, `powerforone_project`.`google`, `powerforone_project`.`status`, `powerforone_project`.`order`, `powerforone_project`.`views`, `powerforone_project`.`video`, `powerforone_project`.`image`, `powerforone_project`.`content`, `powerforone_project`.`contribution`, `powerforone_project`.`times`, `powerforone_project`.`donate`, `powerforone_project`.`tagline`, `powerforone_project`.`video2`, `powerforone_project`.`cardtagline`, `powerforone_project`.`indiandoner`, `powerforone_project`.`foreigndoner`,`powerforone_ngo`.`name`AS `ngoname`,`powerforone_category`.`name`AS `categoryname` ,`powerforone_advertiser`.`image` AS `advertiserimage`,`powerforone_ngo`.`image` AS `ngoimage`
FROM `powerforone_project`
LEFT OUTER JOIN `powerforone_category` ON `powerforone_project`.`category`=`powerforone_category`.`id` 
LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_project`.`ngo`=`powerforone_ngo`.`id` 
LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_project`.`advertiser`=`powerforone_advertiser`.`id` 
WHERE `powerforone_project`.`id`='$id'")->row();
        
        $query['datapoint']=$this->db->query("SELECT `projectdatapoint`.`id`, `projectdatapoint`.`name`, `projectdatapoint`.`project`, `projectdatapoint`.`image`
FROM `projectdatapoint`
WHERE `projectdatapoint`.`project`='$id'")->result();
        
        $query['projectimages']=$this->db->query("SELECT `projectimage`.`id`, `projectimage`.`project`, `projectimage`.`image`, `projectimage`.`order` 
FROM `projectimage` 
WHERE `projectimage`.`project`='$id'")->result();
    
        $query['similarcauses']=$this->db->query("SELECT `similercauses`.`id`, `similercauses`.`projectid`, `similercauses`.`similarprojectid`,  `powerforone_project`.`name`, `powerforone_project`.`category`, `powerforone_project`.`ngo`, `powerforone_project`.`advertiser`, `powerforone_project`.`json`, `powerforone_project`.`like`, `powerforone_project`.`share`, `powerforone_project`.`follow`, `powerforone_project`.`facebook`, `powerforone_project`.`twitter`, `powerforone_project`.`google`, `powerforone_project`.`status`, `powerforone_project`.`order`, `powerforone_project`.`views`, `powerforone_project`.`video`, `powerforone_project`.`image`, `powerforone_project`.`content`, `powerforone_project`.`contribution`, `powerforone_project`.`times`, `powerforone_project`.`donate`, `powerforone_project`.`tagline`, `powerforone_project`.`video2`, `powerforone_project`.`cardtagline`, `powerforone_project`.`indiandoner`, `powerforone_project`.`foreigndoner`,`powerforone_ngo`.`name`AS `ngoname`,`powerforone_category`.`name`AS `categoryname`
FROM `similercauses` 
LEFT OUTER JOIN `powerforone_project` ON `powerforone_project`.`id`= `similercauses`.`projectid`
LEFT OUTER JOIN `powerforone_category` ON `powerforone_project`.`category`=`powerforone_category`.`id` 
LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_project`.`ngo`=`powerforone_ngo`.`id`
WHERE  `similercauses`.`projectid`='$id' LIMIT 0,3")->result();
    
        return $query;
    }
    public function createnewsletter($email)
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
    
    public function getstaticpages()
    {
        $query=$this->db->query("SELECT `id`, `name`, `content`, `order`, `image`, `bannerimage` FROM `staticpage`")->result();
        return $query;
    }
    public function getsinglestaticpage($id)
    {
        
        $query=$this->db->query("SELECT `id`, `name`, `content`, `order`, `image`, `bannerimage` FROM `staticpage` WHERE `id`='$id'")->result();
        return $query;
    }
}
?>
