		<table border="1">
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
					{{--*/ $count = 0 /*--}}
					@foreach($marks as $key => $mark)
						<tr>
							<td>{{ ++$count }}</td>
							<td>{{ $mark->st_reg_no }}</td>
							<td>{{ $mark->first_name }} {{ $mark->last_name }}</td>
							<td>{{ $mark->st_class }}</td>
							<td>
								<?php $date = explode('-',$mark->mrk_date); ?>
								{{ date('F',strtotime('01.'.$date[1].'.2001')) }} - {{ $date[0] }}
							</td>
							<td>{{ $mark->mrk_exam_name }}</td>
							<td>{{ $mark->mrk_subject }}</td>
							<td>{{ $mark->mrk_total_mark }}</td>
							<td>{{ $mark->mrk_pass_mark }}</td>
							<td>{{ $mark->mrk_mark_got }}</td>
						</tr>
					@endforeach
                </tbody>
		</table>