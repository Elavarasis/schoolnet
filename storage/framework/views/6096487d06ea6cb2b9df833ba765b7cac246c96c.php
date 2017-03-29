<?php $__env->startSection('content'); ?>
	
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Leaves
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
				<h3 class="box-title">List of all Leaves</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			  <?php if($message = Session::get('success')): ?>
				<div class="alert alert-success">
					<p><?php echo e($message); ?></p>
				</div>
			  <?php endif; ?>
			  <?php if($message = Session::get('error')): ?>
				<div class="alert alert-danger">
					<p><?php echo e($message); ?></p>
				</div>
			  <?php endif; ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Student ID</th>
					<th>Name</th>
					<th>Total Days/Hours</th>
					<th>From (d-m-Y)</th>
					<th>To (d-m-Y)</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
					<?php /**/ $i = 0 /**/ ?>
					<?php foreach($leaves as $key => $leave): ?>
					<tr>
						<td><?php echo e(++$i); ?></td>
						<td><?php echo e($leave->lv_user_id); ?></td>
						<td><?php echo e($leave->first_name); ?> <?php echo e($leave->last_name); ?></td>
						<td><?php echo e($leave->lv_totaldays); ?></td>
						<td><?php echo e(date('d-m-Y',strtotime($leave->lv_start_date))); ?> <?php echo e($leave->lv_start_time); ?></td>
						<td><?php echo e(date('d-m-Y',strtotime($leave->lv_end_date))); ?> <?php echo e($leave->lv_end_time); ?></td>
						<td>
							<?php if($leave->lv_status == 0): ?>
								<span class="btn-xs btn-warning">Pending</a>
							<?php elseif($leave->lv_status == 1): ?>
								<span class="btn-xs btn-success">Approved</a>
							<?php else: ?>
								<span class="btn-xs btn-danger">Rejected</a>
							<?php endif; ?>
						</td>
						<td>
							<a class="btn btn-info" href="<?php echo e(route('tenant.leaves.show',$leave->id)); ?>">Show</a>
							
							<?php echo Form::open(['method' => 'DELETE','route' => ['tenant.leaves.destroy', $leave->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']); ?>


							<?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>


							<?php echo Form::close(); ?>

						</td>
					</tr>
					<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Student ID</th>
					<th>Name</th>
					<th>Total Days/Hours</th>
					<th>From (d-m-Y)</th>
					<th>To (d-m-Y)</th>
					<th>Status</th>
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