<?php $__env->startSection('content'); ?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        General Form Elements
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
				<h3 class="box-title">School admin Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
                <div class="form-group">
                  <label for="">First Name:</label>
                  <?php echo e($school_admin->first_name); ?> 
                </div>
				<div class="form-group">
                  <label for="">Last Name:</label>
                  <?php echo e($school_admin->last_name); ?> 
                </div>
				<div class="form-group">
                  <label for="">Email:</label>
                  <?php echo e($school_admin->email); ?> 
                </div>
				<div class="form-group">
                  <label for="">Designation:</label>
                  <?php echo e($school_admin->designation); ?> 
                </div>
				<div class="form-group">
                  <label for="">DOB:</label>
                  <?php echo e($school_admin->dob); ?> 
                </div>
				<div class="form-group">
                  <label for="">Phone mobile:</label>
                  <?php echo e($school_admin->phone); ?> 
                </div>
				<div class="form-group">
                  <label for="">website:</label>
                  <?php echo e($school_admin->website); ?> 
                </div>
               				
				<div class="form-group">
                  <label>Status:</label>
					<?php if( $school_admin->status == 1 ): ?>
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