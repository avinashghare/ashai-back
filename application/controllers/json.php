<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller 
{
    //home page json
  
      function viewtestimonialjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`testimonial`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`testimonial`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`testimonial`.`content`";
        $elements[2]->sort="1";
        $elements[2]->header="Content";
        $elements[2]->alias="content";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`testimonial`.`order`";
        $elements[3]->sort="1";
        $elements[3]->header="Order";
        $elements[3]->alias="order";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`testimonial`.`image`";
        $elements[4]->sort="1";
        $elements[4]->header="image";
        $elements[4]->alias="image";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `testimonial`");
        $this->load->view("json",$data);
    }
     
     function viewprojectjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`powerforone_project`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`powerforone_project`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`powerforone_category`.`name`";
        $elements[2]->sort="1";
        $elements[2]->header="Category";
        $elements[2]->alias="category";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`powerforone_project`.`tagline`";
        $elements[3]->sort="1";
        $elements[3]->header="tagline";
        $elements[3]->alias="tagline";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`powerforone_project`.`cardtagline`";
        $elements[4]->sort="1";
        $elements[4]->header="cardtagline";
        $elements[4]->alias="cardtagline";
         
      
        $elements[5]=new stdClass();
        $elements[5]->field="`powerforone_ngo`.`name`";
        $elements[5]->sort="1";
        $elements[5]->header="ngoname";
        $elements[5]->alias="ngoname";
         
        $elements[5]=new stdClass();
        $elements[5]->field="`powerforone_ngo`.`image`";
        $elements[5]->sort="1";
        $elements[5]->header="ngoimage";
        $elements[5]->alias="ngoimage";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`powerforone_project`.`image`";
        $elements[6]->sort="1";
        $elements[6]->header="image";
        $elements[6]->alias="image";
        
//        

        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_project` LEFT OUTER JOIN `powerforone_category` ON `powerforone_category`.`id`=`powerforone_project`.`category` LEFT OUTER JOIN `powerforone_ngo` ON  `powerforone_ngo`.`id`=`powerforone_project`.`ngo`");
        $this->load->view("json",$data);
    }
    
    //campaign page json
function viewstaticpage()
    {
//        SELECT `category`.`id`,`category`.`name`,`category`.`image`,`tab2`.`name` as `parent` FROM `category` 
//		LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`
//		ORDER BY `category`.`id` ASC
            
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`staticpage`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="id";
        $elements[0]->alias="id";
    
        $elements[0]->field="`powerforone_project`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="name";
        $elements[0]->alias="name";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`powerforone_project`.`content`";
        $elements[1]->sort="1";
        $elements[1]->header="content";
        $elements[1]->alias="content";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`dataponts`.`name`";
        $elements[2]->sort="1";
        $elements[2]->header="datapoints";
        $elements[2]->alias="datapoints";
     
        $elements[3]=new stdClass();
        $elements[3]->field="`projimg`.`image`";
        $elements[3]->sort="1";
        $elements[3]->header="image";
        $elements[3]->alias="image";
    
        $elements[4]=new stdClass();
        $elements[4]->field="`powerforone_project`.`indiandoner`";
        $elements[4]->sort="1";
        $elements[4]->header="indiandonar";
        $elements[4]->alias="indiandonar";
   
        $elements[5]=new stdClass();
        $elements[5]->field="`powerforone_project`.`foreigndoner`";
        $elements[5]->sort="1";
        $elements[5]->header="foreigndoner";
        $elements[5]->alias="foreigndoner";
    
        $elements[5]=new stdClass();
        $elements[5]->field="`powerforone_project`.`contribution`";
        $elements[5]->sort="1";
        $elements[5]->header="plelded";
        $elements[5]->alias="plelded"; 
   
        $elements[6]=new stdClass();
        $elements[6]->field="`powerforone_project`.`share`";
        $elements[6]->sort="1";
        $elements[6]->header="share";
        $elements[6]->alias="share";
        
     $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        
        if($maxrow=="")
        {
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_project` LEFT OUTER JOIN `projectdatapoint` as `dataponts` ON `dataponts`.`project`=`powerforone_project`.`id` LEFT OUTER JOIN `projectdatapoint` as `projimg` ON  `projimg`.`project`=`powerforone_project`.`id` ");
        $this->load->view("json",$data);
    }
 function getallcategory()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`powerforone_category`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";


$elements[1]=new stdClass();
$elements[1]->field="`powerforone_category`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";


$elements[2]=new stdClass();
$elements[2]->field="`powerforone_category`.`parent`";
$elements[2]->sort="1";
$elements[2]->header="Parent";
$elements[2]->alias="parent";


$elements[3]=new stdClass();
$elements[3]->field="`powerforone_category`.`json`";
$elements[3]->sort="1";
$elements[3]->header="Json";
$elements[3]->alias="json";


$elements[4]=new stdClass();
$elements[4]->field="`powerforone_category`.`order`";
$elements[4]->sort="1";
$elements[4]->header="Order";
$elements[4]->alias="order";


$elements[5]=new stdClass();
$elements[5]->field="`powerforone_category`.`views`";
$elements[5]->sort="1";
$elements[5]->header="Views";
$elements[5]->alias="views";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_category`");
$this->load->view("json",$data);
}
public function getsinglecategory()
{
$id=$this->input->get_post("id");
$data["message"]=$this->category_model->getsinglecategory($id);
$this->load->view("json",$data);
}
function getallproject()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`powerforone_project`.`id`";
$elements[0]->sort="1";
$elements[0]->header="ID";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`powerforone_project`.`name`";
$elements[1]->sort="1";
$elements[1]->header="Name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`powerforone_project`.`category`";
$elements[2]->sort="1";
$elements[2]->header="Category";
$elements[2]->alias="category";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`powerforone_project`.`ngo`";
$elements[3]->sort="1";
$elements[3]->header="NGO";
$elements[3]->alias="ngo";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`powerforone_project`.`advertiser`";
$elements[4]->sort="1";
$elements[4]->header="Advertiser";
$elements[4]->alias="advertiser";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`powerforone_project`.`json`";
$elements[5]->sort="1";
$elements[5]->header="Json";
$elements[5]->alias="json";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`powerforone_project`.`like`";
$elements[6]->sort="1";
$elements[6]->header="Likes";
$elements[6]->alias="like";

$elements=array();
$elements[7]=new stdClass();
$elements[7]->field="`powerforone_project`.`share`";
$elements[7]->sort="1";
$elements[7]->header="Share";
$elements[7]->alias="share";

$elements=array();
$elements[8]=new stdClass();
$elements[8]->field="`powerforone_project`.`follow`";
$elements[8]->sort="1";
$elements[8]->header="Follow";
$elements[8]->alias="follow";

$elements=array();
$elements[9]=new stdClass();
$elements[9]->field="`powerforone_project`.`facebook`";
$elements[9]->sort="1";
$elements[9]->header="Facebook";
$elements[9]->alias="facebook";

$elements=array();
$elements[10]=new stdClass();
$elements[10]->field="`powerforone_project`.`twitter`";
$elements[10]->sort="1";
$elements[10]->header="Twitter";
$elements[10]->alias="twitter";

$elements=array();
$elements[11]=new stdClass();
$elements[11]->field="`powerforone_project`.`google`";
$elements[11]->sort="1";
$elements[11]->header="Google";
$elements[11]->alias="google";

$elements=array();
$elements[12]=new stdClass();
$elements[12]->field="`powerforone_project`.`status`";
$elements[12]->sort="1";
$elements[12]->header="Status";
$elements[12]->alias="status";

$elements=array();
$elements[13]=new stdClass();
$elements[13]->field="`powerforone_project`.`order`";
$elements[13]->sort="1";
$elements[13]->header="Order";
$elements[13]->alias="order";

$elements=array();
$elements[14]=new stdClass();
$elements[14]->field="`powerforone_project`.`views`";
$elements[14]->sort="1";
$elements[14]->header="Views";
$elements[14]->alias="views";

$elements=array();
$elements[15]=new stdClass();
$elements[15]->field="`powerforone_project`.`video`";
$elements[15]->sort="1";
$elements[15]->header="Video";
$elements[15]->alias="video";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_project`");
$this->load->view("json",$data);
}
     function getprojectbycategory()
  {
        
     $where="WHERE `powerforone_project`.`status`=1";
     $category=$this->input->get_post('category');
     if($category==0)
     {
     
     }
     else
     {
        $where.=" AND `powerforone_project`.`category`='$category'";
     }
    $elements=array();
    $elements[0]=new stdClass();
    $elements[0]->field="`powerforone_project`.`id`";
    $elements[0]->sort="1";
    $elements[0]->header="ID";
    $elements[0]->alias="id";


    $elements[1]=new stdClass();
    $elements[1]->field="`powerforone_project`.`name`";
    $elements[1]->sort="1";
    $elements[1]->header="Name";
    $elements[1]->alias="name";


    $elements[2]=new stdClass();
    $elements[2]->field="`powerforone_project`.`category`";
    $elements[2]->sort="1";
    $elements[2]->header="Category";
    $elements[2]->alias="category";


    $elements[3]=new stdClass();
    $elements[3]->field="`powerforone_project`.`ngo`";
    $elements[3]->sort="1";
    $elements[3]->header="NGO";
    $elements[3]->alias="ngo";


    $elements[4]=new stdClass();
    $elements[4]->field="`powerforone_project`.`advertiser`";
    $elements[4]->sort="1";
    $elements[4]->header="Advertiser";
    $elements[4]->alias="advertiser";


    $elements[5]=new stdClass();
    $elements[5]->field="`powerforone_project`.`json`";
    $elements[5]->sort="1";
    $elements[5]->header="Json";
    $elements[5]->alias="json";


    $elements[6]=new stdClass();
    $elements[6]->field="`powerforone_project`.`like`";
    $elements[6]->sort="1";
    $elements[6]->header="Likes";
    $elements[6]->alias="like";


    $elements[7]=new stdClass();
    $elements[7]->field="`powerforone_project`.`share`";
    $elements[7]->sort="1";
    $elements[7]->header="Share";
    $elements[7]->alias="share";


    $elements[8]=new stdClass();
    $elements[8]->field="`powerforone_project`.`follow`";
    $elements[8]->sort="1";
    $elements[8]->header="Follow";
    $elements[8]->alias="follow";


    $elements[9]=new stdClass();
    $elements[9]->field="`powerforone_project`.`facebook`";
    $elements[9]->sort="1";
    $elements[9]->header="Facebook";
    $elements[9]->alias="facebook";


    $elements[10]=new stdClass();
    $elements[10]->field="`powerforone_project`.`twitter`";
    $elements[10]->sort="1";
    $elements[10]->header="Twitter";
    $elements[10]->alias="twitter";


    $elements[11]=new stdClass();
    $elements[11]->field="`powerforone_project`.`google`";
    $elements[11]->sort="1";
    $elements[11]->header="Google";
    $elements[11]->alias="google";


    $elements[12]=new stdClass();
    $elements[12]->field="`powerforone_project`.`status`";
    $elements[12]->sort="1";
    $elements[12]->header="Status";
    $elements[12]->alias="status";


    $elements[13]=new stdClass();
    $elements[13]->field="`powerforone_project`.`order`";
    $elements[13]->sort="1";
    $elements[13]->header="Order";
    $elements[13]->alias="order";


    $elements[14]=new stdClass();
    $elements[14]->field="`powerforone_project`.`views`";
    $elements[14]->sort="1";
    $elements[14]->header="Views";
    $elements[14]->alias="views";


    $elements[15]=new stdClass();
    $elements[15]->field="`powerforone_project`.`video`";
    $elements[15]->sort="1";
    $elements[15]->header="Video";
    $elements[15]->alias="video";


    $elements[16]=new stdClass();
    $elements[16]->field="`powerforone_ngo`.`name`";
    $elements[16]->sort="1";
    $elements[16]->header="ngoname";
    $elements[16]->alias="ngoname";


    $elements[17]=new stdClass();
    $elements[17]->field="`powerforone_category`.`name`";
    $elements[17]->sort="1";
    $elements[17]->header="categoryname";
    $elements[17]->alias="categoryname";

    $elements[18]=new stdClass();
    $elements[18]->field="`powerforone_project`.`image`";
    $elements[18]->sort="1";
    $elements[18]->header="image";
    $elements[18]->alias="image";

    $elements[19]=new stdClass();
    $elements[19]->field="`powerforone_ngo`.`image`";
    $elements[19]->sort="1";
    $elements[19]->header="ngoimage";
    $elements[19]->alias="ngoimage";

    $elements[20]=new stdClass();
    $elements[20]->field="`powerforone_project`.`tagline`";
    $elements[20]->sort="1";
    $elements[20]->header="tagline";
    $elements[20]->alias="tagline";

    $elements[21]=new stdClass();
    $elements[21]->field="`powerforone_project`.`cardtagline`";
    $elements[21]->sort="1";
    $elements[21]->header="cardtagline";
    $elements[21]->alias="cardtagline";

    $elements[22]=new stdClass();
    $elements[22]->field="`powerforone_project`.`cardimage`";
    $elements[22]->sort="1";
    $elements[22]->header="cardimage";
    $elements[22]->alias="cardimage";

    $elements[23]=new stdClass();
    $elements[23]->field="`powerforone_ngo`.`website`";
    $elements[23]->sort="1";
    $elements[23]->header="ngowebsite";
    $elements[23]->alias="ngowebsite";

    $elements[24]=new stdClass();
    $elements[24]->field="`powerforone_advertiser`.`image`";
    $elements[24]->sort="1";
    $elements[24]->header="advertiserimage";
    $elements[24]->alias="advertiserimage";

    $elements[25]=new stdClass();
    $elements[25]->field="`powerforone_project`.`location`";
    $elements[25]->sort="1";
    $elements[25]->header="location";
    $elements[25]->alias="location";

    $elements[26]=new stdClass();
    $elements[26]->field="`powerforone_advertiser`.`website`";
    $elements[26]->sort="1";
    $elements[26]->header="advertiserwebsite";
    $elements[26]->alias="advertiserwebsite";

    $elements[27]=new stdClass();
    $elements[27]->field="`powerforone_project`.`timesinwordforshare`";
    $elements[27]->sort="1";
    $elements[27]->header="timesinwordforshare";
    $elements[27]->alias="timesinwordforshare";

    $elements[28]=new stdClass();
    $elements[28]->field="`powerforone_project`.`remembersharevalue`";
    $elements[28]->sort="1";
    $elements[28]->header="remembersharevalue";
    $elements[28]->alias="remembersharevalue";

    $search=$this->input->get_post("search");
    $pageno=$this->input->get_post("pageno");
    $orderby=$this->input->get_post("orderby");
    $orderorder=$this->input->get_post("orderorder");
    $maxrow=$this->input->get_post("maxrow");
    if($maxrow=="")
    {
        $maxrow=20;
    }
    
    if($orderby=="")
    {
        $orderby="order";
        $orderorder="ASC";
    }
    $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_project` LEFT OUTER JOIN `powerforone_category` ON `powerforone_project`.`category`=`powerforone_category`.`id` LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_project`.`ngo`=`powerforone_ngo`.`id` LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_project`.`advertiser`=`powerforone_advertiser`.`id`",$where);
    $this->load->view("json",$data);
  }
     function getprojectbycategoryarray()
  {
        
     $where="WHERE `powerforone_project`.`status`=1";
     $category=$this->input->get_post('category');
     if(empty($category))
     {
     
     }
     else
     {
        $where.=" AND `powerforone_project`.`category` IN ($category)";
     }
    $elements=array();
    $elements[0]=new stdClass();
    $elements[0]->field="`powerforone_project`.`id`";
    $elements[0]->sort="1";
    $elements[0]->header="ID";
    $elements[0]->alias="id";


    $elements[1]=new stdClass();
    $elements[1]->field="`powerforone_project`.`name`";
    $elements[1]->sort="1";
    $elements[1]->header="Name";
    $elements[1]->alias="name";


    $elements[2]=new stdClass();
    $elements[2]->field="`powerforone_project`.`category`";
    $elements[2]->sort="1";
    $elements[2]->header="Category";
    $elements[2]->alias="category";


    $elements[3]=new stdClass();
    $elements[3]->field="`powerforone_project`.`ngo`";
    $elements[3]->sort="1";
    $elements[3]->header="NGO";
    $elements[3]->alias="ngo";


    $elements[4]=new stdClass();
    $elements[4]->field="`powerforone_project`.`advertiser`";
    $elements[4]->sort="1";
    $elements[4]->header="Advertiser";
    $elements[4]->alias="advertiser";


    $elements[5]=new stdClass();
    $elements[5]->field="`powerforone_project`.`json`";
    $elements[5]->sort="1";
    $elements[5]->header="Json";
    $elements[5]->alias="json";


    $elements[6]=new stdClass();
    $elements[6]->field="`powerforone_project`.`like`";
    $elements[6]->sort="1";
    $elements[6]->header="Likes";
    $elements[6]->alias="like";


    $elements[7]=new stdClass();
    $elements[7]->field="`powerforone_project`.`share`";
    $elements[7]->sort="1";
    $elements[7]->header="Share";
    $elements[7]->alias="share";


    $elements[8]=new stdClass();
    $elements[8]->field="`powerforone_project`.`follow`";
    $elements[8]->sort="1";
    $elements[8]->header="Follow";
    $elements[8]->alias="follow";


    $elements[9]=new stdClass();
    $elements[9]->field="`powerforone_project`.`facebook`";
    $elements[9]->sort="1";
    $elements[9]->header="Facebook";
    $elements[9]->alias="facebook";


    $elements[10]=new stdClass();
    $elements[10]->field="`powerforone_project`.`twitter`";
    $elements[10]->sort="1";
    $elements[10]->header="Twitter";
    $elements[10]->alias="twitter";


    $elements[11]=new stdClass();
    $elements[11]->field="`powerforone_project`.`google`";
    $elements[11]->sort="1";
    $elements[11]->header="Google";
    $elements[11]->alias="google";


    $elements[12]=new stdClass();
    $elements[12]->field="`powerforone_project`.`status`";
    $elements[12]->sort="1";
    $elements[12]->header="Status";
    $elements[12]->alias="status";


    $elements[13]=new stdClass();
    $elements[13]->field="`powerforone_project`.`order`";
    $elements[13]->sort="1";
    $elements[13]->header="Order";
    $elements[13]->alias="order";


    $elements[14]=new stdClass();
    $elements[14]->field="`powerforone_project`.`views`";
    $elements[14]->sort="1";
    $elements[14]->header="Views";
    $elements[14]->alias="views";


    $elements[15]=new stdClass();
    $elements[15]->field="`powerforone_project`.`video`";
    $elements[15]->sort="1";
    $elements[15]->header="Video";
    $elements[15]->alias="video";


    $elements[16]=new stdClass();
    $elements[16]->field="`powerforone_ngo`.`name`";
    $elements[16]->sort="1";
    $elements[16]->header="ngoname";
    $elements[16]->alias="ngoname";


    $elements[17]=new stdClass();
    $elements[17]->field="`powerforone_category`.`name`";
    $elements[17]->sort="1";
    $elements[17]->header="categoryname";
    $elements[17]->alias="categoryname";

    $elements[18]=new stdClass();
    $elements[18]->field="`powerforone_project`.`image`";
    $elements[18]->sort="1";
    $elements[18]->header="image";
    $elements[18]->alias="image";

    $elements[19]=new stdClass();
    $elements[19]->field="`powerforone_ngo`.`image`";
    $elements[19]->sort="1";
    $elements[19]->header="ngoimage";
    $elements[19]->alias="ngoimage";

    $elements[20]=new stdClass();
    $elements[20]->field="`powerforone_project`.`tagline`";
    $elements[20]->sort="1";
    $elements[20]->header="tagline";
    $elements[20]->alias="tagline";

    $elements[21]=new stdClass();
    $elements[21]->field="`powerforone_project`.`cardtagline`";
    $elements[21]->sort="1";
    $elements[21]->header="cardtagline";
    $elements[21]->alias="cardtagline";

    $elements[22]=new stdClass();
    $elements[22]->field="`powerforone_project`.`cardimage`";
    $elements[22]->sort="1";
    $elements[22]->header="cardimage";
    $elements[22]->alias="cardimage";

    $elements[23]=new stdClass();
    $elements[23]->field="`powerforone_ngo`.`website`";
    $elements[23]->sort="1";
    $elements[23]->header="ngowebsite";
    $elements[23]->alias="ngowebsite";

    $elements[24]=new stdClass();
    $elements[24]->field="`powerforone_advertiser`.`image`";
    $elements[24]->sort="1";
    $elements[24]->header="advertiserimage";
    $elements[24]->alias="advertiserimage";

    $elements[25]=new stdClass();
    $elements[25]->field="`powerforone_project`.`location`";
    $elements[25]->sort="1";
    $elements[25]->header="location";
    $elements[25]->alias="location";

    $elements[26]=new stdClass();
    $elements[26]->field="`powerforone_advertiser`.`website`";
    $elements[26]->sort="1";
    $elements[26]->header="advertiserwebsite";
    $elements[26]->alias="advertiserwebsite";

    $elements[27]=new stdClass();
    $elements[27]->field="`powerforone_project`.`timesinwordforshare`";
    $elements[27]->sort="1";
    $elements[27]->header="timesinwordforshare";
    $elements[27]->alias="timesinwordforshare";

    $elements[28]=new stdClass();
    $elements[28]->field="`powerforone_project`.`remembersharevalue`";
    $elements[28]->sort="1";
    $elements[28]->header="remembersharevalue";
    $elements[28]->alias="remembersharevalue";

    $search=$this->input->get_post("search");
    $pageno=$this->input->get_post("pageno");
    $orderby=$this->input->get_post("orderby");
    $orderorder=$this->input->get_post("orderorder");
    $maxrow=$this->input->get_post("maxrow");
    if($maxrow=="")
    {
        $maxrow=20;
    }
    
    if($orderby=="")
    {
        $orderby="order";
        $orderorder="ASC";
    }
    $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_project` LEFT OUTER JOIN `powerforone_category` ON `powerforone_project`.`category`=`powerforone_category`.`id` LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_project`.`ngo`=`powerforone_ngo`.`id`  LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_project`.`advertiser`=`powerforone_advertiser`.`id`",$where, "GROUP BY `powerforone_project`.`id` ");
    $this->load->view("json",$data);
  }
//public function getsingleproject()
//{
//$id=$this->input->get_post("id");
//$data["message"]=$this->project_model->getsingleproject($id);
//$this->load->view("json",$data);
//}
     public function getsingleproject()
  {
    $id=$this->input->get_post("id");
    $data["message"]=$this->restapi_model->getsingleproject($id);
    $this->load->view("json",$data);
  }
    
    
    public function createnewsletter()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // DIDNT GET THESE FIELS IN DATABASE
        //project type
        $email = $data['email'];
//        $email=$this->input->get_post('email');
        $data['message']=$this->restapi_model->createnewsletter($email);
        $this->load->view("json",$data);
        
    }
    
    public function getstaticpages()
    {
        $data['message']=$this->restapi_model->getstaticpages();
        $this->load->view("json",$data);
    }
    
    public function getsinglestaticpage()
    {
        $id=$this->input->get_post("id");
        $data['message']=$this->restapi_model->getsinglestaticpage($id);
        $this->load->view("json",$data);
    }
    
    public function createcontactus()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // DIDNT GET THESE FIELS IN DATABASE
        //project type
        $name = $data['name'];
        $contact = $data['contact'];
        $email = $data['email'];
        $country = $data['country'];
        $city = $data['city'];
        $message = $data['message'];
        
        $data['message']=$this->restapi_model-> createcontactus($name,$contact,$email,$country,$city,$message);
        
        $this->load->view('json', $data);
    }
    
    
    public function createworkwithus()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // DIDNT GET THESE FIELS IN DATABASE
        //project type
        $name = $data['name'];
        $contact = $data['contact'];
        $email = $data['email'];
        $country = $data['country'];
        $city = $data['city'];
        $message = $data['message'];
        
        $data['message']=$this->restapi_model-> createworkwithus($name,$contact,$email,$country,$city,$message);
        
        $this->load->view('json', $data);
    }
    
    public function createpfo()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        // DIDNT GET THESE FIELS IN DATABASE
        //project type
        $name = $data['name'];
        $contact = $data['contact'];
        $email = $data['email'];
        $country = $data['country'];
        $city = $data['city'];
        $message = $data['message'];
        
        $data['message']=$this->restapi_model-> createpfo($name,$contact,$email,$country,$city,$message);
        
        $this->load->view('json', $data);
    }
    function getallblog()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`blog`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`blog`.`title`";
        $elements[1]->sort="1";
        $elements[1]->header="Title";
        $elements[1]->alias="title";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`blog`.`image`";
        $elements[2]->sort="1";
        $elements[2]->header="image";
        $elements[2]->alias="image";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`blog`.`description`";
        $elements[3]->sort="1";
        $elements[3]->header="Description";
        $elements[3]->alias="description";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`blog`.`blogcategory`";
        $elements[4]->sort="1";
        $elements[4]->header="blogcategoryid";
        $elements[4]->alias="blogcategoryid";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`blogcategory`.`name`";
        $elements[5]->sort="1";
        $elements[5]->header="blogcategoryname";
        $elements[5]->alias="blogcategoryname";
        
        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
            $maxrow=2;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `blog` LEFT OUTER JOIN `blogcategory` ON `blog`.`blogcategory`=`blogcategory`.`id`");
        $this->load->view("json",$data);
    }
    
    
    public function getsingleblog()
    {
        $id=$this->input->get_post("id");
        $data['message']=$this->restapi_model->getsingleblog($id);
        $this->load->view("json",$data);
    }
    
    
    public function getsingleuser()
    {
        $id=$this->input->get_post("id");
//        $id=$this->session->userdata('id');
        $data['message']=$this->restapi_model->getsingleuser($id);
        $this->load->view("json",$data);
    }
    
    
    function getallngo()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`powerforone_ngo`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";


        $elements[1]=new stdClass();
        $elements[1]->field="`powerforone_ngo`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";


        $elements[2]=new stdClass();
        $elements[2]->field="`powerforone_ngo`.`address`";
        $elements[2]->sort="1";
        $elements[2]->header="Address";
        $elements[2]->alias="address";


        $elements[3]=new stdClass();
        $elements[3]->field="`powerforone_ngo`.`email`";
        $elements[3]->sort="1";
        $elements[3]->header="Email";
        $elements[3]->alias="email";


        $elements[4]=new stdClass();
        $elements[4]->field="`powerforone_ngo`.`json`";
        $elements[4]->sort="1";
        $elements[4]->header="Json";
        $elements[4]->alias="json";


        $elements[5]=new stdClass();
        $elements[5]->field="`powerforone_ngo`.`status`";
        $elements[5]->sort="1";
        $elements[5]->header="Status";
        $elements[5]->alias="status";


        $elements[6]=new stdClass();
        $elements[6]->field="`powerforone_ngo`.`website`";
        $elements[6]->sort="1";
        $elements[6]->header="Website";
        $elements[6]->alias="website";

        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_ngo`");
        $this->load->view("json",$data);
    }
    public function getsinglengo()
    {
        $id=$this->input->get_post("id");
        $data["message"]=$this->ngo_model->getsinglengo($id);
        $this->load->view("json",$data);
    }
    function getalladvertiser()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`powerforone_advertiser`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";


        $elements[1]=new stdClass();
        $elements[1]->field="`powerforone_advertiser`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

        $elements[2]=new stdClass();
        $elements[2]->field="`powerforone_advertiser`.`json`";
        $elements[2]->sort="1";
        $elements[2]->header="Json";
        $elements[2]->alias="json";

        $elements[3]=new stdClass();
        $elements[3]->field="`powerforone_advertiser`.`views`";
        $elements[3]->sort="1";
        $elements[3]->header="Views";
        $elements[3]->alias="views";

        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_advertiser`");
        $this->load->view("json",$data);
    }
    public function getsingleadvertiser()
    {
        $id=$this->input->get_post("id");
        $data["message"]=$this->advertiser_model->getsingleadvertiser($id);
        $this->load->view("json",$data);
    }
    function getallorder()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`powerforone_order`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";

        $elements[1]=new stdClass();
        $elements[1]->field="`powerforone_order`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";

        $elements[2]=new stdClass();
        $elements[2]->field="`powerforone_order`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";


        $elements[3]=new stdClass();
        $elements[3]->field="`powerforone_order`.`user`";
        $elements[3]->sort="1";
        $elements[3]->header="User";
        $elements[3]->alias="user";

        $elements[4]=new stdClass();
        $elements[4]->field="`powerforone_order`.`amount`";
        $elements[4]->sort="1";
        $elements[4]->header="Amount";
        $elements[4]->alias="amount";


        $elements[5]=new stdClass();
        $elements[5]->field="`powerforone_order`.`ngo`";
        $elements[5]->sort="1";
        $elements[5]->header="NGO";
        $elements[5]->alias="ngo";


        $elements[6]=new stdClass();
        $elements[6]->field="`powerforone_order`.`project`";
        $elements[6]->sort="1";
        $elements[6]->header="Project";
        $elements[6]->alias="project";

        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_order`");
        $this->load->view("json",$data);
    }
    public function getsingleorder()
    {
        $id=$this->input->get_post("id");
        $data["message"]=$this->order_model->getsingleorder($id);
        $this->load->view("json",$data);
    }
    function getallcouponold()
    {
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`powerforone_coupon`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";


        $elements[1]=new stdClass();
        $elements[1]->field="`powerforone_coupon`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";


        $elements[2]=new stdClass();
        $elements[2]->field="`powerforone_coupon`.`order`";
        $elements[2]->sort="1";
        $elements[2]->header="Order";
        $elements[2]->alias="order";


        $elements[3]=new stdClass();
        $elements[3]->field="`powerforone_coupon`.`json`";
        $elements[3]->sort="1";
        $elements[3]->header="Json";
        $elements[3]->alias="json";



        $elements[4]->field="`powerforone_coupon`.`text`";
        $elements[4]->sort="1";
        $elements[4]->header="Text";
        $elements[4]->alias="text";


        $elements[5]=new stdClass();
        $elements[5]->field="`powerforone_coupon`.`description`";
        $elements[5]->sort="1";
        $elements[5]->header="Description";
        $elements[5]->alias="description";

        $search=$this->input->get_post("search");
        $pageno=$this->input->get_post("pageno");
        $orderby=$this->input->get_post("orderby");
        $orderorder=$this->input->get_post("orderorder");
        $maxrow=$this->input->get_post("maxrow");
        if($maxrow=="")
        {
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_coupon`");
        $this->load->view("json",$data);
    }
    public function getsinglecoupon()
    {
        $id=$this->input->get_post("id");
        $data["message"]=$this->restapi_model->getsinglecoupon($id);
        $this->load->view("json",$data);
    }
    
     public function getallcoupon()
  {
    $data["message"]=$this->restapi_model->getallcoupon($id);
    $this->load->view("json",$data);
  }
    
    
    
    //for user authenticating and login
     public function login()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $email=$data['email'];
        $password=$data['password'];
//        $email=$this->input->get("email");
//        $password=$this->input->get("password");
        $data['message']=$this->user_model->login($email,$password);
        $this->load->view('json',$data);
    }
    public function logout()
    {
        $this->session->sess_destroy();
        
		$this->load->view('json',true);
    }
    public function authenticate()
    {
        $data['message']=$this->user_model->authenticate();
		$this->load->view('json',$data);
    }
    public function register()
    {
        
        $data = json_decode(file_get_contents('php://input'), true);
        $email=$data['email'];
        $password=$data['password'];
        $name=$data['name'];
        
//        $name=$this->input->get_post("name");
////        $lastname=$this->input->get_post("lastname");
////        $phoneno=$this->input->get_post("phoneno");
//        $email=$this->input->get_post("email");
//        $password=$this->input->get_post("password");
        $data['message']=$this->user_model->frontendsignup($name, $email, $password);
        $this->load->view('json',$data);
        
    }
    
     
    public function addpaymentdetailsold()
    {
//        $id=$this->input->get_post("id");
        $postvalue=$_POST;
        $ourjson=json_encode ($postvalue);
        $data['message']=$this->restapi_model->addpaymentdetails($ourjson);
        $this->load->view("json",$data);
    }
    
    public function createfrontendorder()
    {
        
        $data = json_decode(file_get_contents('php://input'), true);
        $name=$data['name'];
        $email=$data['email'];
        $mobile=$data['mobile'];
        $city=$data['city'];
        $address=$data['address'];
        $pan=$data['pan'];
        $dob=$data['dob'];
        $amount=$data['amount'];
        $project=$data['project'];
        $istax=$data['istax'];
        $anonymous=$data['anonymous'];
//        $user=$data['user'];
        $user=$this->session->userdata('id');
        
        
        $data['message']=$this->restapi_model->createfrontendorder($name,$email,$mobile,$city,$address,$pan,$dob,$amount,$project,$user,$istax,$anonymous);
        $this->load->view('json',$data);
        
    }
    
    
     public function addpaymentdetails()
    {
         
         
//        $id=$this->input->get_post("id");
        $postvalue=$_POST;
	   $postvalue["custom_fields"]=json_decode($postvalue["custom_fields"]);
        //$ourjson=json_encode($postvalue);

      $transactionid=$postvalue["payment_id"];
        $orderid=$postvalue["custom_fields"]->Field_99652->value;
         $status=$postvalue["status"];
         
// $postvalue["status"]=="Credit" status should be 2
        // $postvalue["payment_id"]  for transaction id
//$ourjson=$postvalue["custom_fields"]->Field_99652->value - this is orderid;
        $data['message']=$this->restapi_model->addpaymentdetails($orderid,$transactionid,$status);
        $this->load->view("json",$data);
    }
    //ends here user authenticate functions for frontend
    
} ?>