              <table border="1">
                <thead>
                <tr>
					<!--<th>No</th>-->
					<th>Reg No</th>
					<th>Name</th>
					<?php for($i = 1; $i <= 31; $i++): ?>
						<th style="padding:10px;min-width:40px;"><?php echo e($i); ?></th>
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