<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class order_model extends CI_Model
{
    public function create($name,$email,$user,$amount,$ngo,$project,$status,$transactionid,$typeofdonation,$advertiser,$mobile,$city,$address,$pan,$dob,$istax,$anonymous,$give,$referencecode)
    {
        $data=array(
            "name" => $name,
            "email" => $email,
            "user" => $user,
            "amount" => $amount,
            "ngo" => $ngo,
            "status" => $status,
            "transactionid" => $transactionid,
            "typeofdonation" => $typeofdonation,
            "advertiser" => $advertiser,
            "mobile" => $mobile,
            "city" => $city,
            "address" => $address,
            "pan" => $pan,
            "dob" => $dob,
            "istax" => $istax,
            "anonymous" => $anonymous,
            "referral" => $referencecode,
            "give" => $give,
            "project" => $project
        );
        $query=$this->db->insert( "powerforone_order", $data );
        $id=$this->db->insert_id();
        if(!$query)
        return  0;
        else
        return  $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_order")->row();
        return $query;
    }
    function getsingleorder($id)
    {
        $this->db->where("id",$id);
        $query=$this->db->get("powerforone_order")->row();
        return $query;
    }
    public function edit($id,$name,$email,$user,$amount,$ngo,$project,$status,$transactionid,$typeofdonation,$advertiser,$mobile,$city,$address,$pan,$dob,$istax,$anonymous,$give,$referencecode)
    {
        $data=array(
            "name" => $name,
            "email" => $email,
            "user" => $user,
            "amount" => $amount,
            "ngo" => $ngo,
            "status" => $status,
            "typeofdonation" => $typeofdonation,
            "advertiser" => $advertiser,
            "mobile" => $mobile,
            "city" => $city,
            "address" => $address,
            "pan" => $pan,
            "dob" => $dob,
            "istax" => $istax,
            "anonymous" => $anonymous,
            "referral" => $referencecode,
            "give" => $give,
            "project" => $project
        );
        $this->db->where( "id", $id );
        $query=$this->db->update( "powerforone_order", $data );
        return 1;
    }
    public function delete($id)
    {
        $query=$this->db->query("DELETE FROM `powerforone_order` WHERE `id`='$id'");
        return $query;
    }

    public function getstatusdropdown()
	{
		$query=$this->db->query("SELECT * FROM `orderstatus`  ORDER BY `id` ASC")->result();
		$return=array(
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}

		return $return;
	}

	public function getdonationtypedropdown()
	{
		$typeofdonation= array(
			 "0" => "Amount",
			 "1" => "Facebook Post",
			 "2" => "Tweet"
			);
		return $typeofdonation;
	}
	public function getistaxdropdown()
	{
		$istax= array(
			 "0" => "No",
			 "1" => "Yes"
			);
		return $istax;
	}
	public function getanonymousdropdown()
	{
		$anonymous= array(
			 "0" => "No",
			 "1" => "Yes"
			);
		return $anonymous;
	}

	public function getgivedropdown()
	{
		$give= array(
			 "0" => "One Time",
			 "1" => "Monthly",
			 "2" => "Quarterly",
			 "3" => "Yearly"
			);
		return $give;
	}
    
	public function getallorders()
	{
		$query=$this->db->query("SELECT COUNT(`id`) AS `count1` FROM `powerforone_order`")->row();
		return $query->count1;
	}
	public function getfacebookorders()
	{
		$query=$this->db->query("SELECT COUNT(`id`) AS `count1` FROM `powerforone_order` WHERE `typeofdonation`=1")->row();
		return $query->count1;
	}
	public function gettwitterorders()
	{
		$query=$this->db->query("SELECT COUNT(`id`) AS `count1` FROM `powerforone_order` WHERE `typeofdonation`=2")->row();
		return $query->count1;
	}
	public function getamountorders()
	{
		$query=$this->db->query("SELECT COUNT(`id`) AS `count1` FROM `powerforone_order` WHERE `typeofdonation`=0")->row();
		return $query->count1;
	}
	public function getorderbyid($orderid)
	{
		$query=$this->db->query("SELECT `powerforone_order`.`id`, `powerforone_order`.`name`,`powerforone_order`. `email`, `powerforone_order`.`user`, `powerforone_order`.`amount`, `powerforone_order`.`ngo`, `powerforone_order`.`project`, `powerforone_order`.`status`, `powerforone_order`.`transactionid`, `powerforone_order`.`typeofdonation`, `powerforone_order`.`advertiser`, `powerforone_order`.`mobile`, `powerforone_order`.`city`, `powerforone_order`.`address`, `powerforone_order`.`pan`, `powerforone_order`.`dob`, `powerforone_order`.`istax`, `powerforone_order`.`anonymous`, `powerforone_order`.`give`, `powerforone_order`.`referral` ,`powerforone_project`.`name` AS `projectname`,`powerforone_ngo`.`name` AS `ngoname`,`powerforone_advertiser`.`name` AS `corporatename`
FROM `powerforone_order` 
LEFT OUTER JOIN `powerforone_project` ON `powerforone_project`.`id`=`powerforone_order`.`project`
LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_ngo`.`id`=`powerforone_order`.`ngo`
LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_advertiser`.`id`=`powerforone_order`.`advertiser`
WHERE `powerforone_order`.`id`='$orderid'")->row();
		return $query;
	}
	public function successpayment($orderid)
	{
        
        //set POST variables
        $orderdetails=$this->order_model->getorderbyid($orderid);
        $transactionid=$orderdetails->transactionid;
        $typeofdonation=$orderdetails->typeofdonation;
        $ismoney=false;
        if($typeofdonation==0)
        {
            $ismoney=true;
        $typeofdonation="Amount";
        }
        else if($typeofdonation==1)
        {
        $typeofdonation="Facebook";
        }
        else
        {
        $typeofdonation="Twitter";
        }
        $projectname=$orderdetails->projectname;
        $ngoname=$orderdetails->ngoname;
        $amount=$orderdetails->amount;
        $email=$orderdetails->email;
        $table="";
        if(ismoney)
        {
        $table="<table border='1' class='table table-striped'>
    <tr>
                                <th>Transaction ID</th>
                                <th>Project</th>
                                <th>NGO</th>
                                <th>Amount</th>
    </tr>
    <tr>
                                <td>$transactionid</td>
                                <td>$projectname</td>
                                <td>$ngoname</td>
                                <td>$amount</td>
    </tr>
                                </table>";
        }
//        echo "hello".$email;
//        echo $table;
        $url = base_url("email/transactionsuccessemail.php");
        $fields = array(
                                'projectname' => urlencode($projectname),
                                'email' => urlencode($email),
                                'table' => urlencode($table)
                        );

        //url-ify the data for the POST
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);
        return $result;
        //close connection
        curl_close($ch);
	}
	public function transactionfailed($orderid)
	{
        
        //set POST variables
        $orderdetails=$this->order_model->getorderbyid($orderid);
        $transactionid=$orderdetails->transactionid;
        $typeofdonation=$orderdetails->typeofdonation;
        if($typeofdonation==0)
        {
        $typeofdonation="Amount";
        }
        else if($typeofdonation==1)
        {
        $typeofdonation="Facebook";
        }
        else
        {
        $typeofdonation="Twitter";
        }
        $projectname=$orderdetails->projectname;
        $ngoname=$orderdetails->ngoname;
        $amount=$orderdetails->amount;
        $email=$orderdetails->email;
        $project=$orderdetails->project;
        
        $link="<a href='http://www.powerforone.org/#/campaign/$project'>Click here</a>";
        
        $url = base_url("email/transactionfailedemail.php");
        $fields = array(
                                'project' => urlencode($project),
                                'email' => urlencode($email),
                                'link' => urlencode($link)
                        );

        //url-ify the data for the POST
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);
        return $result;
//        $data['message']=$result;
//        $this->load->view("json",$data);
        //close connection
        curl_close($ch);
	}
    
    
    function exportorders()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `powerforone_order`.`id`, `powerforone_order`.`name`, `powerforone_order`.`email`, `user`.`name` AS `user`,`powerforone_order`. `amount`,`powerforone_ngo`. `name`AS `ngoname`, `powerforone_project`.`name` AS `project`, `orderstatus`.`name` AS `status`, `powerforone_order`.`transactionid`,IF(`powerforone_order`.`typeofdonation`='0','Amount', IF(`powerforone_order`.`typeofdonation`='1','Facebook', IF(`powerforone_order`.`typeofdonation`='2','Twitter','No'))) AS `Type Of Donation`, `powerforone_advertiser`.`name` AS `corporate`, `powerforone_order`.`mobile`, `powerforone_order`.`city`, `powerforone_order`.`address`, `powerforone_order`.`pan`, `powerforone_order`.`dob`, `powerforone_order`.`istax`,`powerforone_order`. `anonymous`, `powerforone_order`.`give`, `powerforone_order`.`referral`
FROM `powerforone_order` 
LEFT OUTER JOIN `powerforone_project` ON `powerforone_project`.`id`=`powerforone_order`.`project`
LEFT OUTER JOIN `powerforone_category` ON `powerforone_project`.`category`=`powerforone_category`.`id`
LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_project`.`ngo`=`powerforone_ngo`.`id`
LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_project`.`advertiser`=`powerforone_advertiser`.`id`
LEFT OUTER JOIN `orderstatus` ON `powerforone_order`.`status`=`orderstatus`.`id`
LEFT OUTER JOIN `user` ON `powerforone_order`.`user`=`user`.`id`");

       $content= $this->dbutil->csv_from_result($query);
        $timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        
        if ( ! write_file('./csvgenerated/orders.csv', $content))
        {
//             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url('csvgenerated/orders.csv'), 'refresh');
//             echo 'File written!';
        }
//        file_put_contents("gs://toykraftdealer/retailerfilefromdashboard_$timestamp.csv", $content);
//		redirect("http://admin.toy-kraft.com/servepublic?name=retailerfilefromdashboard_$timestamp.csv", 'refresh');
	}
    
    
    function sendwelcomeemail($hashcode,$email,$name)
    {
        $normalfromhash=base64_decode ($hashcode);
        $returnvalue=explode("&",$normalfromhash);
//        print_r($returnvalue);
//        echo $returnvalue[0]."<br>";
        $orderid=$returnvalue[0];
        $query=$this->db->query("UPDATE `powerforone_order` SET `email`='$email',`name`='$name' WHERE `id`='$orderid'");
        $this->order_model->successpayment($orderid);
		if(!$query)
			return  0;
		else
			return  1;
    }
    
}
?>
