              <table border="1">
                <thead>
                <tr>
					<!--<th>No</th>-->
					<th>Reg No</th>
					<th>Name</th>
					@for($i = 1; $i <= 31; $i++)
						<th style="padding:10px;min-width:40px;">{{ $i }}</th>
					@endfor
                </tr>
                </thead>
                <tbody>
					{{--*/ $count = 0 /*--}}
					<?php $user_id = $row_created = 0; $first_row = 1; ?>
					@foreach($attendances as $key => $attendance)
						<!-- when get different user id -->
						@if($attendance->att_user_id != $user_id)
							<?php $user_id = $attendance->att_user_id; ?>
							@if($first_row == 0)
								</tr>
								<?php $row_created = 0; ?>
							@endif
							
							@if($row_created == 0)
								<tr>
									<!--<td>{{ ++$count }}</td>-->
									<td>{{ $attendance->st_reg_no }}</td>
									<td>{{ $attendance->first_name }} {{ $attendance->last_name }}</td>	
							@endif
							
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
							@for($i = 1; $i <= 31; $i++ )
								<?php $cell_data = 0; ?>
								@if(count($attendanceData) > 0)
									
									@foreach($attendanceData as $attData)
										<?php $date = explode('-',$attData->att_date);?>
										@if($date['2'] == $i && $attData->att_attentance != '')
											<td>{{ $attData->att_attentance }}</td>
											<?php $cell_data = 1; break; ?>
										@endif
									@endforeach
									
									@if($cell_data == 0)
										<td>&nbsp;</td>
									@endif
									
								@else
									<td>&nbsp;</td>
								@endif
							@endfor
								
							<?php $row_created = 1; $first_row = 0; ?>					
						@endif
						
					@endforeach
                </tbody>
                <tfoot>
                <tr>
					<!--<th>No</th>-->
					<th>Reg No</th>
					<th>Name</th>
					@for($i = 1; $i <= 31; $i++)
						<th>{{ $i }}</th>
					@endfor
                </tr>
                </tfoot>
              </table>