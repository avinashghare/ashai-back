<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createprojectdatapoint?id=').$this->input->get('id'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Project Image Details 
            </header>
			<table class="table table-striped table-hover  fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>project</th>
					<th>Image</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->id;?></td>
						<td><?php echo $row->name;?></td>
						<td><?php echo $row->projectname;?></td>
						<td><img src="<?php echo base_url('uploads')."/".$row->image; ?>" width="100px" height="auto"></td>
						
						<td>
							<a href="<?php echo site_url('site/editprojectdatapoint?id=').$row->project.'&projectdatapointid='.$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deleteprojectdatapoint?id=').$row->project.'&projectdatapointid='.$row->id; ?>" class="btn btn-danger btn-xs"  onclick="return confirm('Are you sure you want to delete?')" >
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



