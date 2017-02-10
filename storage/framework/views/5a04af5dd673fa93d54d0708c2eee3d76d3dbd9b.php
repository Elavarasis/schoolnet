<?php $__env->startSection('content'); ?>
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage States
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
				<div class="pull-right">
					<select class="state_status" data-country="<?php echo e($country->id); ?>" data-state="0">
						<option value="">Bulk Action</option>
						<option value="1">Active All States</option>
						<option value="0">De-Active All States</option>
					</select>
					<a class="btn-sm btn-primary" href="<?php echo e(route('admin.countries.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">List of States</h3>
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
					<th>State</th>
					<th>Status</th>
					<th>Active</th>
                </tr>
                </thead>
                <tbody>
					<?php /**/ $i = 0 /**/ ?>
					<?php foreach($states as $key => $state): ?>
					<tr>
						<td><?php echo e(++$i); ?></td>
						<td><?php echo e($state->name); ?></td>
						<td>
							<?php if($state->state_status == 1): ?>
								<span class="btn-xs btn-success">Active</a>
							<?php else: ?>
								<span class="btn-xs btn-danger">In-Active</a>
							<?php endif; ?>
						</td>
						<td>
							<select class="state_status" data-country="<?php echo e($country->id); ?>" data-state="<?php echo e($state->id); ?>">
								<option value="1" <?php if($state->state_status ==1 ) { echo 'selected'; } ?>>Active</option>
								<option value="0" <?php if($state->state_status ==0 ) { echo 'selected'; } ?>>In-Active</option>
							</select>
						</td>
					</tr>
					<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>State</th>
					<th>Status</th>
					<th>Active</th>
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