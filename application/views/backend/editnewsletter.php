<section class="panel">
    <header class="panel-heading">
        Newsletter Details
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editnewslettersubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">email</label>
                            <div class="col-sm-4">
                                <input type="email" id="normal-field" class="form-control" name="email" value='<?php echo set_value(' email ',$before->email);?>'>
                            </div>
                        </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewnewsletter"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>
