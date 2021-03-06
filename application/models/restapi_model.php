<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class restapi_model extends CI_Model
{
    public function getsingleproject($id)
    {
        $query['project']=$this->db->query("SELECT `powerforone_project`.`id`, `powerforone_project`.`name`, `powerforone_project`.`category`, `powerforone_project`.`ngo`, `powerforone_project`.`advertiser`, `powerforone_project`.`json`, `powerforone_project`.`like`, `powerforone_project`.`share`, `powerforone_project`.`follow`, `powerforone_project`.`facebook`, `powerforone_project`.`twitter`, `powerforone_project`.`google`, `powerforone_project`.`status`, `powerforone_project`.`order`, `powerforone_project`.`views`, `powerforone_project`.`video`, `powerforone_project`.`image`, `powerforone_project`.`content`, `powerforone_project`.`contribution`, `powerforone_project`.`times`, `powerforone_project`.`donate`, `powerforone_project`.`tagline`, `powerforone_project`.`video2`, `powerforone_project`.`cardtagline`, `powerforone_project`.`indiandoner`, `powerforone_project`.`foreigndoner`,`powerforone_ngo`.`name`AS `ngoname`,`powerforone_category`.`name`AS `categoryname` ,`powerforone_advertiser`.`image` AS `advertiserimage`,`powerforone_ngo`.`image` AS `ngoimage`,`powerforone_project`.`cardimage` AS `cardimage`,`powerforone_project`.`timesinword` AS `timesinword`,`powerforone_project`.`facebooktext` AS `facebooktext`,`powerforone_project`.`twittertext` AS `twittertext`,`powerforone_project`.`sharevalue` AS `sharevalue`,`powerforone_advertiser`.`image` AS `advertiserimage`,`powerforone_project`.`location` AS `location`,`powerforone_ngo`.`website` AS `ngowebsite`,`powerforone_advertiser`.`website` AS `advertiserwebsite`,`powerforone_project`.`raiseawareness`AS `raiseawareness`,`powerforone_project`.`remembersharevalue`,`powerforone_project`.`timesinwordforshare`
FROM `powerforone_project`
LEFT OUTER JOIN `powerforone_category` ON `powerforone_project`.`category`=`powerforone_category`.`id`
LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_project`.`ngo`=`powerforone_ngo`.`id`
LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_project`.`advertiser`=`powerforone_advertiser`.`id`
WHERE `powerforone_project`.`id`='$id'")->row();
        $contribution=$query['project']->contribution;
        $queryamount=$this->db->query("SELECT SUM(`amount`) AS `totalamount` FROM `powerforone_order` WHERE `project`='$id' AND `transactionid` <> ''")->row();
        $totalprojectamount=$queryamount->totalamount;
        $percentage=($totalprojectamount/$contribution)*100;
//        $query['project']-
//        echo $percentage;
        $percentage=round ($percentage);
        $query['percent']=$percentage;
        $query['totalprojectamount']=$totalprojectamount;
        $query['datapoint']=$this->db->query("SELECT `projectdatapoint`.`id`, `projectdatapoint`.`name`, `projectdatapoint`.`project`, `projectdatapoint`.`image`
FROM `projectdatapoint`
WHERE `projectdatapoint`.`project`='$id'")->result();

        $query['projectimages']=$this->db->query("SELECT `projectimage`.`id`, `projectimage`.`project`, `projectimage`.`image`, `projectimage`.`order`
FROM `projectimage`
WHERE `projectimage`.`project`='$id'")->result();

        $query['similarcauses']=$this->db->query("SELECT `similercauses`.`id`, `similercauses`.`projectid`, `similercauses`.`similarprojectid`,  `powerforone_project`.`name`, `powerforone_project`.`category`, `powerforone_project`.`ngo`, `powerforone_project`.`advertiser`, `powerforone_project`.`json`, `powerforone_project`.`like`, `powerforone_project`.`share`, `powerforone_project`.`follow`, `powerforone_project`.`facebook`, `powerforone_project`.`twitter`, `powerforone_project`.`google`, `powerforone_project`.`status`, `powerforone_project`.`order`, `powerforone_project`.`views`, `powerforone_project`.`video`, `powerforone_project`.`image`, `powerforone_project`.`content`, `powerforone_project`.`contribution`, `powerforone_project`.`times`, `powerforone_project`.`donate`, `powerforone_project`.`tagline`, `powerforone_project`.`video2`, `powerforone_project`.`cardtagline`, `powerforone_project`.`indiandoner`, `powerforone_project`.`foreigndoner`,`powerforone_ngo`.`name`AS `ngoname`,`powerforone_category`.`name`AS `categoryname`,`powerforone_project`.`cardimage` AS `cardimage`,`powerforone_advertiser`.`image` AS `advertiserimage`,`powerforone_project`.`location` AS `location`,`powerforone_ngo`.`website` AS `ngowebsite`,`powerforone_ngo`.`image` AS `ngoimage`,`powerforone_advertiser`.`name` AS `advertisername`,`powerforone_advertiser`.`website` AS `advertiserwebsite`,`powerforone_project`.`remembersharevalue`,`powerforone_project`.`timesinwordforshare`
FROM `similercauses`
LEFT OUTER JOIN `powerforone_project` ON `powerforone_project`.`id`= `similercauses`.`similarprojectid`
LEFT OUTER JOIN `powerforone_category` ON `powerforone_project`.`category`=`powerforone_category`.`id`
LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_project`.`ngo`=`powerforone_ngo`.`id`
LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_project`.`advertiser`=`powerforone_advertiser`.`id`
WHERE  `similercauses`.`projectid`='$id' AND `powerforone_project`.`status`=1 LIMIT 0,3")->result();

        return $query;
    }

    public function getstaticpages()
    {
        $query=$this->db->query("SELECT `id`, `name`, `content`, `order`, `image`, `bannerimage` FROM `staticpage`")->result();
        return $query;
    }
    public function getallcoupon()
    {
        $query=$this->db->query("SELECT `id`, `name`, `order`, `json`, `text`, `description`, `image`, `expirydate`, `couponcode`, `companyname`,`status` FROM `powerforone_coupon` WHERE `status`=1 ORDER BY `order` LIMIT 0,4")->result();
        return $query;
    }
    public function getsinglecoupon($id)
    {
        $query=$this->db->query("SELECT `id`, `name`, `order`, `json`, `text`, `description`, `image`, `expirydate`, `couponcode`, `companyname` FROM `powerforone_coupon` WHERE `id`='$id'")->row();
        return $query;
    }
    public function getsinglestaticpage($id)
    {

        $query=$this->db->query("SELECT `id`, `name`, `content`, `order`, `image`, `bannerimage` FROM `staticpage` WHERE `id`='$id'")->result();
        return $query;
    }

    public function createcontactus($name,$contact,$email,$country,$city,$message)
    {
        $data=array(
                    "name" => $name,
                    "contact" => $contact,
                    "email" => $email,
                    "country" => $country,
                    "city" => $city,
                    "message" => $message
                   );
        $query=$this->db->insert( "contactus", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }

    public function createworkwithus($name,$contact,$email,$country,$city,$message)
    {
        $data=array(
                    "name" => $name,
                    "contact" => $contact,
                    "email" => $email,
                    "country" => $country,
                    "city" => $city,
                    "message" => $message
                   );
        $query=$this->db->insert( "workwithus", $data );
        $id=$this->db->insert_id();
        if(!$query)
            return  0;
        else
            return  $id;
    }

    public function createpfo($name,$contact,$email,$country,$city,$message)
    {
        $querycheck=$this->db->query("SELECT `email` FROM `pfo` WHERE `email`='$email'")->result();
        if(empty($querycheck))
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
         return $id;
        }
        else
        {
         return 0;
        }

        // if(!$query)
        //     return  0;
        // else
        //     return  $id;
    }

    public function createnewsletter($email)
    {
        $ispresent=$this->db->query("SELECT * FROM `newsletter` WHERE `email`='$email'")->result();
//        print_r($ispresent);

        $data=array(
                    "email" => $email
                   );
        if(empty($ispresent))
        {

            $query=$this->db->insert( "newsletter", $data );
            $id=$this->db->insert_id();
            return  $id;

        }
        else
        {
            return 0;
        }

    }

    public function getsingleblog($id)
    {

        $query=$this->db->query("SELECT `blog`.`id`, `blog`.`blogcategory`, `blog`.`title`, `blog`.`image`, `blog`.`description`, `blog`.`timestamp`,`blogcategory`.`name` AS `blogcategoryname`
FROM `blog`
LEFT OUTER JOIN `blogcategory` ON `blogcategory`.`id`=`blog`.`blogcategory` WHERE `blog`.`id`='$id'")->result();
        return $query;
    }
    public function getsingleuser($id)
    {
        $useremail=$this->db->query("SELECT `email` FROM `user` WHERE `id`='$id'")->row();
        $useremail=$useremail->email;
        $checkfellowship=$this->db->query("SELECT `email` FROM `pfo` WHERE `email`='$useremail'")->result();
        if(empty($checkfellowship))
        {
         $query['fellowship']="No";
        }
        else
        {
         $query['fellowship']="Yes";
        }

        $query['user']=$this->db->query("SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`accesslevel`, `user`.`timestamp`, `user`.`status`, `user`.`image`, `user`.`username`, `user`.`socialid`, `user`.`logintype`, `user`.`json`, `user`.`dob`, `user`.`street`, `user`.`address`, `user`.`city`, `user`.`state`, `user`.`country`, `user`.`pincode`, `user`.`facebook`, `user`.`google`, `user`.`twitter`
        FROM `user`
        LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel`
        WHERE `user`.`id`='$id'")->result();
        $query['order']=$this->db->query("SELECT SUM(`amount`) as `amount` FROM `powerforone_order` WHERE `user`='$id' AND `transactionid` <> ''")->row();
        $query['facebookshares']=$this->db->query("SELECT COUNT(`id`) as `facebookshares` FROM `powerforone_order` WHERE `user`='$id' AND `typeofdonation`=1")->row();
        $query['twittershares']=$this->db->query("SELECT COUNT(`id`) as `twittershares` FROM `powerforone_order` WHERE `user`='$id' AND `typeofdonation`=2")->row();
        $query['totalprojects']=$this->db->query("SELECT COUNT(`id`) as `totalprojects` FROM `powerforone_project` WHERE `status`=1")->row();
//        $query['causehelped']=$this->db->query("SELECT COUNT(`id`) as `causehelped` FROM `powerforone_order` WHERE `user`='$id' GROUP BY `powerforone_order`.`project`")->row();
        $query['causehelped']=$this->db->query("SELECT `user`,COUNT(`project`) as `causehelped` FROM (SELECT DISTINCT `user`,`project` FROM `powerforone_order` WHERE `user`='$id'AND `transactionid` <> '') as `projects` GROUP BY `projects`.`user`")->row();
        $query['project']=$this->db->query("SELECT `powerforone_order`.`project` as `projectid`, `powerforone_project`.`id`  AS `id` ,  `powerforone_project`.`name`  AS `name` ,  `powerforone_project`.`category`  AS `category` ,  `powerforone_project`.`ngo`  AS `ngo` ,  `powerforone_project`.`advertiser`  AS `advertiser` ,  `powerforone_project`.`json`  AS `json` ,  `powerforone_project`.`like`  AS `like` ,  `powerforone_project`.`share`  AS `share` ,  `powerforone_project`.`follow`  AS `follow` ,  `powerforone_project`.`facebook`  AS `facebook` ,  `powerforone_project`.`twitter`  AS `twitter` ,  `powerforone_project`.`google`  AS `google` ,  `powerforone_project`.`status`  AS `status` ,  `powerforone_project`.`order`  AS `order` ,  `powerforone_project`.`views`  AS `views` ,  `powerforone_project`.`video`  AS `video` ,  `powerforone_ngo`.`name`  AS `ngoname` ,  `powerforone_category`.`name`  AS `categoryname` ,  `powerforone_project`.`image`  AS `image` ,  `powerforone_ngo`.`image`  AS `ngoimage` ,  `powerforone_project`.`tagline`  AS `tagline` ,  `powerforone_project`.`cardtagline`  AS `cardtagline` ,  `powerforone_project`.`cardimage`  AS `cardimage` ,`powerforone_advertiser`.`image` AS `advertiserimage`,`powerforone_project`.`location` AS `location`,`powerforone_ngo`.`website` AS `ngowebsite`,`powerforone_advertiser`.`website` AS `advertiserwebsite`,`powerforone_project`.`remembersharevalue`,`powerforone_project`.`timesinwordforshare`
FROM `powerforone_order`
LEFT OUTER JOIN `powerforone_project` ON `powerforone_project`.`id`=`powerforone_order`.`project`
LEFT OUTER JOIN `powerforone_category` ON `powerforone_project`.`category`=`powerforone_category`.`id`
LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_project`.`ngo`=`powerforone_ngo`.`id`
LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_project`.`advertiser`=`powerforone_advertiser`.`id`
WHERE `powerforone_order`.`user`='$id' AND `powerforone_project`.`status`=1 AND `powerforone_order`.`transactionid` <> ''
GROUP BY `powerforone_order`.`project`
ORDER BY `powerforone_project`.`order` ASC")->result();
        return $query;
    }

    public function getsingleuserold($id)
    {

        $query=$this->db->query("SELECT `user`.`id`, `user`.`name`, `user`.`email`, `user`.`accesslevel`, `user`.`timestamp`, `user`.`status`, `user`.`image`, `user`.`username`, `user`.`socialid`, `user`.`logintype`, `user`.`json`, `user`.`dob`, `user`.`street`, `user`.`address`, `user`.`city`, `user`.`state`, `user`.`country`, `user`.`pincode`, `user`.`facebook`, `user`.`google`, `user`.`twitter`
        FROM `user`
        LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel`
        WHERE `user`.`id`='$id'")->result();
        return $query;
    }


    public function addpaymentdetailsold($ourjson)
    {

        $query=$this->db->query("INSERT INTO `paymentjson`(`json`) VALUES ('$ourjson')");
        return $query;
    }


    public function addpaymentdetails($orderid,$transactionid,$status)
    {
        if($status=="Credit")
        {
        $status=2;
        }

        $query=$this->db->query("UPDATE `powerforone_order` SET `transactionid`='$transactionid',`status`='$status' WHERE `id`='$orderid'");
//        echo $transactionid;
//        echo "orderid=".$orderid."complete";
        if($transactionid!="")
         {
             //success email for trasaction
             $message=$this->order_model->successpayment($orderid);
         }
         else
         {
             //failure email
             $message=$this->order_model->transactionfailed($orderid);
         }
        
        return $message;
    }

    public function createfrontendorder($name,$email,$mobile,$city,$address,$pan,$dob,$amount,$project,$user,$istax,$anonymous,$give,$referencecode)
    {
        $projectdata=$this->project_model->beforeedit($project);
        $ngo=$projectdata->ngo;
        $advertiser=$projectdata->advertiser;
        $data=array(
            "name" => $name,
            "email" => $email,
            "mobile" => $mobile,
            "city" => $city,
            "address" => $address,
            "pan" => $pan,
            "dob" => $dob,
            "amount" => $amount,
            "project" => $project,
            "user" => $user,
            "ngo" => $ngo,
            "istax" => $istax,
            "anonymous" => $anonymous,
            "give" => $give,
            "typeofdonation" => 0,
            "status" => 1,
            "referral" => $referencecode,
            "advertiser" => $advertiser
        );
        $query=$this->db->insert( "powerforone_order", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
}
?>
