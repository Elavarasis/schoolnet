<?php $__env->startSection('content'); ?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Leave Details
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
					<a class="btn-sm btn-primary" href="<?php echo e(route('stud.leaves.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">Leave Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Name:</label>
                  <?php echo e($leave->user->first_name); ?> <?php echo e($leave->user->last_name); ?>

                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Student Email:</label>
                  <?php echo e($leave->user->email); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Total Days/Hours:</label>
                  <?php echo e($leave->lv_totaldays); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">From:</label>
                  <?php echo e($leave->lv_start_date); ?> <?php echo e($leave->lv_start_time); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">To:</label>
                  <?php echo e($leave->lv_end_date); ?> <?php echo e($leave->lv_end_time); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Reason for Leave:</label>
                  <?php echo e($leave->lv_reason); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Applicant:</label>
                  <?php echo e($leave->applicant->first_name); ?> <?php echo e($leave->applicant->last_name); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Applicant Email:</label>
                  <?php echo e($leave->applicant->email); ?>

                </div>
				
				<div class="form-group">
                  <label>Status:</label>
					<?php if($leave->lv_status == 0): ?>
						<span class="btn-xs btn-warning">Pending</a>
					<?php elseif($leave->lv_status == 1): ?>
						<span class="btn-xs btn-success">Approved</a>
					<?php else: ?>
						<span class="btn-xs btn-danger">Rejected</a>
					<?php endif; ?>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Staff's Remark:</label>
                  <?php echo e($leave->lv_remarks); ?>

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