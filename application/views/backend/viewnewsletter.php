<div class="row" style="padding:1% 0">
    <div class="col-md-9">
        <a class="btn btn-primary pull-right" href="<?php echo site_url("site/createnewsletter"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
    <div class="col-md-1">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportnewsletter'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div>
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Newsletter Details
            </header>
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="email">Email</th>
                            <th data-field="timestamp">Timestamp</th>
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
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.email + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editnewsletter?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs'  onclick=\"return confirm('Are you sure you want to delete?')\"  href='<?php echo site_url('site/deletenewsletter?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>
