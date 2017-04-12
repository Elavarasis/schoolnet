<?php $__env->startSection('content'); ?>
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Students
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
					<a class="btn btn-success" href="<?php echo e(route('tenant.students.create')); ?>">Add New</a>
				</div>
				<h3 class="box-title">List of all Students</h3>
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
					<th>Reg No</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Class</th>
					<th>D.O.B</th>
					<th>Status</th>
					<th width="280px">Action</th>
                </tr>
                </thead>
                <tbody>
					<?php /**/ $i = 0 /**/ ?>
					<?php foreach($students as $key => $student): ?>
					<?php if($school_id == $student->get_student->st_school_id): ?>
					<tr>
						<td><?php echo e(++$i); ?></td>
						<td><?php echo e($student->get_student->st_reg_no); ?></td>
						<td><?php echo e($student->first_name); ?></td>
						<td><?php echo e($student->last_name); ?></td>
						<td><?php echo e($student->email); ?></td>
						<td><?php echo e($student->get_student->st_class); ?></td>
						<td><?php echo e(date("d/m/Y", strtotime($student->get_student->st_dob) )); ?></td>
						<td>
							<?php if($student->status == 1): ?>
								<span class="btn-xs btn-success">Active</a>
							<?php else: ?>
								<span class="btn-xs btn-danger">In-Active</a>
							<?php endif; ?>
						</td>
						<td>
							<!--<a class="btn btn-info" href="<?php echo e(route('tenant.students.show',$student->id)); ?>">Show</a>-->
							<a class="btn btn-primary" href="<?php echo e(route('tenant.students.edit',$student->id)); ?>">Edit</a>
							<?php echo Form::open(['method' => 'DELETE','route' => ['tenant.students.destroy', $student->get_student->st_user_id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']); ?>


							<?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>


							<?php echo Form::close(); ?>

						</td>
					</tr>
					<?php endif; ?>
					<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Reg No</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Class</th>
					<th>D.O.B</th>
					<th>Status</th>
					<th width="280px">Action</th>
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