<?php $__env->startSection('content'); ?>
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Widget Settings
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
					<!--<a class="btn btn-success" href="<?php echo e(route('admin.payments.create')); ?>">Add New</a>-->
				</div>
				<h3 class="box-title">List of Widgets</h3>
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
					<th>Text / Script</th>
					<th>Image</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
					<?php /**/ $i = 0 /**/ ?>
					<?php foreach($widgets as $key => $widget): ?>
					<tr>
						<td><?php echo e(++$i); ?></td>
						<td><?php echo e($widget->opt_text); ?></td>
						<td><img width="50px" src="<?php echo e(URL::to('/')); ?>/public/images/option/<?php echo e($widget->opt_image); ?>" alt="" /></td>
						<td>
							<?php if($widget->opt_status == 1): ?>
								<span class="btn-xs btn-success">Active</a>
							<?php else: ?>
								<span class="btn-xs btn-danger">In-Active</a>
							<?php endif; ?>
						</td>
						<td>
							<a class="btn btn-primary" href="<?php echo e(route('admin.widgets.edit',$widget->id)); ?>">Edit</a>
						</td>
					</tr>
					<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Text / Script</th>
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