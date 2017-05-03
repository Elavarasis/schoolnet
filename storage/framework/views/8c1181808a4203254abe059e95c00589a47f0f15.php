<?php $__env->startSection('content'); ?>
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Marks
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
				<h3 class="box-title">Manage Marks</h3>
				<div class="filter">
					<?php echo Form::open(array('files'=> true, 'url' => 'tenant/marks/search', 'method' => 'get')); ?>

						<?php
						$register_number 	= (isset($data['register_number'])) ? $data['register_number'] : '';
						$month 				= (isset($data['month'])) ? $data['month'] : '';
						$year 				= (isset($data['year'])) ? $data['year'] : '';
						$class			 	= (isset($data['class'])) ? $data['class'] : '';
						$exam_name 			= (isset($data['exam_name'])) ? $data['exam_name'] : '';						
						?>
						<div class="form-group col-md-2">
						  <label for=" ">Register Number</label>
						  <datalist id="reg_numbers">
							<?php if(count($students) > 0): ?>
								<?php foreach($students as $key => $student): ?>
									<option value="<?php echo e($student->st_reg_no); ?>">
								<?php endforeach; ?>;							
							<?php endif; ?>
						  </datalist>
  
						  <?php echo Form::text('register_number', $register_number, array('placeholder' => 'Student Register Number','class' => 'form-control', 'list' => 'reg_numbers')); ?>

						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Month</label>
						  <?php 
						  $months = array(); 
						  for($i=1;$i<13;$i++)
							$months[$i] = date('F',strtotime('01.'.$i.'.2001'));
						  ?>
						  <?php echo Form::select('month', [null=>'Select'] + $months, $month, array('class' => 'form-control')); ?>

						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Year</label>
						  <?php 
						  $months = array(); 
						  for($i= date('Y')-5;$i <= date('Y'); $i++)
							$years[$i] = $i;
						  ?>
						  <?php echo Form::select('year', [null=>'Select'] + $years, $year, array('class' => 'form-control')); ?>

						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Class/Division</label>
						  <?php echo Form::select('class', [null=>'Select'] + $divisions, $class, array('class' => 'form-control')); ?>

						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Exam Name</label>
						  <?php $exam_name_array = array(); ?>
						  <?php if(count($exam_names) > 0): ?>
								<?php foreach($exam_names as $key => $exam): ?>
									<?php $exam_name_array[$exam->mrk_exam_name] = $exam->mrk_exam_name; ?>
								<?php endforeach; ?>;							
						  <?php endif; ?>
						  <?php echo Form::select('exam_name', [null=>'Select'] + $exam_name_array, $exam_name, array('class' => 'form-control')); ?>

						</div>
						
						<div class="form-group col-md-1">
							<button type="submit" class="btn btn-primary" style="margin-top:24px;">Search</button>
						</div>
						
						<div class="form-group col-md-1">
							<a class="btn btn-primary" href="<?php echo e(url('tenant/marks/export')); ?>?<?= $_SERVER['QUERY_STRING'] ?>" style="margin-top:24px;">Export</a>
						</div>
					
					<?php echo Form::close(); ?>

				</div>
				
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
			  
			  <?php if(count($marks) > 0): ?>
              <table id="example1" class="table table-bordered table-striped" style="table-layout:fixed;width:100%;">
                <thead>
                <tr>
					<th>No</th>
					<th>Reg No</th>
					<th>Name</th>
					<th>Class</th>
					<th>Month & Year</th>
					<th>Exam</th>
					<th>Subject</th>
					<th>Total Mark</th>
					<th>Pass Mark</th>
					<th>Mark Got</th>
                </tr>
                </thead>
                <tbody>
					<?php /**/ $count = 0 /**/ ?>
					<?php foreach($marks as $key => $mark): ?>
						<tr>
							<td><?php echo e(++$count); ?></td>
							<td><?php echo e($mark->st_reg_no); ?></td>
							<td><?php echo e($mark->first_name); ?> <?php echo e($mark->last_name); ?></td>
							<td><?php echo e($mark->st_class); ?></td>
							<td>
								<?php $date = explode('-',$mark->mrk_date); ?>
								<?php echo e(date('F',strtotime('01.'.$date[1].'.2001'))); ?> - <?php echo e($date[0]); ?>

							</td>
							<td><?php echo e($mark->mrk_exam_name); ?></td>
							<td><?php echo e($mark->mrk_subject); ?></td>
							<td><?php echo e($mark->mrk_total_mark); ?></td>
							<td><?php echo e($mark->mrk_pass_mark); ?></td>
							<td><?php echo e($mark->mrk_mark_got); ?></td>
						</tr>
					<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
					<th>No</th>
					<th>Reg No</th>
					<th>Name</th>
					<th>Class</th>
					<th>Month & Year</th>
					<th>Exam</th>
					<th>Subject</th>
					<th>Total Mark</th>
					<th>Pass Mark</th>
					<th>Mark Got</th>
                </tr>
                </tfoot>
              </table>
			  <?php endif; ?>
			  
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