<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createprojectenquiry?id=').$this->input->get('id'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                project Enquiry Details 
            </header>
			<table class="table table-striped table-hover  fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>project</th>
					<th>Comment</th>
					<th>User</th>
					<th>Email</th>
					<th>Timestamp</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->id;?></td>
						<td><?php echo $row->projectname;?></td>
						<td><?php echo $row->comment;?></td>
						<td><?php echo $row->username;?></td>
						<td><?php echo $row->email;?></td>
						<td><?php echo $row->timestamp;?></td>
						
						<td>
							<a href="<?php echo site_url('site/editprojectenquiry?id=').$row->project.'&projectenquiryid='.$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deleteprojectenquiry?id=').$row->project.'&projectenquiryid='.$row->id; ?>" class="btn btn-danger btn-xs">
								<i class="icon-trash "></i>
							</a> 
							
						</td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
        </div>
	</div>



