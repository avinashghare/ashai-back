<section class="panel">
    <header class="panel-heading">
        coupon Details
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editcouponsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Name</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value(' name ',$before->name);?>'>
                </div>
            </div>
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Company Name</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control companyname" name="companyname" value='<?php echo set_value(' companyname ',$before->companyname);?>'>
                            </div>
                        </div>
                        
            <div class=" form-group">
			  <label class="col-sm-2 control-label" for="normal-field">Expiry Date</label>
			  <div class="col-sm-4">
				<input type="date" id="normal-field" class="form-control" name="expirydate" value="<?php echo set_value('expirydate',$before->expirydate);?>">
			  </div>
			</div>
				
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Coupon Code</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="couponcode" value='<?php echo set_value(' couponcode ',$before->couponcode);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Order</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ',$before->order);?>'>
                </div>
            </div>
<!--
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Json</label>
                <div class="col-sm-8">
                    <textarea name="json" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'json',$before->json);?></textarea>
                </div>
            </div>
-->
            
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Description</label>
                <div class="col-sm-8">
                    <textarea name="description" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'description',$before->description);?></textarea>
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
           <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Status</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "status",$status,set_value( 'status',$before->status), "class='chzn-select form-control'");?>
                            </div>
                        </div>
           <div class=" form-group hidden">
				  <label class="col-sm-2 control-label" for="normal-field">json</label>
				  <div class="col-sm-4">
					<textarea name="json" id="" cols="20" rows="10" class="form-control tinymce fieldjsoninput"><?php echo set_value( 'json',$before->json);?></textarea>
				  </div>
				</div>
				<div class="fieldjson"></div>
           
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary jsonsubmit">Save</button>
                    <a href='<?php echo site_url("site/viewcoupon"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
    
</section>

<script>
    $(window).load(function () {
        filljsoninput(".fieldjsoninput",".fieldjson");
        $(".jsonsubmit").click(function() {
            jsonsubmit(".fieldjsoninput",".fieldjson");
        });
    });
</script>