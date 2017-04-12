<?php $__env->startSection('content'); ?>
	
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Attendance
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
				<h3 class="box-title">Manage Attendance</h3>
				<div class="filter">
					<?php echo Form::open(array('files'=> true, 'url' => 'tenant/attendances/search', 'method' => 'get')); ?>

						<?php
						$register_number 	= (isset($data['register_number'])) ? $data['register_number'] : '';
						$month 				= (isset($data['month'])) ? $data['month'] : date('m');
						$year 				= (isset($data['year'])) ? $data['year'] : date('Y');
						$class			 	= (isset($data['class'])) ? $data['class'] : '';
						$marker 			= (isset($data['marker'])) ? $data['marker'] : '';						
						?>
						<div class="form-group col-md-2">
						  <label for=" ">Register Number</label>
						  <?php echo Form::text('register_number', $register_number, array('placeholder' => 'Student Register Number','class' => 'form-control')); ?>

						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Month</label>
						  <?php 
						  $months = array(); 
						  for($i=1;$i<13;$i++)
							$months[$i] = date('F',strtotime('01.'.$i.'.2001'));
						  ?>
						  <?php echo Form::select('month', $months, $month, array('class' => 'form-control')); ?>

						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Year</label>
						  <?php 
						  $months = array(); 
						  for($i= date('Y')-5;$i <= date('Y'); $i++)
							$years[$i] = $i;
						  ?>
						  <?php echo Form::select('year', $years, $year, array('class' => 'form-control')); ?>

						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Class/Division</label>
						  <?php echo Form::select('class', [null=>'Select'] + $divisions, $class, array('class' => 'form-control')); ?>

						</div>
						
						<div class="form-group col-md-2">
						  <label for=" ">Attendance</label>
						  <?php echo Form::select('marker', [null=>'Select'] + $markers, $marker, array('class' => 'form-control')); ?>

						</div>
						
						<div class="form-group col-md-1">
							<button type="submit" class="btn btn-primary" style="margin-top:24px;">Search</button>
						</div>
						
						<div class="form-group col-md-1">
							<a class="btn btn-primary" href="<?php echo e(url('tenant/attendances/export')); ?>?<?= $_SERVER['QUERY_STRING'] ?>" style="margin-top:24px;">Export</a>
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
			  
			  <?php if(count($attendances) > 0): ?>
              <table id="example1" class="table table-bordered table-striped" style="table-layout:fixed;width:100%;">
                <thead>
                <tr>
					<!--<th>No</th>-->
					<th>Reg No</th>
					<th>Name</th>
					<?php for($i = 1; $i <= 31; $i++): ?>
						<th style="padding:0px;width:25px;"><?php echo e($i); ?></th>
					<?php endfor; ?>
                </tr>
                </thead>
                <tbody>
					<?php /**/ $count = 0 /**/ ?>
					<?php $user_id = $row_created = 0; $first_row = 1; ?>
					<?php foreach($attendances as $key => $attendance): ?>
						<!-- when get different user id -->
						<?php if($attendance->att_user_id != $user_id): ?>
							<?php $user_id = $attendance->att_user_id; ?>
							<?php if($first_row == 0): ?>
								</tr>
								<?php $row_created = 0; ?>
							<?php endif; ?>
							
							<?php if($row_created == 0): ?>
								<tr>
									<!--<td><?php echo e(++$count); ?></td>-->
									<td><?php echo e($attendance->st_reg_no); ?></td>
									<td><?php echo e($attendance->first_name); ?> <?php echo e($attendance->last_name); ?></td>	
							<?php endif; ?>
							
							<?php
							$start_date		=	$data['year'].'-'.$data['month'].'-1';
							$end_date		=	$data['year'].'-'.$data['month'].'-31';
		
							$query		=	DB::table('users')
											->join('attentances', 'attentances.att_user_id', '=', 'users.id')
											->join('students', 'students.st_user_id', '=', 'users.id')
											->select('attentances.*')
											->where('attentances.att_user_id', $attendance->att_user_id)
											->where('students.st_school_id', $school_id)
											->where('attentances.att_date','>=',$start_date)
											->where('attentances.att_date','<=',$end_date)
											->orderBy('users.first_name', 'asc');
											
											if($data['register_number'])
												$query->where('students.st_reg_no',$data['register_number']);
											if($data['class'])
												$query->where('students.st_class',$data['class']);
											if($data['marker'])
												$query->where('attentances.att_attentance',$data['marker']);
											
							$attendanceData = $query->get();
							?>
							<?php for($i = 1; $i <= 31; $i++ ): ?>
								<?php $cell_data = 0; ?>
								<?php if(count($attendanceData) > 0): ?>
									
									<?php foreach($attendanceData as $attData): ?>
										<?php $date = explode('-',$attData->att_date);?>
										<?php if($date['2'] == $i && $attData->att_attentance != ''): ?>
											<td><?php echo e($attData->att_attentance); ?></td>
											<?php $cell_data = 1; break; ?>
										<?php endif; ?>
									<?php endforeach; ?>
									
									<?php if($cell_data == 0): ?>
										<td>&nbsp;</td>
									<?php endif; ?>
									
								<?php else: ?>
									<td>&nbsp;</td>
								<?php endif; ?>
							<?php endfor; ?>
								
							<?php $row_created = 1; $first_row = 0; ?>					
						<?php endif; ?>
						
					<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
					<!--<th>No</th>-->
					<th>Reg No</th>
					<th>Name</th>
					<?php for($i = 1; $i <= 31; $i++): ?>
						<th><?php echo e($i); ?></th>
					<?php endfor; ?>
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