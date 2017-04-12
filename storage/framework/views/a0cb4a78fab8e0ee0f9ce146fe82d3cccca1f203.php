<?php $__env->startSection('content'); ?>
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Events
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
					<a class="btn btn-success" href="<?php echo e(route('admin.events.create')); ?>">Add New</a>
				</div>
				<h3 class="box-title">List of all Events</h3>
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
					<th>School</th>
					<th>Event</th>
					<th>Venue</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
					<?php /**/ $i = 0 /**/ ?>
					<?php foreach($events as $key => $event): ?>
					<tr>
						<td><?php echo e(++$i); ?></td>
						<td><?php echo e($event->schl_name); ?></td>
						<td><?php echo e($event->event_name); ?></td>
						<td><?php echo e($event->event_venue); ?></td>
						<td><?php echo e($event->event_startDate); ?></td>
						<td><?php echo e($event->event_endDate); ?></td>
						<td>
							<?php if(isset($event->event_image)): ?>
								<img width="50px" src="<?php echo e(URL::to('/')); ?>/public/images/event/small--<?php echo e($event->event_image); ?>" alt="" />
							<?php endif; ?>
						</td>
						<td>
							<?php if($event->event_status == 1): ?>
								<span class="btn-xs btn-success">Active</a>
							<?php else: ?>
								<span class="btn-xs btn-danger">In-Active</a>
							<?php endif; ?>
						</td>
						<td>
							<a class="btn btn-primary" href="<?php echo e(route('admin.events.edit',$event->id)); ?>">Edit</a>
							<?php echo Form::open(['method' => 'DELETE','route' => ['admin.events.destroy', $event->id],'style'=>'display:inline','onsubmit' => 'return ConfirmDelete()']); ?>


							<?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>


							<?php echo Form::close(); ?>

						</td>
					</tr>
					<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>					
					<th>School</th>
					<th>Event</th>
					<th>Venue</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Image</th>
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