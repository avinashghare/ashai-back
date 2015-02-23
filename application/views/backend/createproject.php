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
                project Details
            </header>
            <div class="panel-body">
                <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createprojectsubmit");?>' enctype='multipart/form-data'>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Name</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value(' name ');?>'>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Tagline</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="tagline" value='<?php echo set_value(' tagline ');?>'>
                            </div>
                        </div>
                        
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Category</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "category",$category,set_value( 'category'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Contribution</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="contribution" value='<?php echo set_value(' contribution ');?>'>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Times</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="times" value='<?php echo set_value(' times ');?>'>
                            </div>
                        </div>
                        
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Content</label>
                            <div class="col-sm-8">
                                <textarea name="content" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'content');?></textarea>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">NGO</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "ngo",$ngo,set_value( 'ngo'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Advertiser</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "advertiser",$advertiser,set_value( 'advertiser'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Donate</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "donate",$donate,set_value( 'donate'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">share</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "share",$share,set_value( 'share'), "class='chzn-select form-control'");?>
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
                            <label class="col-sm-2 control-label" for="normal-field">Likes</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="like" value='<?php echo set_value(' like ');?>'>
                            </div>
                        </div>
<!--
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Share</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="share" value='<?php echo set_value(' share ');?>'>
                            </div>
                        </div>
-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Follow</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="follow" value='<?php echo set_value(' follow ');?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Facebook</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="facebook" value='<?php echo set_value(' facebook ');?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Twitter</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="twitter" value='<?php echo set_value(' twitter ');?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Google</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="google" value='<?php echo set_value(' google ');?>'>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Status</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "status",$status,set_value( 'status'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Order</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ');?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Views</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="views" value='<?php echo set_value(' views ');?>'>
                            </div>
                        </div>
                        
                        <div class=" form-group">
                          <label class="col-sm-2 control-label" for="normal-field">Image</label>
                          <div class="col-sm-4">
                            <input type="file" id="normal-field" class="form-control"  name="image" value="<?php echo set_value('image');?>">
                          </div>
                        </div>
				
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Video</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="video" value='<?php echo set_value(' video ');?>'>
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
                                <a href="<?php echo site_url("site/viewproject"); ?>" class="btn btn-secondary">Cancel</a>
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