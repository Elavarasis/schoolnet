<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>All Cities</h2>
            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="<?php echo e(route('cities.create')); ?>">Create New Item</a>

            </div>

        </div>

    </div>


    <?php if($message = Session::get('success')): ?>

        <div class="alert alert-success">

            <p><?php echo e($message); ?></p>

        </div>

    <?php endif; ?>


    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>City</th>

            <th>State</th>
			
			<th>Country</th>
			
			<th>Status</th>

            <th width="280px">Action</th>

        </tr>

    <?php foreach($cities as $key => $city): ?>

    <tr>

        <td><?php echo e(++$i); ?></td>

        <td><?php echo e($city->city_name); ?></td>

        <td><?php echo e($city->state_id); ?></td>
		
		<td><?php echo e($city->country_id); ?></td>
		
		<td>
			<?php if($city->status == 1): ?>
				<span class="btn btn-success">Active</a>
			<?php else: ?>
				<span class="btn btn-danger">In-Active</a>
			<?php endif; ?>
		</td>

        <td>

            <a class="btn btn-info" href="<?php echo e(route('cities.show',$city->id)); ?>">Show</a>

            <a class="btn btn-primary" href="<?php echo e(route('cities.edit',$city->id)); ?>">Edit</a>

            <?php echo Form::open(['method' => 'DELETE','route' => ['cities.destroy', $city->id],'style'=>'display:inline']); ?>


            <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>


            <?php echo Form::close(); ?>


        </td>

    </tr>

    <?php endforeach; ?>

    </table>


    <?php echo $cities->render(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>