<?php $__env->startSection('content'); ?>

   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Marks
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
					<a class="btn-sm btn-primary" href="<?php echo e(route('tenant.marks.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">
					Import Student Marks
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
			
            <!-- form start -->
			<?php echo Form::open(array('files'=> true, 'url' => 'tenant/marks/import_now/', 'method' => 'post')); ?>

              <div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for=" ">Exam Name</label>
						  <?php echo Form::text('exam_name', null, array('placeholder' => 'Name of the Exam','class' => 'form-control')); ?>

						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
						  <label for=" ">Month</label>
						  <?php 
						  $months = array(); 
						  for($i=1;$i<13;$i++)
							$months[$i] = date('F',strtotime('01.'.$i.'.2001'));
						  ?>
						  <?php echo Form::select('month', $months, date('m'), array('class' => 'form-control')); ?>

						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
						  <label for=" ">Year</label>
						  <?php 
						  $months = array(); 
						  for($i= date('Y')-5;$i <= date('Y'); $i++)
							$years[$i] = $i;
						  ?>
						  <?php echo Form::select('year', $years, date('Y'), array('class' => 'form-control')); ?>

						</div>
					</div>
				</div>
				
                <div class="form-group">
                  <label for=" ">Import</label>
				  <?php echo Form::file('import_file', ['class' => 'form-control']); ?>

                </div>
              </div>

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
<?php echo $__env->make('layouts.admin.form-general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>