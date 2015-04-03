<div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <div class="pull-right">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                order Details
            </header>
            <div class="panel-body">
                <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createordersubmit");?>' enctype='multipart/form-data'>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Name</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value(' name ');?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Email</label>
                            <div class="col-sm-4">
                                <input type="email" id="normal-field" class="form-control" name="email" value='<?php echo set_value(' email ');?>'>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">User</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "user",$user,set_value( 'user'), "class='chzn-select form-control'");?>
                            </div>
                        </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">mobile</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="mobile" value='<?php echo set_value(' mobile ');?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">city</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="city" value='<?php echo set_value(' city ');?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Address</label>
                <div class="col-sm-8">
                    <textarea name="address" id="" cols="20" rows="10" class="form-control "><?php echo set_value( 'address');?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">pan</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="pan" value='<?php echo set_value(' pan ');?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">dob</label>
                <div class="col-sm-4">
                    <input type="date" id="normal-field" class="form-control" name="dob" value='<?php echo set_value(' dob ');?>'>
                </div>
            </div>

                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Type Of Donation</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "typeofdonation",$typeofdonation,set_value( 'typeofdonation'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Amount</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="amount" value='<?php echo set_value(' amount ');?>'>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">NGO</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "ngo",$ngo,set_value( 'ngo'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Cooperator</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "advertiser",$advertiser,set_value( 'advertiser'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Project</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "project",$project,set_value( 'project'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Status</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "status",$status,set_value( 'status'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Transaction Id</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="transactionid" value='<?php echo set_value(' transactionid ');?>'>
                            </div>
                        </div>

                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Tax Certificate</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "istax",$istax,set_value( 'istax'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Anonymous</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "anonymous",$anonymous,set_value( 'anonymous'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Give</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "give",$give,set_value( 'give'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?php echo site_url("site/vieworder"); ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                </form>
                </div>
        </section>
        </div>
    </div>
