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
                Cooperator Details
            </header>
            <div class="panel-body">
                <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createadvertisersubmit");?>' enctype='multipart/form-data'>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Name</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value(' name ');?>'>
                            </div>
                        </div>
<!--
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Json</label>
                            <div class="col-sm-8">
                                <textarea name="json" id="" cols="20" rows="10" class="form-control tinymce">
                                    <?php echo set_value( 'json');?>
                                </textarea>
                            </div>
                        </div>
-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Views</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="views" value='<?php echo set_value(' views ');?>'>
                            </div>
                        </div>
                        <div class=" form-group">
                         <span>Square(1:1 or eg.200x200)</span>
                          <label class="col-sm-2 control-label" for="normal-field">Image</label>
                          <div class="col-sm-4">
                            <input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Website</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="website" value='<?php echo set_value(' website ');?>'>
                            </div>
                        </div>
                        
                        <div class="form-group hidden" >
                            <label class="col-sm-2 control-label" for="normal-field">json</label>
                            <div class="col-sm-4">
                                <textarea name="json" id="" cols="20" rows="10" class="form-control tinymce fieldjsoninput"><?php echo json_encode($fieldjson,true); ?></textarea>

                            </div>
                        </div>
                        <div class="fieldjson"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary jsonsubmit">Save</button>
                                <a href="<?php echo site_url(" site/viewpage "); ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                </form>
                </div>
        </section>
        </div>
    </div>

<script type="text/javascript">
     
    $(document).ready(function () {
//        console.log($(".fieldjsoninput").val());
        filljsoninput(".fieldjsoninput",".fieldjson");
        $(".jsonsubmit").click(function() {
            jsonsubmit(".fieldjsoninput",".fieldjson");
            //return false;
        });
        
    });
</script>