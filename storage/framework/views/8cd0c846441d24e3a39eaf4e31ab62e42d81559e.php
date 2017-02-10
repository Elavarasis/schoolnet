<?php $__env->startSection('content'); ?>
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Countries
        <small>Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
				<h3 class="box-title">List of all Countries</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			  <?php if($message = Session::get('success')): ?>
				<div class="alert alert-success">
					<p><?php echo e($message); ?></p>
				</div>
			  <?php endif; ?>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Country</th>
					<th>Status</th>
					<th>Active</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
					<?php /**/ $i = 0 /**/ ?>
					<?php foreach($countries as $key => $country): ?>
					<tr>
						<td><?php echo e(++$i); ?></td>
						<td><?php echo e($country->country); ?></td>
						<td><?php echo e($country->continent); ?></td>
						<td><?php echo e($country->phone_prefix); ?></td>
						<td>
							<?php if($country->country_status == 1): ?>
								<span class="btn-xs btn-success">Active</a>
							<?php else: ?>
								<span class="btn-xs btn-danger">In-Active</a>
							<?php endif; ?>
						</td>
						<td>
							<select class="country_status" data-country="<?php echo e($country->id); ?>">
								<option value="1" <?php if($country->country_status ==1 ) { echo 'selected'; } ?>>Active</option>
								<option value="0" <?php if($country->country_status ==0 ) { echo 'selected'; } ?>>In-Active</option>
							</select>
						</td>
						<td>
							<a class="btn btn-primary" href="<?php echo e(url('admin/countries/states/'.$country->id.'/')); ?>">Edit</a>
						</td>
					</tr>
					<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Country</th>
					<th>Status</th>
					<th>Active</th>
					<th>Action</th>
                </tr>
                </tfoot>
              </table>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<script>
  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete?");
  if (x)
    return true;
  else
    return false;
  }
</script>
<?php echo $__env->make('layouts.admin.datatable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>