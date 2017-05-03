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
		</table>