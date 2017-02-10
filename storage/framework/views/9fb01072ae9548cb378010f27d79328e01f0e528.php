<?php $__env->startSection('content'); ?>


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New City</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="<?php echo e(route('cities.index')); ?>"> Back</a>

            </div>

        </div>

    </div>


    <?php if(count($errors) > 0): ?>

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                <?php foreach($errors->all() as $error): ?>

                    <li><?php echo e($error); ?></li>

                <?php endforeach; ?>

            </ul>

        </div>

    <?php endif; ?>

	
	<?php if(isset($city)): ?>
		<?php echo Form::model($city, ['method' => 'PATCH','route' => ['cities.update', $city->id]]); ?>

	<?php else: ?>
		<?php echo Form::open(array('route' => 'cities.store','method'=>'POST')); ?>

	<?php endif; ?>

    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>City Name:</strong>

                <?php echo Form::text('city_name', null, array('placeholder' => 'City Name','class' => 'form-control')); ?>


            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Country:</strong>

                <?php echo Form::text('country_id', null, array('placeholder' => 'Country ID','class' => 'form-control')); ?>


            </div>

        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>State:</strong>

                <?php echo Form::text('state_id', null, array('placeholder' => 'State ID','class' => 'form-control')); ?>


            </div>

        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Status:</strong>

                <?php echo Form::text('status', null, array('placeholder' => 'Status','class' => 'form-control')); ?>


            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>


    </div>

    <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>