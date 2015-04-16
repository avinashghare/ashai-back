<div class="row" style="padding:1% 0">
    <div class="col-md-9">
        <a class="btn btn-primary pull-right" href="<?php echo site_url("site/createorder"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
    <div class="col-md-2">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportorders'); ?>"target="_blank"><i class="icon-plus"></i>Export to CSV </a></div>
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Order Details
            </header>
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("order List");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
<!--                            <th data-field="name">Name</th>-->
                            <th data-field="username">User</th>
                            <th data-field="email">Email</th>
                            <th data-field="typeofdonation">Type Of Donation</th>
                            <th data-field="amount">Amount</th>
                            <th data-field="projectname">Project</th>
                            <th data-field="ngoname">NGO</th>
                            <th data-field="advertisername">Cooperator</th>
                            <th data-field="referencecode">Reference Code</th>
                            <th data-field="status">Status</th>
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
                if(resultrow.typeofdonation==0)
                {
                resultrow.typeofdonation="By Amount";
                }
                else if(resultrow.typeofdonation==1)
                {
                resultrow.typeofdonation="Facebook Post";
                }
                else if(resultrow.typeofdonation==2)
                {
                resultrow.typeofdonation="Tweet";
                }
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.username + "</td><td>" + resultrow.email + "</td><td>" + resultrow.typeofdonation + "</td><td>" + resultrow.amount + "</td><td>" + resultrow.projectname + "</td><td>" + resultrow.ngoname + "</td><td>" + resultrow.advertisername + "</td><td>" + resultrow.referencecode + "</td><td>" + resultrow.status + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editorder?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs'  onclick=\"return confirm('Are you sure you want to delete?')\"  href='<?php echo site_url('site/deleteorder?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>
