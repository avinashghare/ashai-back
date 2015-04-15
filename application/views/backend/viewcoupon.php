<div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="<?php echo site_url("site/createcoupon"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Coupon Details
            </header>
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="name">Offer</th>
                            <th data-field="companyname">Company Name</th>
                            <th data-field="couponcode">Coupon Code</th>
                            <th data-field="expirydate">Expiry Date</th>
<!--                            <th data-field="order">Order</th>-->
<!--                            <th data-field="json">Json</th>-->
<!--                            <th data-field="text">Text</th>-->
<!--                            <th data-field="description">Description</th>-->
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
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.companyname + "</td><td>" + resultrow.couponcode + "</td><td>" + resultrow.expirydate + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editcoupon?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs'  onclick=\"return confirm('Are you sure you want to delete?')\"  href='<?php echo site_url('site/deletecoupon?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>
