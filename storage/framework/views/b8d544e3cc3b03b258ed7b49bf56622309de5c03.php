<?php $__env->startSection('content'); ?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        City Details
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
				<div class="pull-right">
					<a class="btn-sm btn-primary" href="<?php echo e(route('admin.cities.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">City Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">City Name:</label>
                  <?php echo e($city->city_name); ?> 
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Country:</label>
                  <?php echo e($city->get_country->country); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">State:</label>
                  <?php echo e($city->get_state->name); ?>

                </div>
				
				<div class="form-group">
                  <label>Status:</label>
					<?php if( $city->status == 1 ): ?>
						<span class="btn-xs btn-success">Active</a>
					<?php else: ?>
						<span class="btn-xs btn-danger">In-Active</a>
					<?php endif; ?>
                </div>
              </div>
              <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.form-general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>