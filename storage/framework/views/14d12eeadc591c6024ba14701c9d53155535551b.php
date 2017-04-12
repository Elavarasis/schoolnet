<?php $__env->startSection('content'); ?>

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Course
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add New Course</li>
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
				<h3 class="box-title">
					<?php if(isset($course)): ?>
						Edit Course
					<?php else: ?>
						Add New Course
					<?php endif; ?>
				</h3>
            </div>
            <!-- /.box-header -->
			
			<?php if(count($errors) > 0): ?>

				<div class="alert alert-danger">

					<strong>Whoops!</strong> There were some problems with your input.<br><br>

					<ul>

						<?php foreach($errors->all() as $error): ?>

							<li><?php echo e($error); ?></li>

						<?php endforeach; ?>

					</ul>

				</div>

			<?php endif; ?>
			
            <!-- form start -->
            <?php if(isset($course)): ?>
				<?php echo Form::model($course, ['files'=> true, 'method' => 'PATCH','route' => ['tenant.courses.update', $course->id]]); ?>

			<?php else: ?>
				<?php echo Form::open(array('files'=> true, 'route' => 'tenant.courses.store','method'=>'POST')); ?>

			<?php endif; ?>
              <div class="box-body">
                <div class="form-group">
                  <label for=" ">Title <span>*</span></label>
                  <?php echo Form::text('course_title', null, array('placeholder' => 'Course Name','class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Description</label>
				  <?php echo Form::textarea('course_description',null,['placeholder' => 'Course Description','class'=>'form-control', 'rows' => 6]); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Duration</label>
                  <?php echo Form::text('course_duration', null, array('placeholder' => 'Duration','class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Course Fee</label>
                  <?php echo Form::text('course_fee', null, array('placeholder' => 'Course Fee','class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Parent</label>
                  <?php echo Form::select('course_parent', $courses, null, array('class' => 'form-control')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Image</label>
				  <?php if(isset($course)): ?>
					<img width="100px" src="<?php echo e(URL::to('/')); ?>/public/images/course/medium--<?php echo e($course->course_image); ?>" alt="" />
				  <?php endif; ?>
				  <?php echo Form::file('course_image', ['class' => 'form-control']); ?>

                </div>
				
				<div class="checkbox">
                  <label style="width:100px;">Status</label>
                  <?php echo Form::hidden('course_status', '0'); ?> <!-- checkbox will pass this value when it's not checked -->
				  <?php echo Form::checkbox('course_status', '1', null, ['class' => 'form-control-block']); ?>

                </div>
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            <?php echo Form::close(); ?>

          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.tenant.form-general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>