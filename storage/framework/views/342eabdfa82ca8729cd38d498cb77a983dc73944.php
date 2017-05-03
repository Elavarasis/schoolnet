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
					<a class="btn-sm btn-primary" href="<?php echo e(route('tenant.leaves.index')); ?>"> Back</a>
				</div>
				<h3 class="box-title">Leave Details</h3>
            </div>
            <!-- /.box-header -->

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1" style="width:20%">Student Name:</label>
                  <?php echo e($leave->first_name); ?> <?php echo e($leave->last_name); ?>

                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1" style="width:20%">Student Email:</label>
                  <?php echo e($leave->email); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1" style="width:20%">Total Days/Hours:</label>
                  <?php echo e($leave->lv_totaldays); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1" style="width:20%">From:</label>
                  <?php echo e($leave->lv_start_date); ?> <?php echo e($leave->lv_start_time); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1" style="width:20%">To:</label>
                  <?php echo e($leave->lv_end_date); ?> <?php echo e($leave->lv_end_time); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1" style="width:20%">Reason for Leave:</label>
                  <?php echo e($leave->lv_reason); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1" style="width:20%">Applicant:</label>
                  <?php echo e($leave->apl_first_name); ?> <?php echo e($leave->apl_last_name); ?>

                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1" style="width:20%">Applicant Email:</label>
                  <?php echo e($leave->apl_email); ?>

                </div>
				
				<?php echo Form::model($leave, ['files'=> true, 'method' => 'post', 'url' => "tenant/leaves/update_status/"]); ?>

				
				<?php echo Form::hidden('leave_id', (isset($leave->id)) ? $leave->id : 0); ?>

				<div class="form-group">
                  <label>Status:</label>
					<?php $status = array('Pending','Approved','Rejected'); ?>
					<?php echo Form::select('lv_status', $status, null, array('class' => 'form-control', 'id' => 'city_id')); ?>

                </div>
				
				<div class="form-group">
                  <label for=" ">Staff's Remark</label>
				  <?php echo Form::textarea('lv_remarks',null,['placeholder' => 'Remarks','class'=>'form-control', 'rows' => 5]); ?>

                </div>
				
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				
				<?php echo Form::close(); ?>

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