<div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="<?php echo site_url("site/createproject"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Project Details
            </header>
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="name">Name</th>
<!--
                            <th data-field="category">Category</th>
                            <th data-field="ngo">NGO</th>
                            <th data-field="advertiser">Advertiser</th>
-->
<!--                            <th data-field="json">Json</th>-->
                            <th data-field="like">Likes</th>
                            <th data-field="share">Share</th>
<!--
                            <th data-field="follow">Follow</th>
                            <th data-field="facebook">Facebook</th>
                            <th data-field="twitter">Twitter</th>
                            <th data-field="google">Google</th>
-->
<!--                            <th data-field="status">Status</th>-->
                            <th data-field="order">Order</th>
<!--
                            <th data-field="views">Views</th>
                            <th data-field="video">Video</th>
-->
                            <th data-field="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <?php $this->chintantable->createpagination();?>
            </div>
        </section>
        <script>
            function drawtable(resultrow) {
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.like + "</td><td>" + resultrow.share + "</td><td>" + resultrow.order + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editproject?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' href='<?php echo site_url('site/deleteproject?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
<!--
        <script>
            function drawtable(resultrow) {
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.category + "</td><td>" + resultrow.ngo + "</td><td>" + resultrow.advertiser + "</td><td>" + resultrow.json + "</td><td>" + resultrow.like + "</td><td>" + resultrow.share + "</td><td>" + resultrow.follow + "</td><td>" + resultrow.facebook + "</td><td>" + resultrow.twitter + "</td><td>" + resultrow.google + "</td><td>" + resultrow.status + "</td><td>" + resultrow.order + "</td><td>" + resultrow.views + "</td><td>" + resultrow.video + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editproject?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' href='<?php echo site_url('site/deleteproject?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
-->
    </div>
</div>
