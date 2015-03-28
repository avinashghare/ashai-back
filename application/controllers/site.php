<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
            $this->session->sess_destroy();
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
        
        $json=array();
        
        $json[0]=new stdClass();
        $json[0]->placeholder="";
        $json[0]->value="";
        $json[0]->label="SEO Title";
        $json[0]->type="text";
        $json[0]->options="";
        $json[0]->classes="";
        
        $json[1]=new stdClass();
        $json[1]->placeholder="";
        $json[1]->value="";
        $json[1]->label="SEO Description";
        $json[1]->type="textarea";
        $json[1]->options="";
        $json[1]->classes="";
        
        $json[2]=new stdClass();
        $json[2]->placeholder="";
        $json[2]->value="";
        $json[2]->label="SEO Keywords";
        $json[2]->type="textarea";
        $json[2]->options="";
        $json[2]->classes="";
        
        
        $data["fieldjson"]=$json;
//        $data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		$this->form_validation->set_rules('dob','dob','trim');
		$this->form_validation->set_rules('street','street','trim');
		$this->form_validation->set_rules('address','address','trim');
		$this->form_validation->set_rules('city','city','trim');
		$this->form_validation->set_rules('state','state','trim');
		$this->form_validation->set_rules('country','country','trim');
		$this->form_validation->set_rules('pincode','pincode','trim');
		$this->form_validation->set_rules('facebook','facebook','trim');
		$this->form_validation->set_rules('google','google','trim');
		$this->form_validation->set_rules('twitter','twitter','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'status' ] =$this->user_model->getstatusdropdown();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
            $data['category']=$this->category_model->getcategorydropdown();
            $data[ 'page' ] = 'createuser';
            $data[ 'title' ] = 'Create User';
            $this->load->view( 'template', $data );	
		}
		else
		{
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $accesslevel=$this->input->post('accesslevel');
            $status=$this->input->post('status');
            $socialid=$this->input->post('socialid');
            $logintype=$this->input->post('logintype');
            $json=$this->input->post('json');
            $dob=$this->input->post('dob');
            $street=$this->input->post('street');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $state=$this->input->post('state');
            $country=$this->input->post('country');
            $pincode=$this->input->post('pincode');
            $facebook=$this->input->post('facebook');
            $google=$this->input->post('google');
            $twitter=$this->input->post('twitter');
//            $category=$this->input->post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
			if($this->user_model->create($name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$dob,$street,$address,$city,$state,$country,$pincode,$facebook,$google,$twitter)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			$data['redirect']="site/viewusers";
			$this->load->view("redirect",$data);
		}
	}
    function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['page']='viewusers';
        $data['base_url'] = site_url("site/viewusersjson");
        
		$data['title']='View Users';
		$this->load->view('template',$data);
	} 
    function viewusersjson()
	{
		$access = array("1");
		$this->checkaccess($access);
        
        
        $elements=array();
        $elements[0]=new stdClass();
        $elements[0]->field="`user`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        
        $elements[1]=new stdClass();
        $elements[1]->field="`user`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`user`.`email`";
        $elements[2]->sort="1";
        $elements[2]->header="Email";
        $elements[2]->alias="email";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`user`.`socialid`";
        $elements[3]->sort="1";
        $elements[3]->header="SocialId";
        $elements[3]->alias="socialid";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`logintype`.`name`";
        $elements[4]->sort="1";
        $elements[4]->header="Logintype";
        $elements[4]->alias="logintype";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`user`.`json`";
        $elements[5]->sort="1";
        $elements[5]->header="Json";
        $elements[5]->alias="json";
       
        $elements[6]=new stdClass();
        $elements[6]->field="`accesslevel`.`name`";
        $elements[6]->sort="1";
        $elements[6]->header="Accesslevel";
        $elements[6]->alias="accesslevelname";
       
        $elements[7]=new stdClass();
        $elements[7]->field="`statuses`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="Status";
        $elements[7]->alias="status";
       
        
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
       
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `user` LEFT OUTER JOIN `logintype` ON `logintype`.`id`=`user`.`logintype` LEFT OUTER JOIN `accesslevel` ON `accesslevel`.`id`=`user`.`accesslevel` LEFT OUTER JOIN `statuses` ON `statuses`.`id`=`user`.`status`");
        
		$this->load->view("json",$data);
	} 
    
    
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('socialid','Socialid','trim');
		$this->form_validation->set_rules('logintype','logintype','trim');
		$this->form_validation->set_rules('json','json','trim');
		$this->form_validation->set_rules('dob','dob','trim');
		$this->form_validation->set_rules('street','street','trim');
		$this->form_validation->set_rules('address','address','trim');
		$this->form_validation->set_rules('city','city','trim');
		$this->form_validation->set_rules('state','state','trim');
		$this->form_validation->set_rules('country','country','trim');
		$this->form_validation->set_rules('pincode','pincode','trim');
		$this->form_validation->set_rules('facebook','facebook','trim');
		$this->form_validation->set_rules('google','google','trim');
		$this->form_validation->set_rules('twitter','twitter','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
            $data[ 'logintype' ] =$this->user_model->getlogintypedropdown();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='edituser';
//			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            
            $id=$this->input->get_post('id');
            $name=$this->input->get_post('name');
            $email=$this->input->get_post('email');
            $password=$this->input->get_post('password');
            $accesslevel=$this->input->get_post('accesslevel');
            $status=$this->input->get_post('status');
            $socialid=$this->input->get_post('socialid');
            $logintype=$this->input->get_post('logintype');
            $json=$this->input->get_post('json');
            $dob=$this->input->post('dob');
            $street=$this->input->post('street');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $state=$this->input->post('state');
            $country=$this->input->post('country');
            $pincode=$this->input->post('pincode');
            $facebook=$this->input->post('facebook');
            $google=$this->input->post('google');
            $twitter=$this->input->post('twitter');
//            $category=$this->input->get_post('category');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->user_model->getuserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->user_model->edit($id,$name,$email,$password,$accesslevel,$status,$socialid,$logintype,$image,$json,$dob,$street,$address,$city,$state,$country,$pincode,$facebook,$google,$twitter)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
//		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
		$this->load->view("redirect",$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    
    
    public function viewcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewcategory";
        $data["base_url"]=site_url("site/viewcategoryjson");
        $data["title"]="View category";
        $this->load->view("template",$data);
    }
    
    function viewcategoryjson()
    {
//        SELECT `category`.`id`,`category`.`name`,`category`.`image`,`tab2`.`name` as `parent` FROM `category` 
//		LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`
//		ORDER BY `category`.`id` ASC
            
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
        $elements[2]->field="`tab2`.`name`";
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_category` LEFT JOIN `powerforone_category` as `tab2` ON `tab2`.`id`=`powerforone_category`.`parent`");
        $this->load->view("json",$data);
    }

    public function createcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data['parent']=$this->category_model->getcategorydropdown();
         
        $json=array();
        
        $json[0]=new stdClass();
        $json[0]->placeholder="";
        $json[0]->value="";
        $json[0]->label="SEO Title";
        $json[0]->type="text";
        $json[0]->options="";
        $json[0]->classes="";
        
        $json[1]=new stdClass();
        $json[1]->placeholder="";
        $json[1]->value="";
        $json[1]->label="SEO Description";
        $json[1]->type="textarea";
        $json[1]->options="";
        $json[1]->classes="";
        
        $json[2]=new stdClass();
        $json[2]->placeholder="";
        $json[2]->value="";
        $json[2]->label="SEO Keywords";
        $json[2]->type="textarea";
        $json[2]->options="";
        $json[2]->classes="";
        
        
        $data["fieldjson"]=$json;
        $data["page"]="createcategory";
        $data["title"]="Create category";
        $this->load->view("template",$data);
    }
    public function createcategorysubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("parent","Parent","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("views","Views","trim");
        $this->form_validation->set_rules("description","description","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createcategory";
            $data['parent']=$this->category_model->getcategorydropdown();
            $data["title"]="Create category";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $parent=$this->input->get_post("parent");
            $json=$this->input->get_post("json");
            $order=$this->input->get_post("order");
            $views=$this->input->get_post("views");
            $description=$this->input->get_post("description");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($this->category_model->create($name,$parent,$json,$order,$views,$image,$description)==0)
                $data["alerterror"]="New category could not be created.";
            else
                $data["alertsuccess"]="category created Successfully.";
            $data["redirect"]="site/viewcategory";
            $this->load->view("redirect",$data);
        }
    }
    public function editcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editcategory";
        $data["title"]="Edit category";
        $data['parent']=$this->category_model->getcategorydropdown();
        $data["before"]=$this->category_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editcategorysubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("parent","Parent","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("views","Views","trim");
        $this->form_validation->set_rules("description","description","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editcategory";
            $data["title"]="Edit category";
            $data['parent']=$this->category_model->getcategorydropdown();
            $data["before"]=$this->category_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $parent=$this->input->get_post("parent");
            $json=$this->input->get_post("json");
            $order=$this->input->get_post("order");
            $views=$this->input->get_post("views");
            $description=$this->input->get_post("description");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->category_model->getcategoryimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->category_model->edit($id,$name,$parent,$json,$order,$views,$image,$description)==0)
            $data["alerterror"]="New category could not be Updated.";
            else
            $data["alertsuccess"]="category Updated Successfully.";
            $data["redirect"]="site/viewcategory";
            $this->load->view("redirect",$data);
        }
    }
    public function deletecategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->category_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewcategory";
        $this->load->view("redirect",$data);
    }
    public function viewproject()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewproject";
        $data["base_url"]=site_url("site/viewprojectjson");
        $data["title"]="View project";
        $this->load->view("template",$data);
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
        $elements[17]->field="`powerforone_advertiser`.`name`";
        $elements[17]->sort="1";
        $elements[17]->header="Cooperator";
        $elements[17]->alias="cooperator";
        
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_project` LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_ngo`.`id`=`powerforone_project`.`ngo` LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_advertiser`.`id`=`powerforone_project`.`advertiser`");
        $this->load->view("json",$data);
    }

    public function createproject()
    {
        $access=array("1");
        $this->checkaccess($access);
        
        $json=array();
        
        $json[0]=new stdClass();
        $json[0]->placeholder="";
        $json[0]->value="";
        $json[0]->label="SEO Title";
        $json[0]->type="text";
        $json[0]->options="";
        $json[0]->classes="";
        
        $json[1]=new stdClass();
        $json[1]->placeholder="";
        $json[1]->value="";
        $json[1]->label="SEO Description";
        $json[1]->type="textarea";
        $json[1]->options="";
        $json[1]->classes="";
        
        $json[2]=new stdClass();
        $json[2]->placeholder="";
        $json[2]->value="";
        $json[2]->label="SEO Keywords";
        $json[2]->type="textarea";
        $json[2]->options="";
        $json[2]->classes="";
        
        
        $data["fieldjson"]=$json;
        
        $data["page"]="createproject";
        $data["title"]="Create project";
        $data['ngo']=$this->ngo_model->getngodropdown();
        $data['category']=$this->category_model->getcategorydropdown();
        $data['project']=$this->project_model->getprojectdropdown();
        $data['advertiser']=$this->advertiser_model->getadvertiserdropdown();
        $data['status']=$this->user_model->getstatusdropdown();
        $data['donate']=$this->user_model->getdonatedropdown();
        $data['indiandoner']=$this->user_model->getdonatedropdown();
        $data['foreigndoner']=$this->user_model->getdonatedropdown();
        $data['share']=$this->user_model->getsharedropdown();
        $this->load->view("template",$data);
    }
    public function createprojectsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("category","Category","trim");
        $this->form_validation->set_rules("ngo","NGO","trim");
        $this->form_validation->set_rules("advertiser","Advertiser","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("like","Likes","trim");
        $this->form_validation->set_rules("share","Share","trim");
        $this->form_validation->set_rules("follow","Follow","trim");
        $this->form_validation->set_rules("facebook","Facebook","trim");
        $this->form_validation->set_rules("twitter","Twitter","trim");
        $this->form_validation->set_rules("google","Google","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("views","Views","trim");
        $this->form_validation->set_rules("video","Video","trim");
        $this->form_validation->set_rules("video2","Video2","trim");
        $this->form_validation->set_rules("content","content","trim");
        $this->form_validation->set_rules("contribution","contribution","trim");
        $this->form_validation->set_rules("times","times","trim");
        $this->form_validation->set_rules("donate","donate","trim");
        $this->form_validation->set_rules("tagline","tagline","trim");
        $this->form_validation->set_rules("cardtagline","cardtagline","trim");
        
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createproject";
            $data["title"]="Create project";
            $data['ngo']=$this->ngo_model->getngodropdown();
            $data['category']=$this->category_model->getcategorydropdown();
            $data['project']=$this->project_model->getcategorydropdown();
            $data['advertiser']=$this->advertiser_model->getadvertiserdropdown();
            $data['status']=$this->user_model->getstatusdropdown();
            $data['donate']=$this->user_model->getdonatedropdown();
            $data['share']=$this->user_model->getsharedropdown();
            $data['indiandoner']=$this->user_model->getdonatedropdown();
            $data['foreigndoner']=$this->user_model->getdonatedropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $category=$this->input->get_post("category");
            $ngo=$this->input->get_post("ngo");
            $advertiser=$this->input->get_post("advertiser");
            $json=$this->input->get_post("json");
            $like=$this->input->get_post("like");
            $share=$this->input->get_post("share");
            $follow=$this->input->get_post("follow");
            $facebook=$this->input->get_post("facebook");
            $twitter=$this->input->get_post("twitter");
            $google=$this->input->get_post("google");
            $status=$this->input->get_post("status");
            $order=$this->input->get_post("order");
            $views=$this->input->get_post("views");
            $video=$this->input->get_post("video");
            $video2=$this->input->get_post("video2");
            $content=$this->input->get_post("content");
            $contribution=$this->input->get_post("contribution");
            $times=$this->input->get_post("times");
            $donate=$this->input->get_post("donate");
            $tagline=$this->input->get_post("tagline");
            $cardtagline=$this->input->get_post("cardtagline");
            $indiandoner=$this->input->get_post("indiandoner");
            $foreigndoner=$this->input->get_post("foreigndoner");
            $project=$this->input->get_post("project");
            $timesinword=$this->input->get_post("timesinword");
            $facebooktext=$this->input->get_post("facebooktext");
            $twittertext=$this->input->get_post("twittertext");
            $sharevalue=$this->input->get_post("sharevalue");
            $cardimage=$this->input->get_post("cardimage");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
			}
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="cardimage";
			$cardimage="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$cardimage=$uploaddata['file_name'];
                
			}
            
            if($this->project_model->create($name,$category,$ngo,$advertiser,$json,$like,$share,$follow,$facebook,$twitter,$google,$status,$order,$views,$video,$content,$contribution,$times,$donate,$tagline,$image,$video2,$cardtagline,$indiandoner,$foreigndoner,$project,$timesinword,$facebooktext,$twittertext,$sharevalue,$cardimage)==0)
                $data["alerterror"]="New project could not be created.";
            else
                $data["alertsuccess"]="project created Successfully.";
            $data["redirect"]="site/viewproject";
            $this->load->view("redirect",$data);
        }
    }
    public function editproject()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editproject";
        $data["page2"]="block/projectblock";
        $data["title"]="Edit project";
        $data['ngo']=$this->ngo_model->getngodropdown();
        $data['category']=$this->category_model->getcategorydropdown();
        $data['project']=$this->project_model->getprojectdropdown();
        $data['advertiser']=$this->advertiser_model->getadvertiserdropdown();
        $data['status']=$this->user_model->getstatusdropdown();
        $data['donate']=$this->user_model->getdonatedropdown();
        $data['share']=$this->user_model->getsharedropdown();
        $data['indiandoner']=$this->user_model->getdonatedropdown();
        $data['foreigndoner']=$this->user_model->getdonatedropdown();
        $data['selectedproject']=$this->project_model->getsimilarcausebyproject($this->input->get_post('id'));
        $data["before"]=$this->project_model->beforeedit($this->input->get("id"));
        $this->load->view("templatewith2",$data);
    }
    public function editprojectsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("category","Category","trim");
        $this->form_validation->set_rules("ngo","NGO","trim");
        $this->form_validation->set_rules("advertiser","Advertiser","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("like","Likes","trim");
        $this->form_validation->set_rules("share","Share","trim");
        $this->form_validation->set_rules("follow","Follow","trim");
        $this->form_validation->set_rules("facebook","Facebook","trim");
        $this->form_validation->set_rules("twitter","Twitter","trim");
        $this->form_validation->set_rules("google","Google","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("views","Views","trim");
        $this->form_validation->set_rules("video","Video","trim");
        $this->form_validation->set_rules("content","content","trim");
        $this->form_validation->set_rules("contribution","contribution","trim");
        $this->form_validation->set_rules("times","times","trim");
        $this->form_validation->set_rules("donate","donate","trim");
        $this->form_validation->set_rules("tagline","tagline","trim");
        $this->form_validation->set_rules("cardtagline","cardtagline","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editproject";
            $data["title"]="Edit project";
            $data['ngo']=$this->ngo_model->getngodropdown();
            $data['category']=$this->category_model->getcategorydropdown();
            $data['advertiser']=$this->advertiser_model->getadvertiserdropdown();
            $data['status']=$this->user_model->getstatusdropdown();
            $data['donate']=$this->user_model->getdonatedropdown();
            $data['share']=$this->user_model->getsharedropdown();
            $data['indiandoner']=$this->user_model->getdonatedropdown();
            $data['foreigndoner']=$this->user_model->getdonatedropdown();
            $data["before"]=$this->project_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $category=$this->input->get_post("category");
            $ngo=$this->input->get_post("ngo");
            $advertiser=$this->input->get_post("advertiser");
            $json=$this->input->get_post("json");
            $like=$this->input->get_post("like");
            $share=$this->input->get_post("share");
            $follow=$this->input->get_post("follow");
            $facebook=$this->input->get_post("facebook");
            $twitter=$this->input->get_post("twitter");
            $google=$this->input->get_post("google");
            $status=$this->input->get_post("status");
            $order=$this->input->get_post("order");
            $views=$this->input->get_post("views");
            $video=$this->input->get_post("video");
            $video2=$this->input->get_post("video2");
            $content=$this->input->get_post("content");
            $contribution=$this->input->get_post("contribution");
            $times=$this->input->get_post("times");
            $donate=$this->input->get_post("donate");
            $tagline=$this->input->get_post("tagline");
            $cardtagline=$this->input->get_post("cardtagline");
            $indiandoner=$this->input->get_post("indiandoner");
            $foreigndoner=$this->input->get_post("foreigndoner");
            $project=$this->input->get_post("project");
            
            $timesinword=$this->input->get_post("timesinword");
            $facebooktext=$this->input->get_post("facebooktext");
            $twittertext=$this->input->get_post("twittertext");
            $sharevalue=$this->input->get_post("sharevalue");
            $cardimage=$this->input->get_post("cardimage");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="cardimage";
			$cardimage="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$cardimage=$uploaddata['file_name'];
                
			}
            
            if($cardimage=="")
            {
            $cardimage=$this->project_model->getprojectcardimagebyid($id);
               // print_r($cardimage);
                $cardimage=$cardimage->cardimage;
            }
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                
			}
            
            if($image=="")
            {
            $image=$this->project_model->getprojectimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
//            print_r($project);
            if($this->project_model->edit($id,$name,$category,$ngo,$advertiser,$json,$like,$share,$follow,$facebook,$twitter,$google,$status,$order,$views,$video,$content,$contribution,$times,$donate,$tagline,$image,$video2,$cardtagline,$indiandoner,$foreigndoner,$project,$timesinword,$facebooktext,$twittertext,$sharevalue,$cardimage)==0)
                $data["alerterror"]="New project could not be Updated.";
            else
                $data["alertsuccess"]="project Updated Successfully.";
            $data["redirect"]="site/viewproject";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteproject()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->project_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewproject";
        $this->load->view("redirect",$data);
    }
    public function viewngo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewngo";
        $data["base_url"]=site_url("site/viewngojson");
        $data["title"]="View ngo";
        $this->load->view("template",$data);
    }
    function viewngojson()
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_ngo`");
        $this->load->view("json",$data);
    }

    public function createngo()
    {
        $access=array("1");
        $this->checkaccess($access);
         
        $json=array();
        
        $json[0]=new stdClass();
        $json[0]->placeholder="";
        $json[0]->value="";
        $json[0]->label="SEO Title";
        $json[0]->type="text";
        $json[0]->options="";
        $json[0]->classes="";
        
        $json[1]=new stdClass();
        $json[1]->placeholder="";
        $json[1]->value="";
        $json[1]->label="SEO Description";
        $json[1]->type="textarea";
        $json[1]->options="";
        $json[1]->classes="";
        
        $json[2]=new stdClass();
        $json[2]->placeholder="";
        $json[2]->value="";
        $json[2]->label="SEO Keywords";
        $json[2]->type="textarea";
        $json[2]->options="";
        $json[2]->classes="";
        
        
        $data["fieldjson"]=$json;
        
        $data["page"]="createngo";
        $data["title"]="Create ngo";
        $data['status']=$this->user_model->getstatusdropdown();
        $this->load->view("template",$data);
    }
    public function createngosubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("address","Address","trim");
        $this->form_validation->set_rules("email","Email","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("website","Website","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createngo";
            $data["title"]="Create ngo";
            $data['status']=$this->user_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $address=$this->input->get_post("address");
            $email=$this->input->get_post("email");
            $json=$this->input->get_post("json");
            $status=$this->input->get_post("status");
            $website=$this->input->get_post("website");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            
            if($this->ngo_model->create($name,$address,$email,$json,$status,$website,$image)==0)
                $data["alerterror"]="New ngo could not be created.";
            else
                $data["alertsuccess"]="ngo created Successfully.";
            $data["redirect"]="site/viewngo";
            $this->load->view("redirect",$data);
        }
    }
    public function editngo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editngo";
        $data["title"]="Edit ngo";
        $data['status']=$this->user_model->getstatusdropdown();
        $data["before"]=$this->ngo_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editngosubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("address","Address","trim");
        $this->form_validation->set_rules("email","Email","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("status","Status","trim");
        $this->form_validation->set_rules("website","Website","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editngo";
            $data["title"]="Edit ngo";
            $data['status']=$this->user_model->getstatusdropdown();
            $data["before"]=$this->ngo_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $address=$this->input->get_post("address");
            $email=$this->input->get_post("email");
            $json=$this->input->get_post("json");
            $status=$this->input->get_post("status");
            $website=$this->input->get_post("website");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->ngo_model->getngoimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->ngo_model->edit($id,$name,$address,$email,$json,$status,$website,$image)==0)
                $data["alerterror"]="New ngo could not be Updated.";
            else
                $data["alertsuccess"]="ngo Updated Successfully.";
            $data["redirect"]="site/viewngo";
            $this->load->view("redirect",$data);
        }
    }
    public function deletengo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->ngo_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewngo";
        $this->load->view("redirect",$data);
    }
    public function viewadvertiser()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewadvertiser";
        $data["base_url"]=site_url("site/viewadvertiserjson");
        $data["title"]="View advertiser";
        $this->load->view("template",$data);
    }
    function viewadvertiserjson()
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_advertiser`");
        $this->load->view("json",$data);
    }

    public function createadvertiser()
    {
        $access=array("1");
        $this->checkaccess($access);
        
        $json=array();
        
        $json[0]=new stdClass();
        $json[0]->placeholder="";
        $json[0]->value="";
        $json[0]->label="SEO Title";
        $json[0]->type="text";
        $json[0]->options="";
        $json[0]->classes="";
        
        $json[1]=new stdClass();
        $json[1]->placeholder="";
        $json[1]->value="";
        $json[1]->label="SEO Description";
        $json[1]->type="textarea";
        $json[1]->options="";
        $json[1]->classes="";
        
        $json[2]=new stdClass();
        $json[2]->placeholder="";
        $json[2]->value="";
        $json[2]->label="SEO Keywords";
        $json[2]->type="textarea";
        $json[2]->options="";
        $json[2]->classes="";
        
        
        $data["fieldjson"]=$json;
        
        
        $data["page"]="createadvertiser";
        $data["title"]="Create advertiser";
        $this->load->view("template",$data);
    }
    public function createadvertisersubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("views","Views","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createadvertiser";
            $data["title"]="Create advertiser";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $json=$this->input->get_post("json");
            $views=$this->input->get_post("views");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($this->advertiser_model->create($name,$json,$views,$image)==0)
                $data["alerterror"]="New advertiser could not be created.";
            else
                $data["alertsuccess"]="advertiser created Successfully.";
            $data["redirect"]="site/viewadvertiser";
            $this->load->view("redirect",$data);
        }
    }
    public function editadvertiser()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editadvertiser";
        $data["title"]="Edit advertiser";
        $data["before"]=$this->advertiser_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editadvertisersubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("views","Views","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editadvertiser";
            $data["title"]="Edit advertiser";
            $data["before"]=$this->advertiser_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $json=$this->input->get_post("json");
            $views=$this->input->get_post("views");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->advertiser_model->getadvertiserimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            
            if($this->advertiser_model->edit($id,$name,$json,$views,$image)==0)
                $data["alerterror"]="New advertiser could not be Updated.";
            else
                $data["alertsuccess"]="advertiser Updated Successfully.";
            $data["redirect"]="site/viewadvertiser";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteadvertiser()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->advertiser_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewadvertiser";
        $this->load->view("redirect",$data);
    }
    public function vieworder()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="vieworder";
        $data["base_url"]=site_url("site/vieworderjson");
        $data["title"]="View order";
        $this->load->view("template",$data);
    }
    function vieworderjson()
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
        
        $elements[7]=new stdClass();
        $elements[7]->field="`user`.`name`";
        $elements[7]->sort="1";
        $elements[7]->header="User";
        $elements[7]->alias="username";
        
        $elements[8]=new stdClass();
        $elements[8]->field="`powerforone_ngo`.`name`";
        $elements[8]->sort="1";
        $elements[8]->header="ngoname";
        $elements[8]->alias="ngoname";
        
        $elements[9]=new stdClass();
        $elements[9]->field="`powerforone_advertiser`.`name`";
        $elements[9]->sort="1";
        $elements[9]->header="Cooperator";
        $elements[9]->alias="advertisername";
        
        $elements[10]=new stdClass();
        $elements[10]->field="`powerforone_order`.`typeofdonation`";
        $elements[10]->sort="1";
        $elements[10]->header="typeofdonation";
        $elements[10]->alias="typeofdonation";
        
        $elements[11]=new stdClass();
        $elements[11]->field="`powerforone_project`.`name`";
        $elements[11]->sort="1";
        $elements[11]->header="Project";
        $elements[11]->alias="projectname";
        
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_order` LEFT OUTER JOIN `user` ON `powerforone_order`.`user`=`user`.`id`  LEFT OUTER JOIN `powerforone_ngo` ON `powerforone_order`.`ngo`=`powerforone_ngo`.`id` LEFT OUTER JOIN `powerforone_advertiser` ON `powerforone_order`.`advertiser`=`powerforone_advertiser`.`id` LEFT OUTER JOIN `powerforone_project` ON `powerforone_order`.`project`=`powerforone_project`.`id` ");
        $this->load->view("json",$data);
    }

    public function createorder()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data['user']=$this->user_model->getuserdropdown();
        $data['ngo']=$this->ngo_model->getngodropdown();
        $data['project']=$this->project_model->getprojectdropdown();
        $data['status']=$this->order_model->getstatusdropdown();
        $data['advertiser']=$this->advertiser_model->getadvertiserdropdown();
        $data['typeofdonation']=$this->order_model->getdonationtypedropdown();
        $data["page"]="createorder";
        $data["title"]="Create order";
        $this->load->view("template",$data);
    }
    public function createordersubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("email","Email","trim");
        $this->form_validation->set_rules("user","User","trim");
        $this->form_validation->set_rules("amount","Amount","trim");
        $this->form_validation->set_rules("ngo","NGO","trim");
        $this->form_validation->set_rules("project","Project","trim");
        $this->form_validation->set_rules("status","status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createorder";
            $data["title"]="Create order";
            $data['user']=$this->user_model->getuserdropdown();
            $data['ngo']=$this->ngo_model->getngodropdown();
            $data['advertiser']=$this->advertiser_model->getadvertiserdropdown();
            $data['project']=$this->project_model->getprojectdropdown();
            $data['status']=$this->order_model->getstatusdropdown();
            $data['typeofdonation']=$this->order_model->getdonationtypedropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $email=$this->input->get_post("email");
            $user=$this->input->get_post("user");
            $amount=$this->input->get_post("amount");
            $ngo=$this->input->get_post("ngo");
            $project=$this->input->get_post("project");
            $status=$this->input->get_post("status");
            $transactionid=$this->input->get_post("transactionid");
            $typeofdonation=$this->input->get_post("typeofdonation");
            $advertiser=$this->input->get_post("advertiser");
            if($this->order_model->create($name,$email,$user,$amount,$ngo,$project,$status,$transactionid,$typeofdonation,$advertiser)==0)
                $data["alerterror"]="New order could not be created.";
            else
                $data["alertsuccess"]="order created Successfully.";
            $data["redirect"]="site/vieworder";
            $this->load->view("redirect",$data);
        }
    }
    public function editorder()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editorder";
        $data["page2"]="block/orderblock";
        $data["title"]="Edit order";
        $data['user']=$this->user_model->getuserdropdown();
        $data['ngo']=$this->ngo_model->getngodropdown();
        $data['project']=$this->project_model->getprojectdropdown();
        $data['status']=$this->order_model->getstatusdropdown();
        $data['advertiser']=$this->advertiser_model->getadvertiserdropdown();
        $data['typeofdonation']=$this->order_model->getdonationtypedropdown();
        $data["before"]=$this->order_model->beforeedit($this->input->get("id"));
        $this->load->view("templatewith2",$data);
    }
    public function editordersubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("email","Email","trim");
        $this->form_validation->set_rules("user","User","trim");
        $this->form_validation->set_rules("amount","Amount","trim");
        $this->form_validation->set_rules("ngo","NGO","trim");
        $this->form_validation->set_rules("project","Project","trim");
        $this->form_validation->set_rules("status","status","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editorder";
            $data["title"]="Edit order";
            $data['user']=$this->user_model->getuserdropdown();
            $data['ngo']=$this->ngo_model->getngodropdown();
            $data['advertiser']=$this->advertiser_model->getadvertiserdropdown();
            $data['project']=$this->project_model->getprojectdropdown();
            $data['status']=$this->order_model->getstatusdropdown();
            $data['typeofdonation']=$this->order_model->getdonationtypedropdown();
            $data["before"]=$this->order_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $email=$this->input->get_post("email");
            $user=$this->input->get_post("user");
            $amount=$this->input->get_post("amount");
            $ngo=$this->input->get_post("ngo");
            $project=$this->input->get_post("project");
            $status=$this->input->get_post("status");
            $transactionid=$this->input->get_post("transactionid");
            $typeofdonation=$this->input->get_post("typeofdonation");
            $advertiser=$this->input->get_post("advertiser");
            if($this->order_model->edit($id,$name,$email,$user,$amount,$ngo,$project,$status,$transactionid,$typeofdonation,$advertiser)==0)
                $data["alerterror"]="New order could not be Updated.";
            else
                $data["alertsuccess"]="order Updated Successfully.";
            $data["redirect"]="site/vieworder";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteorder()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->order_model->delete($this->input->get("id"));
        $data["redirect"]="site/vieworder";
        $this->load->view("redirect",$data);
    }
    public function viewcoupon()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewcoupon";
        $data["base_url"]=site_url("site/viewcouponjson");
        $data["title"]="View coupon";
        $this->load->view("template",$data);
    }
    function viewcouponjson()
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
        $elements[1]->header="Offer";
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
        
        $elements[4]=new stdClass();
        $elements[4]->field="`powerforone_coupon`.`text`";
        $elements[4]->sort="1";
        $elements[4]->header="Text";
        $elements[4]->alias="text";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`powerforone_coupon`.`description`";
        $elements[5]->sort="1";
        $elements[5]->header="Description";
        $elements[5]->alias="description";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`powerforone_coupon`.`couponcode`";
        $elements[6]->sort="1";
        $elements[6]->header="Coupon Code";
        $elements[6]->alias="couponcode";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`powerforone_coupon`.`expirydate`";
        $elements[7]->sort="1";
        $elements[7]->header="Expiry Date";
        $elements[7]->alias="expirydate";
        
        $elements[8]=new stdClass();
        $elements[8]->field="`powerforone_coupon`.`companyname`";
        $elements[8]->sort="1";
        $elements[8]->header="Company Name";
        $elements[8]->alias="companyname";
        
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `powerforone_coupon`");
        $this->load->view("json",$data);
    }

    public function createcoupon()
    {
        $access=array("1");
        $this->checkaccess($access);
        
        $json=array();
        
        $json[0]=new stdClass();
        $json[0]->placeholder="";
        $json[0]->value="";
        $json[0]->label="SEO Title";
        $json[0]->type="text";
        $json[0]->options="";
        $json[0]->classes="";
        
        $json[1]=new stdClass();
        $json[1]->placeholder="";
        $json[1]->value="";
        $json[1]->label="SEO Description";
        $json[1]->type="textarea";
        $json[1]->options="";
        $json[1]->classes="";
        
        $json[2]=new stdClass();
        $json[2]->placeholder="";
        $json[2]->value="";
        $json[2]->label="SEO Keywords";
        $json[2]->type="textarea";
        $json[2]->options="";
        $json[2]->classes="";
        
        
        $data["fieldjson"]=$json;
        
        
        $data["page"]="createcoupon";
        $data["title"]="Create coupon";
        $this->load->view("template",$data);
    }
    public function createcouponsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("text","Text","trim");
        $this->form_validation->set_rules("description","Description","trim");
        $this->form_validation->set_rules("expirydate","expirydate","trim");
        $this->form_validation->set_rules("couponcode","couponcode","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createcoupon";
            $data["title"]="Create coupon";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $order=$this->input->get_post("order");
            $json=$this->input->get_post("json");
            $text=$this->input->get_post("text");
            $description=$this->input->get_post("description");
            $expirydate=$this->input->get_post("expirydate");
            $couponcode=$this->input->get_post("couponcode");
            $companyname=$this->input->get_post("companyname");
            
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($this->coupon_model->create($name,$order,$json,$text,$description,$image,$expirydate,$couponcode,$companyname)==0)
                $data["alerterror"]="New coupon could not be created.";
            else
                $data["alertsuccess"]="coupon created Successfully.";
            $data["redirect"]="site/viewcoupon";
            $this->load->view("redirect",$data);
        }
    }
    public function editcoupon()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editcoupon";
        $data["title"]="Edit coupon";
        $data["before"]=$this->coupon_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editcouponsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("order","Order","trim");
        $this->form_validation->set_rules("json","Json","trim");
        $this->form_validation->set_rules("text","Text","trim");
        $this->form_validation->set_rules("description","Description","trim");
        $this->form_validation->set_rules("expirydate","expirydate","trim");
        $this->form_validation->set_rules("couponcode","couponcode","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editcoupon";
            $data["title"]="Edit coupon";
            $data["before"]=$this->coupon_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $order=$this->input->get_post("order");
            $json=$this->input->get_post("json");
            $text=$this->input->get_post("text");
            $description=$this->input->get_post("description");
            $expirydate=$this->input->get_post("expirydate");
            $couponcode=$this->input->get_post("couponcode");
            $companyname=$this->input->get_post("companyname");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->coupon_model->getcouponimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            
            if($this->coupon_model->edit($id,$name,$order,$json,$text,$description,$image,$expirydate,$couponcode,$companyname)==0)
                $data["alerterror"]="New coupon could not be Updated.";
            else
                $data["alertsuccess"]="coupon Updated Successfully.";
            $data["redirect"]="site/viewcoupon";
            $this->load->view("redirect",$data);
        }
    }
    public function deletecoupon()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->coupon_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewcoupon";
        $this->load->view("redirect",$data);
    }

    
    
    //projectimage
    
    function viewprojectimage()
	{
		$access = array("1");
		$this->checkaccess($access);
        $projectid=$this->input->get('id');
		$data['before']=$this->project_model->beforeedit($projectid);
		$data['table']=$this->projectimage_model->viewprojectimagebyproject($projectid);
		$data['page']='viewprojectimage';
		$data['page2']='block/projectblock';
        $data['title']='View project Image';
		$this->load->view('templatewith2',$data);
	}
    
    
    
    public function createprojectimage()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createprojectimage';
		$data[ 'title' ] = 'Create projectimage';
		$data[ 'projectid' ] = $this->input->get('id');
//        $data['project']=$this->projectimage_model->getprojectdropdown();
		$this->load->view( 'template', $data );	
	}
    function createprojectimagesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('project','project','trim|required');

		if($this->form_validation->run() == FALSE)	
		{
            
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createprojectimage';
            $data[ 'title' ] = 'Create projectimage';
            $data[ 'projectid' ] = $this->input->get_post('id');
//            $data['project']=$this->projectimage_model->getprojectdropdown();
            $this->load->view( 'template', $data );	
		}
		else
		{
			$project=$this->input->post('project');
			$order=$this->input->post('order');
           
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            
            if($this->projectimage_model->create($project,$image,$order)==0)
               $data['alerterror']="New projectimage could not be created.";
            else
               $data['alertsuccess']="projectimage created Successfully.";
			
			$data['redirect']="site/viewprojectimage?id=".$project;
			$this->load->view("redirect2",$data);
		}
	}
    
    function editprojectimage()
	{
		$access = array("1");
		$this->checkaccess($access);
        $projectid=$this->input->get('id');
        $data['projectid']=$projectid;
        $projectimageid=$this->input->get('projectimageid');
		$data['before']=$this->projectimage_model->beforeedit($this->input->get('projectimageid'));
//        $data['project']=$this->projectimage_model->getprojectdropdown();
		$data['page']='editprojectimage';
		$data['title']='Edit projectimage';
		$this->load->view('template',$data);
	}
	function editprojectimagesubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('project','project','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $projectid=$this->input->post('project');
            $projectimageid=$this->input->post('projectimageid');
            $data['projectid']=$projectid;
			$data['before']=$this->projectimage_model->beforeedit($this->input->post('projectimageid'));
//            $data['project']=$this->projectimage_model->getprojectdropdown();
//			$data['page2']='block/eventblock';
			$data['page']='editprojectimage';
			$data['title']='Edit projectimage';
			$this->load->view('template',$data);
		}
		else
		{
            
			$id=$this->input->post('projectimageid');
            $project=$this->input->post('project');
            $order=$this->input->post('order');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            if($image=="")
            {
                $image=$this->projectimage_model->getprojectimagebyid($id);
                $image=$image->image;
            }
            
			if($this->projectimage_model->edit($id,$project,$image,$order)==0)
			$data['alerterror']="projectimage Editing was unsuccesful";
			else
			$data['alertsuccess']="projectimage edited Successfully.";
			
			$data['redirect']="site/viewprojectimage?id=".$project;
			$this->load->view("redirect2",$data);
			
		}
	}
    
	function deleteprojectimage()
	{
		$access = array("1");
		$this->checkaccess($access);
        $projectid=$this->input->get('id');
        $projectimageid=$this->input->get('projectimageid');
		$this->projectimage_model->deleteprojectimage($this->input->get('projectimageid'));
		$data['alertsuccess']="projectimage Deleted Successfully";
		$data['redirect']="site/viewprojectimage?id=".$projectid;
		$this->load->view("redirect2",$data);
	}
    
    
    //projectenquiry
    
    function viewprojectenquiry()
	{
		$access = array("1");
		$this->checkaccess($access);
        $projectid=$this->input->get('id');
		$data['before']=$this->project_model->beforeedit($projectid);
		$data['table']=$this->projectenquiry_model->viewprojectenquirybyproject($projectid);
		$data['page']='viewprojectenquiry';
		$data['page2']='block/projectblock';
        $data['title']='View project Image';
		$this->load->view('templatewith2',$data);
	}
    
    
    
    public function createprojectenquiry()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createprojectenquiry';
		$data[ 'title' ] = 'Create projectenquiry';
		$data['user']=$this->user_model->getuserdropdown();
		$data[ 'projectid' ] = $this->input->get('id');
		$this->load->view( 'template', $data );	
	}
    function createprojectenquirysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('project','project','trim|required');
		$this->form_validation->set_rules('comment','comment','trim');
		$this->form_validation->set_rules('name','name','trim');
		$this->form_validation->set_rules('user','user','trim');
		$this->form_validation->set_rules('email','email','trim');

		if($this->form_validation->run() == FALSE)	
		{
            
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createprojectenquiry';
            $data[ 'title' ] = 'Create projectenquiry';
            $data['user']=$this->user_model->getuserdropdown();
            $data[ 'projectid' ] = $this->input->get_post('id');
            $this->load->view( 'template', $data );	
		}
		else
		{
			$project=$this->input->post('project');
			$name=$this->input->post('name');
			$comment=$this->input->post('comment');
			$user=$this->input->post('user');
			$email=$this->input->post('email');
           
            
            if($this->projectenquiry_model->create($project,$name,$comment,$user,$email)==0)
               $data['alerterror']="New projectenquiry could not be created.";
            else
               $data['alertsuccess']="projectenquiry created Successfully.";
			
			$data['redirect']="site/viewprojectenquiry?id=".$project;
			$this->load->view("redirect2",$data);
		}
	}
    
    function editprojectenquiry()
	{
		$access = array("1");
		$this->checkaccess($access);
        $projectid=$this->input->get('id');
        $data['projectid']=$projectid;
        $projectenquiryid=$this->input->get('projectenquiryid');
		$data['user']=$this->user_model->getuserdropdown();
		$data['before']=$this->projectenquiry_model->beforeedit($this->input->get('projectenquiryid'));
//        $data['project']=$this->projectenquiry_model->getprojectdropdown();
		$data['page']='editprojectenquiry';
		$data['title']='Edit projectenquiry';
		$this->load->view('template',$data);
	}
	function editprojectenquirysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('project','project','trim|required');
		$this->form_validation->set_rules('name','name','trim');
		$this->form_validation->set_rules('comment','comment','trim');
		$this->form_validation->set_rules('user','user','trim');
		$this->form_validation->set_rules('email','email','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $projectid=$this->input->post('project');
            $projectenquiryid=$this->input->post('projectenquiryid');
            $data['projectid']=$projectid;
            $data['user']=$this->user_model->getuserdropdown();
			$data['before']=$this->projectenquiry_model->beforeedit($this->input->post('projectenquiryid'));
//            $data['project']=$this->projectenquiry_model->getprojectdropdown();
			$data['page']='editprojectenquiry';
			$data['title']='Edit projectenquiry';
			$this->load->view('template',$data);
		}
		else
		{
            
			$id=$this->input->post('projectenquiryid');
            $project=$this->input->post('project');
			$name=$this->input->post('name');
			$comment=$this->input->post('comment');
			$user=$this->input->post('user');
			$email=$this->input->post('email');
            
			if($this->projectenquiry_model->edit($id,$project,$name,$comment,$user,$email)==0)
			$data['alerterror']="projectenquiry Editing was unsuccesful";
			else
			$data['alertsuccess']="projectenquiry edited Successfully.";
			
			$data['redirect']="site/viewprojectenquiry?id=".$project;
			$this->load->view("redirect2",$data);
			
		}
	}
    
	function deleteprojectenquiry()
	{
		$access = array("1");
		$this->checkaccess($access);
        $projectid=$this->input->get('id');
        $projectenquiryid=$this->input->get('projectenquiryid');
		$this->projectenquiry_model->deleteprojectenquiry($this->input->get('projectenquiryid'));
		$data['alertsuccess']="projectenquiry Deleted Successfully";
		$data['redirect']="site/viewprojectenquiry?id=".$projectid;
		$this->load->view("redirect2",$data);
	}
    
    //ordercoupon
    
    function viewordercoupon()
	{
		$access = array("1");
		$this->checkaccess($access);
        $orderid=$this->input->get('id');
		$data['before']=$this->order_model->beforeedit($orderid);
		$data['coupon']=$this->ordercoupon_model->getcoupondropdown();
		$data['table']=$this->ordercoupon_model->viewordercouponbyorder($orderid);
		$data['page']='viewordercoupon';
		$data['page2']='block/orderblock';
        $data['title']='View order Image';
		$this->load->view('templatewith2',$data);
	}
    
    
    
    public function createordercoupon()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createordercoupon';
		$data[ 'title' ] = 'Create ordercoupon';
		$data['coupon']=$this->ordercoupon_model->getcoupondropdown();
		$data[ 'orderid' ] = $this->input->get('id');
		$this->load->view( 'template', $data );	
	}
    function createordercouponsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('order','order','trim');
		$this->form_validation->set_rules('coupon','coupon','trim|required');

		if($this->form_validation->run() == FALSE)	
		{
            
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createordercoupon';
            $data[ 'title' ] = 'Create ordercoupon';
		  $data['coupon']=$this->ordercoupon_model->getcoupondropdown();
            $data[ 'orderid' ] = $this->input->get_post('id');
            $this->load->view( 'template', $data );	
		}
		else
		{
			$order=$this->input->post('order');
			$coupon=$this->input->post('coupon');
           
            
            if($this->ordercoupon_model->create($order,$coupon)==0)
               $data['alerterror']="New ordercoupon could not be created.";
            else
               $data['alertsuccess']="ordercoupon created Successfully.";
			
			$data['redirect']="site/viewordercoupon?id=".$order;
			$this->load->view("redirect",$data);
		}
	}
    
    function editordercoupon()
	{
		$access = array("1");
		$this->checkaccess($access);
        $orderid=$this->input->get('id');
        $data['orderid']=$orderid;
		$data['coupon']=$this->ordercoupon_model->getcoupondropdown();
        $ordercouponid=$this->input->get('ordercouponid');
		$data['before']=$this->ordercoupon_model->beforeedit($this->input->get('ordercouponid'));
		$data['page']='editordercoupon';
		$data['title']='Edit ordercoupon';
		$this->load->view('template',$data);
	}
	function editordercouponsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('order','order','trim|required');
		$this->form_validation->set_rules('coupon','coupon','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $orderid=$this->input->post('order');
            $ordercouponid=$this->input->post('ordercouponid');
            $data['orderid']=$orderid;
		    $data['coupon']=$this->ordercoupon_model->getcoupondropdown();
			$data['before']=$this->ordercoupon_model->beforeedit($this->input->post('ordercouponid'));
            $data['order']=$this->ordercoupon_model->getorderdropdown();
			$data['page']='editordercoupon';
			$data['title']='Edit ordercoupon';
			$this->load->view('template',$data);
		}
		else
		{
            
			$id=$this->input->post('ordercouponid');
            $order=$this->input->post('order');
            $coupon=$this->input->post('coupon');
            
			if($this->ordercoupon_model->edit($id,$order,$coupon)==0)
			$data['alerterror']="ordercoupon Editing was unsuccesful";
			else
			$data['alertsuccess']="ordercoupon edited Successfully.";
			
			$data['redirect']="site/viewordercoupon?id=".$order;
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deleteordercoupon()
	{
		$access = array("1");
		$this->checkaccess($access);
        $orderid=$this->input->get('id');
        $ordercouponid=$this->input->get('ordercouponid');
		$this->ordercoupon_model->deleteordercoupon($this->input->get('ordercouponid'));
		$data['alertsuccess']="ordercoupon Deleted Successfully";
		$data['redirect']="site/viewordercoupon?id=".$orderid;
		$this->load->view("redirect",$data);
	}
    
    //blogcategory
    
    public function viewblogcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewblogcategory";
        $data["base_url"]=site_url("site/viewblogcategoryjson");
        $data["title"]="View blogcategory";
        $this->load->view("template",$data);
    }
    function viewblogcategoryjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`blogcategory`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`blogcategory`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `blogcategory`");
        $this->load->view("json",$data);
    }

    public function createblogcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createblogcategory";
        $data["title"]="Create blogcategory";
        $this->load->view("template",$data);
    }
    public function createblogcategorysubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim|required");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createblogcategory";
            $data["title"]="Create blogcategory";
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            if($this->blogcategory_model->create($name)==0)
                $data["alerterror"]="New blogcategory could not be created.";
            else
                $data["alertsuccess"]="blogcategory created Successfully.";
            $data["redirect"]="site/viewblogcategory";
            $this->load->view("redirect",$data);
        }
    }
    public function editblogcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editblogcategory";
        $data["title"]="Edit blogcategory";
        $data["before"]=$this->blogcategory_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editblogcategorysubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editblogcategory";
            $data["title"]="Edit blogcategory";
            $data["before"]=$this->blogcategory_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            
            if($this->blogcategory_model->edit($id,$name)==0)
                $data["alerterror"]="New blogcategory could not be Updated.";
            else
                $data["alertsuccess"]="blogcategory Updated Successfully.";
            $data["redirect"]="site/viewblogcategory";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteblogcategory()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->blogcategory_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewblogcategory";
        $this->load->view("redirect",$data);
    }
    
    //blog
    
    public function viewblog()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewblog";
        $data["base_url"]=site_url("site/viewblogjson");
        $data["title"]="View blog";
        $this->load->view("template",$data);
    }
    function viewblogjson()
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
            $maxrow=20;
        }
        if($orderby=="")
        {
            $orderby="id";
            $orderorder="ASC";
        }
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `blog` LEFT OUTER JOIN `blogcategory` ON `blog`.`blogcategory`=`blogcategory`.`id`");
        $this->load->view("json",$data);
    }

    public function createblog()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data['blogcategory']=$this->blogcategory_model->getblogcategorydropdown();
        $data["page"]="createblog";
        $data["title"]="Create blog";
        $this->load->view("template",$data);
    }
    public function createblogsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("title","title","trim");
        $this->form_validation->set_rules("blogcategory","blogcategory","trim");
        $this->form_validation->set_rules("description","description","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createblog";
            $data['blogcategory']=$this->blogcategory_model->getblogcategorydropdown();
            $data["title"]="Create blog";
            $this->load->view("template",$data);
        }
        else
        {
            $title=$this->input->get_post("title");
            $blogcategory=$this->input->get_post("blogcategory");
            $description=$this->input->get_post("description");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($this->blog_model->create($title,$blogcategory,$description,$image)==0)
                $data["alerterror"]="New blog could not be created.";
            else
                $data["alertsuccess"]="blog created Successfully.";
            $data["redirect"]="site/viewblog";
            $this->load->view("redirect",$data);
        }
    }
    public function editblog()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editblog";
        $data["title"]="Edit blog";
        $data['blogcategory']=$this->blogcategory_model->getblogcategorydropdown();
        $data["before"]=$this->blog_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editblogsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("title","title","trim");
        $this->form_validation->set_rules("blogcategory","blogcategory","trim");
        $this->form_validation->set_rules("description","description","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editblog";
            $data["title"]="Edit blog";
            $data['blogcategory']=$this->blogcategory_model->getblogcategorydropdown();
            $data["before"]=$this->blog_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $title=$this->input->get_post("title");
            $blogcategory=$this->input->get_post("blogcategory");
            $description=$this->input->get_post("description");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->blog_model->getblogimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            
            if($this->blog_model->edit($id,$title,$blogcategory,$description,$image)==0)
                $data["alerterror"]="New blog could not be Updated.";
            else
                $data["alertsuccess"]="blog Updated Successfully.";
            $data["redirect"]="site/viewblog";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteblog()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->blog_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewblog";
        $this->load->view("redirect",$data);
    }

    
    //projectdatapoint
    
    function viewprojectdatapoint()
	{
		$access = array("1");
		$this->checkaccess($access);
        $projectid=$this->input->get('id');
		$data['before']=$this->project_model->beforeedit($projectid);
		$data['table']=$this->projectdatapoint_model->viewprojectdatapointbyproject($projectid);
		$data['page']='viewprojectdatapoint';
		$data['page2']='block/projectblock';
        $data['title']='View project Image';
		$this->load->view('templatewith2',$data);
	}
    
    
    
    public function createprojectdatapoint()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createprojectdatapoint';
		$data[ 'title' ] = 'Create projectdatapoint';
		$data[ 'projectid' ] = $this->input->get('id');
//        $data['project']=$this->projectdatapoint_model->getprojectdropdown();
		$this->load->view( 'template', $data );	
	}
    function createprojectdatapointsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('project','project','trim|required');
		$this->form_validation->set_rules('name','name','trim|required');

		if($this->form_validation->run() == FALSE)	
		{
            
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createprojectdatapoint';
            $data[ 'title' ] = 'Create projectdatapoint';
            $data[ 'projectid' ] = $this->input->get_post('id');
//            $data['project']=$this->projectdatapoint_model->getprojectdropdown();
            $this->load->view( 'template', $data );	
		}
		else
		{
			$project=$this->input->post('project');
			$name=$this->input->post('name');
           
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            
            
            if($this->projectdatapoint_model->create($project,$image,$name)==0)
               $data['alerterror']="New projectdatapoint could not be created.";
            else
               $data['alertsuccess']="projectdatapoint created Successfully.";
			
			$data['redirect']="site/viewprojectdatapoint?id=".$project;
			$this->load->view("redirect2",$data);
		}
	}
    
    function editprojectdatapoint()
	{
		$access = array("1");
		$this->checkaccess($access);
        $projectid=$this->input->get('id');
        $data['projectid']=$projectid;
        $projectdatapointid=$this->input->get('projectdatapointid');
		$data['before']=$this->projectdatapoint_model->beforeedit($this->input->get('projectdatapointid'));
//        $data['project']=$this->projectdatapoint_model->getprojectdropdown();
		$data['page']='editprojectdatapoint';
		$data['title']='Edit projectdatapoint';
		$this->load->view('template',$data);
	}
	function editprojectdatapointsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('project','project','trim|required');
		$this->form_validation->set_rules('name','name','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $projectid=$this->input->post('project');
            $projectdatapointid=$this->input->post('projectdatapointid');
            $data['projectid']=$projectid;
			$data['before']=$this->projectdatapoint_model->beforeedit($this->input->post('projectdatapointid'));
//            $data['project']=$this->projectdatapoint_model->getprojectdropdown();
//			$data['page2']='block/eventblock';
			$data['page']='editprojectdatapoint';
			$data['title']='Edit projectdatapoint';
			$this->load->view('template',$data);
		}
		else
		{
            
			$id=$this->input->post('projectdatapointid');
            $project=$this->input->post('project');
            $name=$this->input->post('name');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                }  
                else
                {
                    $image=$this->image_lib->dest_image;
                }
                
			}
            if($image=="")
            {
                $image=$this->projectdatapoint_model->getprojectdatapointbyid($id);
                $image=$image->image;
            }
            
			if($this->projectdatapoint_model->edit($id,$project,$image,$name)==0)
			$data['alerterror']="projectdatapoint Editing was unsuccesful";
			else
			$data['alertsuccess']="projectdatapoint edited Successfully.";
			
			$data['redirect']="site/viewprojectdatapoint?id=".$project;
			$this->load->view("redirect2",$data);
			
		}
	}
    
	function deleteprojectdatapoint()
	{
		$access = array("1");
		$this->checkaccess($access);
        $projectid=$this->input->get('id');
        $projectdatapointid=$this->input->get('projectdatapointid');
		$this->projectdatapoint_model->deleteprojectdatapoint($this->input->get('projectdatapointid'));
		$data['alertsuccess']="projectdatapoint Deleted Successfully";
		$data['redirect']="site/viewprojectdatapoint?id=".$projectid;
		$this->load->view("redirect2",$data);
	}
    
    
    
    public function viewtestimonial()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewtestimonial";
        $data["base_url"]=site_url("site/viewtestimonialjson");
        $data["title"]="View testimonial";
        $this->load->view("template",$data);
    }
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

    public function createtestimonial()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createtestimonial";
        $data["title"]="Create testimonial";
        $this->load->view("template",$data);
    }
    public function createtestimonialsubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("content","content","trim");
        $this->form_validation->set_rules("order","order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createtestimonial";
            $data["title"]="Create testimonial";
            $data['status']=$this->user_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $content=$this->input->get_post("content");
            $order=$this->input->get_post("order");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            
            if($this->testimonial_model->create($name,$content,$order,$image)==0)
                $data["alerterror"]="New testimonial could not be created.";
            else
                $data["alertsuccess"]="testimonial created Successfully.";
            $data["redirect"]="site/viewtestimonial";
            $this->load->view("redirect",$data);
        }
    }
    public function edittestimonial()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="edittestimonial";
        $data["title"]="Edit testimonial";
        $data["before"]=$this->testimonial_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function edittestimonialsubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","Name","trim");
        $this->form_validation->set_rules("content","content","trim");
        $this->form_validation->set_rules("order","order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="edittestimonial";
            $data["title"]="Edit testimonial";
            $data['status']=$this->user_model->getstatusdropdown();
            $data["before"]=$this->testimonial_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $content=$this->input->get_post("content");
            $order=$this->input->get_post("order");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
                $config_r['maintain_ratio'] = TRUE;
                $config_t['create_thumb'] = FALSE;///add this
                $config_r['width']   = 800;
                $config_r['height'] = 800;
                $config_r['quality']    = 100;
                //end of configs

                $this->load->library('image_lib', $config_r); 
                $this->image_lib->initialize($config_r);
                if(!$this->image_lib->resize())
                {
                    echo "Failed." . $this->image_lib->display_errors();
                    //return false;
                }  
                else
                {
                    //print_r($this->image_lib->dest_image);
                    //dest_image
                    $image=$this->image_lib->dest_image;
                    //return false;
                }
                
			}
            
            if($image=="")
            {
            $image=$this->testimonial_model->gettestimonialimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            if($this->testimonial_model->edit($id,$name,$content,$order,$image)==0)
                $data["alerterror"]="New testimonial could not be Updated.";
            else
                $data["alertsuccess"]="testimonial Updated Successfully.";
            $data["redirect"]="site/viewtestimonial";
            $this->load->view("redirect",$data);
        }
    }
    public function deletetestimonial()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->testimonial_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewtestimonial";
        $this->load->view("redirect",$data);
    }
    //end of testimonial
    
    public function viewnewsletter()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewnewsletter";
        $data["base_url"]=site_url("site/viewnewsletterjson");
        $data["title"]="View newsletter";
        $this->load->view("template",$data);
    }
    function viewnewsletterjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`newsletter`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`newsletter`.`email`";
        $elements[1]->sort="1";
        $elements[1]->header="Email";
        $elements[1]->alias="email";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`newsletter`.`timestamp`";
        $elements[2]->sort="1";
        $elements[2]->header="Timestamp";
        $elements[2]->alias="timestamp";
        
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `newsletter`");
        $this->load->view("json",$data);
    }

    public function createnewsletter()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createnewsletter";
        $data["title"]="Create newsletter";
        $this->load->view("template",$data);
    }
    public function createnewslettersubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("email","email","trim|required");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createnewsletter";
            $data["title"]="Create newsletter";
            $data['status']=$this->user_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $email=$this->input->get_post("email");
            
            if($this->newsletter_model->create($email)==0)
                $data["alerterror"]="New newsletter could not be created.";
            else
                $data["alertsuccess"]="newsletter created Successfully.";
            $data["redirect"]="site/viewnewsletter";
            $this->load->view("redirect",$data);
        }
    }
    public function editnewsletter()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editnewsletter";
        $data["title"]="Edit newsletter";
        $data["before"]=$this->newsletter_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editnewslettersubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("email","email","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editnewsletter";
            $data["title"]="Edit newsletter";
            $data['status']=$this->user_model->getstatusdropdown();
            $data["before"]=$this->newsletter_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $email=$this->input->get_post("email");
            
            if($this->newsletter_model->edit($id,$email)==0)
                $data["alerterror"]="New newsletter could not be Updated.";
            else
                $data["alertsuccess"]="newsletter Updated Successfully.";
            $data["redirect"]="site/viewnewsletter";
            $this->load->view("redirect",$data);
        }
    }
    public function deletenewsletter()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->newsletter_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewnewsletter";
        $this->load->view("redirect",$data);
    }
    
    	public function exportnewsletter()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->newsletter_model->exportnewsletter();
        $data["redirect"]="site/viewnewsletter";
        $this->load->view("redirect",$data);
            
	}
    //end of newsletter
    
    public function viewcontactus()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewcontactus";
        $data["base_url"]=site_url("site/viewcontactusjson");
        $data["title"]="View contactus";
        $this->load->view("template",$data);
    }
    function viewcontactusjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`contactus`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`contactus`.`email`";
        $elements[1]->sort="1";
        $elements[1]->header="Email";
        $elements[1]->alias="email";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`contactus`.`timestamp`";
        $elements[2]->sort="1";
        $elements[2]->header="Timestamp";
        $elements[2]->alias="timestamp";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`contactus`.`name`";
        $elements[3]->sort="1";
        $elements[3]->header="Name";
        $elements[3]->alias="name";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`contactus`.`contact`";
        $elements[4]->sort="1";
        $elements[4]->header="Contact";
        $elements[4]->alias="contact";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`contactus`.`country`";
        $elements[5]->sort="1";
        $elements[5]->header="Country";
        $elements[5]->alias="country";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`contactus`.`city`";
        $elements[6]->sort="1";
        $elements[6]->header="City";
        $elements[6]->alias="city";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`contactus`.`message`";
        $elements[7]->sort="1";
        $elements[7]->header="Message";
        $elements[7]->alias="message";
        
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `contactus`");
        $this->load->view("json",$data);
    }

    public function createcontactus()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createcontactus";
        $data["title"]="Create contactus";
        $this->load->view("template",$data);
    }
    public function createcontactussubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","name","trim|required");
        $this->form_validation->set_rules("contact","contact","trim");
        $this->form_validation->set_rules("email","email","trim");
        $this->form_validation->set_rules("country","country","trim");
        $this->form_validation->set_rules("city","city","trim");
        $this->form_validation->set_rules("message","message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createcontactus";
            $data["title"]="Create contactus";
            $data['status']=$this->user_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $contact=$this->input->get_post("contact");
            $email=$this->input->get_post("email");
            $country=$this->input->get_post("country");
            $city=$this->input->get_post("city");
            $message=$this->input->get_post("message");
            
            if($this->contactus_model->create($name,$contact,$email,$country,$city,$message)==0)
                $data["alerterror"]="New contactus could not be created.";
            else
                $data["alertsuccess"]="contactus created Successfully.";
            $data["redirect"]="site/viewcontactus";
            $this->load->view("redirect",$data);
        }
    }
    public function editcontactus()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editcontactus";
        $data["title"]="Edit contactus";
        $data["before"]=$this->contactus_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editcontactussubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","name","trim|required");
        $this->form_validation->set_rules("contact","contact","trim");
        $this->form_validation->set_rules("email","email","trim");
        $this->form_validation->set_rules("country","country","trim");
        $this->form_validation->set_rules("city","city","trim");
        $this->form_validation->set_rules("message","message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editcontactus";
            $data["title"]="Edit contactus";
            $data['status']=$this->user_model->getstatusdropdown();
            $data["before"]=$this->contactus_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $contact=$this->input->get_post("contact");
            $email=$this->input->get_post("email");
            $country=$this->input->get_post("country");
            $city=$this->input->get_post("city");
            $message=$this->input->get_post("message");
            
            if($this->contactus_model->edit($id,$name,$contact,$email,$country,$city,$message)==0)
                $data["alerterror"]="New contactus could not be Updated.";
            else
                $data["alertsuccess"]="contactus Updated Successfully.";
            $data["redirect"]="site/viewcontactus";
            $this->load->view("redirect",$data);
        }
    }
    public function deletecontactus()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->contactus_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewcontactus";
        $this->load->view("redirect",$data);
    }
    
    //end of contactus
    
    public function viewstaticpage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewstaticpage";
        $data["base_url"]=site_url("site/viewstaticpagejson");
        $data["title"]="View staticpage";
        $this->load->view("template",$data);
    }
    function viewstaticpagejson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`staticpage`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`staticpage`.`name`";
        $elements[1]->sort="1";
        $elements[1]->header="Name";
        $elements[1]->alias="name";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`staticpage`.`content`";
        $elements[2]->sort="1";
        $elements[2]->header="Content";
        $elements[2]->alias="content";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`staticpage`.`order`";
        $elements[3]->sort="1";
        $elements[3]->header="Order";
        $elements[3]->alias="order";
        
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `staticpage`");
        $this->load->view("json",$data);
    }

    public function createstaticpage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createstaticpage";
        $data["title"]="Create staticpage";
        $this->load->view("template",$data);
    }
    public function createstaticpagesubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","name","trim|required");
        $this->form_validation->set_rules("content","content","trim");
        $this->form_validation->set_rules("order","order","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createstaticpage";
            $data["title"]="Create staticpage";
            $data['status']=$this->user_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $content=$this->input->get_post("content");
            $order=$this->input->get_post("order");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
//                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
//                $config_r['maintain_ratio'] = TRUE;
//                $config_t['create_thumb'] = FALSE;///add this
//                $config_r['width']   = 800;
//                $config_r['height'] = 800;
//                $config_r['quality']    = 100;
//                //end of configs
//
//                $this->load->library('image_lib', $config_r); 
//                $this->image_lib->initialize($config_r);
//                if(!$this->image_lib->resize())
//                {
//                    echo "Failed." . $this->image_lib->display_errors();
//                    //return false;
//                }  
//                else
//                {
//                    $image=$this->image_lib->dest_image;
//                    //return false;
//                }
                
			}
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="bannerimage";
			$bannerimage="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$bannerimage=$uploaddata['file_name'];
                
//                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
//                $config_r['maintain_ratio'] = TRUE;
//                $config_t['create_thumb'] = FALSE;///add this
//                $config_r['width']   = 800;
//                $config_r['height'] = 800;
//                $config_r['quality']    = 100;
//                //end of configs
//
//                $this->load->library('image_lib', $config_r); 
//                $this->image_lib->initialize($config_r);
//                if(!$this->image_lib->resize())
//                {
//                    echo "Failed." . $this->image_lib->display_errors();
//                    //return false;
//                }  
//                else
//                {
//                    $image=$this->image_lib->dest_image;
//                    //return false;
//                }
                
			}
            
            
            if($this->staticpage_model->create($name,$content,$order,$bannerimage,$image)==0)
                $data["alerterror"]="New staticpage could not be created.";
            else
                $data["alertsuccess"]="staticpage created Successfully.";
            $data["redirect"]="site/viewstaticpage";
            $this->load->view("redirect",$data);
        }
    }
    public function editstaticpage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editstaticpage";
        $data["title"]="Edit staticpage";
        $data["before"]=$this->staticpage_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editstaticpagesubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","name","trim|required");
        $this->form_validation->set_rules("content","content","trim");
        $this->form_validation->set_rules("order","order","trim");
        
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editstaticpage";
            $data["title"]="Edit staticpage";
            $data['status']=$this->user_model->getstatusdropdown();
            $data["before"]=$this->staticpage_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $content=$this->input->get_post("content");
            $order=$this->input->get_post("order");
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
                
//                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
//                $config_r['maintain_ratio'] = TRUE;
//                $config_t['create_thumb'] = FALSE;///add this
//                $config_r['width']   = 800;
//                $config_r['height'] = 800;
//                $config_r['quality']    = 100;
//                //end of configs
//
//                $this->load->library('image_lib', $config_r); 
//                $this->image_lib->initialize($config_r);
//                if(!$this->image_lib->resize())
//                {
//                    echo "Failed." . $this->image_lib->display_errors();
//                    //return false;
//                }  
//                else
//                {
//                    //print_r($this->image_lib->dest_image);
//                    //dest_image
//                    $image=$this->image_lib->dest_image;
//                    //return false;
//                }
                
			}
            
            if($image=="")
            {
            $image=$this->staticpage_model->getstaticpageimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="bannerimage";
			$bannerimage="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$bannerimage=$uploaddata['file_name'];
                
//                $config_r['source_image']   = './uploads/' . $uploaddata['file_name'];
//                $config_r['maintain_ratio'] = TRUE;
//                $config_t['create_thumb'] = FALSE;///add this
//                $config_r['width']   = 800;
//                $config_r['height'] = 800;
//                $config_r['quality']    = 100;
//                //end of configs
//
//                $this->load->library('image_lib', $config_r); 
//                $this->image_lib->initialize($config_r);
//                if(!$this->image_lib->resize())
//                {
//                    echo "Failed." . $this->image_lib->display_errors();
//                    //return false;
//                }  
//                else
//                {
//                    //print_r($this->image_lib->dest_image);
//                    //dest_image
//                    $image=$this->image_lib->dest_image;
//                    //return false;
//                }
                
			}
            
            if($bannerimage=="")
            {
            $bannerimage=$this->staticpage_model->getstaticpagebannerimagebyid($id);
               // print_r($bannerimage);
                $bannerimage=$bannerimage->bannerimage;
            }
            
            if($this->staticpage_model->edit($id,$name,$content,$order,$bannerimage,$image,$bannerimage,$image)==0)
                $data["alerterror"]="New staticpage could not be Updated.";
            else
                $data["alertsuccess"]="staticpage Updated Successfully.";
            $data["redirect"]="site/viewstaticpage";
            $this->load->view("redirect",$data);
        }
    }
    public function deletestaticpage()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->staticpage_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewstaticpage";
        $this->load->view("redirect",$data);
    }
    
    //end of staticpage
    
    
    
    public function viewpfo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewpfo";
        $data["base_url"]=site_url("site/viewpfojson");
        $data["title"]="View pfo";
        $this->load->view("template",$data);
    }
    function viewpfojson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`pfo`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`pfo`.`email`";
        $elements[1]->sort="1";
        $elements[1]->header="Email";
        $elements[1]->alias="email";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`pfo`.`timestamp`";
        $elements[2]->sort="1";
        $elements[2]->header="Timestamp";
        $elements[2]->alias="timestamp";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`pfo`.`name`";
        $elements[3]->sort="1";
        $elements[3]->header="Name";
        $elements[3]->alias="name";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`pfo`.`contact`";
        $elements[4]->sort="1";
        $elements[4]->header="Contact";
        $elements[4]->alias="contact";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`pfo`.`country`";
        $elements[5]->sort="1";
        $elements[5]->header="Country";
        $elements[5]->alias="country";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`pfo`.`city`";
        $elements[6]->sort="1";
        $elements[6]->header="City";
        $elements[6]->alias="city";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`pfo`.`message`";
        $elements[7]->sort="1";
        $elements[7]->header="Message";
        $elements[7]->alias="message";
        
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `pfo`");
        $this->load->view("json",$data);
    }

    public function createpfo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createpfo";
        $data["title"]="Create pfo";
        $this->load->view("template",$data);
    }
    public function createpfosubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","name","trim|required");
        $this->form_validation->set_rules("contact","contact","trim");
        $this->form_validation->set_rules("email","email","trim");
        $this->form_validation->set_rules("country","country","trim");
        $this->form_validation->set_rules("city","city","trim");
        $this->form_validation->set_rules("message","message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createpfo";
            $data["title"]="Create pfo";
            $data['status']=$this->user_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $contact=$this->input->get_post("contact");
            $email=$this->input->get_post("email");
            $country=$this->input->get_post("country");
            $city=$this->input->get_post("city");
            $message=$this->input->get_post("message");
            
            if($this->pfo_model->create($name,$contact,$email,$country,$city,$message)==0)
                $data["alerterror"]="New pfo could not be created.";
            else
                $data["alertsuccess"]="pfo created Successfully.";
            $data["redirect"]="site/viewpfo";
            $this->load->view("redirect",$data);
        }
    }
    public function editpfo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editpfo";
        $data["title"]="Edit pfo";
        $data["before"]=$this->pfo_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editpfosubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","name","trim|required");
        $this->form_validation->set_rules("contact","contact","trim");
        $this->form_validation->set_rules("email","email","trim");
        $this->form_validation->set_rules("country","country","trim");
        $this->form_validation->set_rules("city","city","trim");
        $this->form_validation->set_rules("message","message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editpfo";
            $data["title"]="Edit pfo";
            $data['status']=$this->user_model->getstatusdropdown();
            $data["before"]=$this->pfo_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $contact=$this->input->get_post("contact");
            $email=$this->input->get_post("email");
            $country=$this->input->get_post("country");
            $city=$this->input->get_post("city");
            $message=$this->input->get_post("message");
            
            if($this->pfo_model->edit($id,$name,$contact,$email,$country,$city,$message)==0)
                $data["alerterror"]="New pfo could not be Updated.";
            else
                $data["alertsuccess"]="pfo Updated Successfully.";
            $data["redirect"]="site/viewpfo";
            $this->load->view("redirect",$data);
        }
    }
    public function deletepfo()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->pfo_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewpfo";
        $this->load->view("redirect",$data);
    }
    
    //end of pfo
    
    public function viewworkwithus()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="viewworkwithus";
        $data["base_url"]=site_url("site/viewworkwithusjson");
        $data["title"]="View workwithus";
        $this->load->view("template",$data);
    }
    function viewworkwithusjson()
    {
        $elements=array();
        
        $elements[0]=new stdClass();
        $elements[0]->field="`workwithus`.`id`";
        $elements[0]->sort="1";
        $elements[0]->header="ID";
        $elements[0]->alias="id";
        
        $elements[1]=new stdClass();
        $elements[1]->field="`workwithus`.`email`";
        $elements[1]->sort="1";
        $elements[1]->header="Email";
        $elements[1]->alias="email";
        
        $elements[2]=new stdClass();
        $elements[2]->field="`workwithus`.`timestamp`";
        $elements[2]->sort="1";
        $elements[2]->header="Timestamp";
        $elements[2]->alias="timestamp";
        
        $elements[3]=new stdClass();
        $elements[3]->field="`workwithus`.`name`";
        $elements[3]->sort="1";
        $elements[3]->header="Name";
        $elements[3]->alias="name";
        
        $elements[4]=new stdClass();
        $elements[4]->field="`workwithus`.`contact`";
        $elements[4]->sort="1";
        $elements[4]->header="Contact";
        $elements[4]->alias="contact";
        
        $elements[5]=new stdClass();
        $elements[5]->field="`workwithus`.`country`";
        $elements[5]->sort="1";
        $elements[5]->header="Country";
        $elements[5]->alias="country";
        
        $elements[6]=new stdClass();
        $elements[6]->field="`workwithus`.`city`";
        $elements[6]->sort="1";
        $elements[6]->header="City";
        $elements[6]->alias="city";
        
        $elements[7]=new stdClass();
        $elements[7]->field="`workwithus`.`message`";
        $elements[7]->sort="1";
        $elements[7]->header="Message";
        $elements[7]->alias="message";
        
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
        $data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `workwithus`");
        $this->load->view("json",$data);
    }

    public function createworkwithus()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="createworkwithus";
        $data["title"]="Create workwithus";
        $this->load->view("template",$data);
    }
    public function createworkwithussubmit() 
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("name","name","trim|required");
        $this->form_validation->set_rules("contact","contact","trim");
        $this->form_validation->set_rules("email","email","trim");
        $this->form_validation->set_rules("country","country","trim");
        $this->form_validation->set_rules("city","city","trim");
        $this->form_validation->set_rules("message","message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="createworkwithus";
            $data["title"]="Create workwithus";
            $data['status']=$this->user_model->getstatusdropdown();
            $this->load->view("template",$data);
        }
        else
        {
            $name=$this->input->get_post("name");
            $contact=$this->input->get_post("contact");
            $email=$this->input->get_post("email");
            $country=$this->input->get_post("country");
            $city=$this->input->get_post("city");
            $message=$this->input->get_post("message");
            
            if($this->workwithus_model->create($name,$contact,$email,$country,$city,$message)==0)
                $data["alerterror"]="New workwithus could not be created.";
            else
                $data["alertsuccess"]="workwithus created Successfully.";
            $data["redirect"]="site/viewworkwithus";
            $this->load->view("redirect",$data);
        }
    }
    public function editworkwithus()
    {
        $access=array("1");
        $this->checkaccess($access);
        $data["page"]="editworkwithus";
        $data["title"]="Edit workwithus";
        $data["before"]=$this->workwithus_model->beforeedit($this->input->get("id"));
        $this->load->view("template",$data);
    }
    public function editworkwithussubmit()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->form_validation->set_rules("id","ID","trim");
        $this->form_validation->set_rules("name","name","trim|required");
        $this->form_validation->set_rules("contact","contact","trim");
        $this->form_validation->set_rules("email","email","trim");
        $this->form_validation->set_rules("country","country","trim");
        $this->form_validation->set_rules("city","city","trim");
        $this->form_validation->set_rules("message","message","trim");
        if($this->form_validation->run()==FALSE)
        {
            $data["alerterror"]=validation_errors();
            $data["page"]="editworkwithus";
            $data["title"]="Edit workwithus";
            $data['status']=$this->user_model->getstatusdropdown();
            $data["before"]=$this->workwithus_model->beforeedit($this->input->get("id"));
            $this->load->view("template",$data);
        }
        else
        {
            $id=$this->input->get_post("id");
            $name=$this->input->get_post("name");
            $contact=$this->input->get_post("contact");
            $email=$this->input->get_post("email");
            $country=$this->input->get_post("country");
            $city=$this->input->get_post("city");
            $message=$this->input->get_post("message");
            
            if($this->workwithus_model->edit($id,$name,$contact,$email,$country,$city,$message)==0)
                $data["alerterror"]="New workwithus could not be Updated.";
            else
                $data["alertsuccess"]="workwithus Updated Successfully.";
            $data["redirect"]="site/viewworkwithus";
            $this->load->view("redirect",$data);
        }
    }
    public function deleteworkwithus()
    {
        $access=array("1");
        $this->checkaccess($access);
        $this->workwithus_model->delete($this->input->get("id"));
        $data["redirect"]="site/viewworkwithus";
        $this->load->view("redirect",$data);
    }
    
    //end of workwithus
    
}
?>
