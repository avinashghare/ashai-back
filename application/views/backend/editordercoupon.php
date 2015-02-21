<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Order Geo Location Details
			</header>
			
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editordercouponsubmit');?>" enctype= "multipart/form-data">
				
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">Order</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order',$before->order);?>">
					
				  </div>
				</div>
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">ordercoupon</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="ordercouponid" value="<?php echo set_value('ordercouponid',$before->id);?>">
					
				  </div>
				</div>
				
				<div class=" form-group">
                    <label class="col-sm-2 control-label" for="normal-field">Coupon</label>
                    <div class="col-sm-4">
                        <?php echo form_dropdown( "coupon",$coupon,set_value( 'coupon',$before->coupon), "class='chzn-select form-control'");?>
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
