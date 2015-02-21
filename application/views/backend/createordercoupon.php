<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewordercoupon?id=').$orderid; ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Order Geo Location Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createordercouponsubmit');?>" enctype= "multipart/form-data">
			  
				<div class="form-group" style="display:none">
				  <label class="col-sm-2 control-label" for="normal-field">Order</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="order" value="<?php echo set_value('order',$orderid);?>">
					
				  </div>
				</div>
				<div class=" form-group">
                    <label class="col-sm-2 control-label" for="normal-field">Coupon</label>
                    <div class="col-sm-4">
                        <?php echo form_dropdown( "coupon",$coupon,set_value( 'coupon'), "class='chzn-select form-control'");?>
                    </div>
                </div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewordercoupon'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>

