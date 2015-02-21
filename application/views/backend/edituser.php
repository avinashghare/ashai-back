	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editusersubmit');?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<?php echo $before->email; ?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
				  </div>
				</div>
<!--
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Username</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="username" value="<?php echo set_value('username',$before->username);?>">
				  </div>
				</div>
-->
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="description-field">Password</label>
				  <div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="password" value="">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="description-field">Confirm Password</label>
				  <div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="confirmpassword" value="">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">DOB</label>
				  <div class="col-sm-4">
					<input type="date" id="normal-field" class="form-control" name="dob" value="<?php echo set_value('dob',$before->dob);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Street</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="street" value="<?php echo set_value('street',$before->street);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Address</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address',$before->address);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">City</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="city" value="<?php echo set_value('city',$before->city);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">State</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="state" value="<?php echo set_value('state',$before->state);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Country</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="country" value="<?php echo set_value('country',$before->country);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Pincode</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="pincode" value="<?php echo set_value('pincode',$before->pincode);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Facebook</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="facebook" value="<?php echo set_value('facebook',$before->facebook);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Google</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="google" value="<?php echo set_value('google',$before->google);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Twitter</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="twitter" value="<?php echo set_value('twitter',$before->twitter);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">SocialId</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="socialid" value="<?php echo set_value('socialid',$before->socialid);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">logintype</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('logintype',$logintype,set_value('logintype',$before->logintype),'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('status',$status,set_value('status',$before->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Select Accesslevel</label>
				  <div class="col-sm-4">
					<?php 	 echo form_dropdown('accesslevel',$accesslevel,set_value('accesslevel',$before->accesslevel),'onchange="operatorcategories()"class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
<!--
				<div class=" form-group categoryclass" 
                   <?php if(empty($selectedcategory))
                        echo 'style="display:none;"';
                    else
                       echo '';
                     ?>
                     >
				  <label class="col-sm-2 control-label">Category</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('category[]',$category,$selectedcategory,'id="select10" class="chzn-select form-control" 	data-placeholder="Choose a category..." multiple');
					?>
				  </div>
				</div>
-->
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
					<?php if($before->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
						<?php }
					?>
				  </div>
				</div>
				
				
				<div class=" form-group hidden">
				  <label class="col-sm-2 control-label" for="normal-field">json</label>
				  <div class="col-sm-4">
					<textarea name="json" id="" cols="20" rows="10" class="form-control tinymce fieldjsoninput"><?php echo set_value( 'json',$before->json);?></textarea>
				  </div>
				</div>
				<div class="fieldjson"></div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary jsonsubmit">Save</button>
				  <a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
<script type="text/javascript">
    function operatorcategories() {
        console.log($('#accesslevelid').val());
        if($('#accesslevelid').val()==2)
        {
            $( ".categoryclass" ).show();
        }
       
        else
        {
            $( ".categoryclass" ).hide();
        }
       
    }
    
     
    $(document).ready(function () {
//        console.log($(".fieldjsoninput").val());
        filljsoninput(".fieldjsoninput",".fieldjson");
        $(".jsonsubmit").click(function() {
            jsonsubmit(".fieldjsoninput",".fieldjson");
            //return false;
        });
        
    });
</script>