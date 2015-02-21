<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 project Data Point Details
			</header>
			
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editprojectdatapointsubmit');?>" enctype= "multipart/form-data">
				
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">project</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="project" value="<?php echo set_value('project',$before->project);?>">
					
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
					
				  </div>
				</div>
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">projectdatapoint</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="projectdatapointid" value="<?php echo set_value('projectdatapointid',$before->id);?>">
					
				  </div>
				</div>
				
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
