<section class="panel">
    <header class="panel-heading">
        project Details
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editprojectsubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Name</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control projectnamelimit" name="name" value='<?php echo set_value(' name ',$before->name);?>'>
                </div>
            </div>
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Project Tagline</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control projecttagline" name="tagline" value='<?php echo set_value(' tagline ',$before->tagline);?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Card Tagline</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control cardtagline" name="cardtagline" value='<?php echo set_value(' cardtagline ',$before->cardtagline);?>'>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Location</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="location" value='<?php echo set_value(' location ',$before->location);?>'>
                            </div>
                        </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Category</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "category",$category,set_value( 'category',$before->category),"class='chzn-select form-control'");?>
                </div>
            </div>
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Contribution</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="contribution" value='<?php echo set_value(' contribution ',$before->contribution);?>'>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Times</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="times" value='<?php echo set_value(' times ',$before->times);?>'>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Times(In Words)</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="timesinword" value='<?php echo set_value(' timesinword ',$before->timesinword);?>'>
                            </div>
                        </div>
                        
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Content</label>
                            <div class="col-sm-8">
                                <textarea name="content" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'content',$before->content);?></textarea>
                            </div>
                        </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">NGO</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "ngo",$ngo,set_value( 'ngo',$before->ngo),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Cooperator</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "advertiser",$advertiser,set_value( 'advertiser',$before->advertiser),"class='chzn-select form-control'");?>
                </div>
            </div>
                       
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Share Value</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="sharevalue" value='<?php echo set_value(' sharevalue ',$before->sharevalue);?>'>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Donate</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "donate",$donate,set_value( 'donate',$before->donate), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Raise Awareness</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "share",$share,set_value( 'share',$before->share), "class='chzn-select form-control'");?>
                            </div>
                        </div>
<!--
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Json</label>
                <div class="col-sm-8">
                    <textarea name="json" id="" cols="20" rows="10" class="form-control tinymce">
                        <?php echo set_value( 'json',$before->json);?></textarea>
                </div>
            </div>
-->
<!--
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Likes</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="like" value='<?php echo set_value(' like ',$before->like);?>'>
                </div>
            </div>
-->
<!--
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Share</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="share" value='<?php echo set_value(' share ',$before->share);?>'>
                </div>
            </div>
-->
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Follow</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="follow" value='<?php echo set_value(' follow ',$before->follow);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Facebook Link</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="facebook" value='<?php echo set_value(' facebook ',$before->facebook);?>'>
                </div>
            </div>
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Facebook Text</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="facebooktext" value='<?php echo set_value(' facebooktext ',$before->facebooktext);?>'>
                            </div>
                        </div>
                        
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Twitter Link</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="twitter" value='<?php echo set_value(' twitter ',$before->twitter);?>'>
                </div>
            </div>
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Twitter Text</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="twittertext" value='<?php echo set_value(' twittertext ',$before->twittertext);?>'>
                            </div>
                        </div>
                        
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Google</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="google" value='<?php echo set_value(' google ',$before->google);?>'>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Status</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "status",$status,set_value( 'status',$before->status),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Order</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ',$before->order);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Views</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="views" value='<?php echo set_value(' views ',$before->views);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Video</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="video" value='<?php echo set_value(' video ',$before->video);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Video2</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="video2" value='<?php echo set_value(' video2 ',$before->video2);?>'>
                </div>
            </div>
            
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Indian Doner</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "indiandoner",$indiandoner,set_value( 'indiandoner',$before->indiandoner),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Foreign Doner</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "foreigndoner",$foreigndoner,set_value( 'foreigndoner',$before->foreigndoner),"class='chzn-select form-control'");?>
                </div>
            </div>
				<div class=" form-group">
                  <span>( 1280 X 500 )</span>
				  <label class="col-sm-2 control-label" for="normal-field">Cover Image</label>
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
                  <span>( 350 X 200 )</span>
				  <label class="col-sm-2 control-label" for="normal-field">Card Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="cardimage" value="<?php echo set_value('cardimage',$before->cardimage);?>">
					<?php if($before->cardimage == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->cardimage; ?>" width="140px" height="140px">
						<?php }
					?>
				  </div>
				</div>
           
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Similar Causes</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "project[]",$project,$selectedproject, "id='select2'class='chzn-select form-control' multiple");?>
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
                    <a href='<?php echo site_url("site/viewproject"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>


<script type="text/javascript">
    
    $('.projectnamelimit').on('keyup', function() {
                            limitText(this, 45)
                        });

//     $('.projecttagline').on('keyup', function() {
//                            limitText(this, 30)
//                        });

                        $('.cardtagline').on('keyup', function() {
                            limitText(this, 81)
                        });

                        function limitText(field, maxChar){
                            var ref = $(field),
                                val = ref.val();
                            if ( val.length >= maxChar ){
                                ref.val(function() {
                                    console.log(val.substr(0, maxChar))
                                    return val.substr(0, maxChar);       
                                });
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