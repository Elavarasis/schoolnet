<?php $__env->startSection('content'); ?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Course Details
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
					<a class="btn-sm btn-primary" href="<?php echo e(url()->previous()); ?>"> Back</a>
				</div>
				<h3 class="box-title">Course Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
				<div class="form-group">
                  <?php if(isset($course->course_image)): ?>
					<img width="100px" class="pull-right" src="<?php echo e(URL::to('/')); ?>/public/images/course/medium--<?php echo e($course->course_image); ?>" alt="" />
				  <?php endif; ?>
                </div>
				
                <div class="form-group">
                  <b><?php echo e(strtoupper($course->course_title)); ?></b>
                </div>
                
                <div class="form-group">
                  <?php echo e($course->course_description); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Duration:</label>
                  <?php echo e($course->course_duration); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Fee:</label>
                  <?php echo e($course->course_fee); ?>

                </div>
				
				<div class="form-group">
                  <label>Status:</label>
					<?php if( $course->course_status == 1 ): ?>
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