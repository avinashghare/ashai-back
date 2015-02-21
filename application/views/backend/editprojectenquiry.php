<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 project Enquiry Details
			</header>
			
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editprojectenquirysubmit');?>" enctype= "multipart/form-data">
				
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">project</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="project" value="<?php echo set_value('project',$before->project);?>">
					
				  </div>
				</div>
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">projectenquiry</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="projectenquiryid" value="<?php echo set_value('projectenquiryid',$before->id);?>">
					
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
					
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before->email);?>">
					
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">User</label>
				  <div class="col-sm-4">
					<?php 	 echo form_dropdown('user',$user,set_value('user',$before->user),'id="userid" onchange="operatorcategories()" class="chzn-select form-control" 	data-placeholder="Choose a user..."');
					?>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">comment</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="comment" value="<?php echo set_value('comment',$before->comment);?>">
					
				  </div>
				</div>
				
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>
