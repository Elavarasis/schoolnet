<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show City</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="<?php echo e(route('cities.index')); ?>"> Back</a>

            </div>

        </div>

    </div>


    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>City Name:</strong>

                <?php echo e($city->city_name); ?>


            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>State:</strong>

                <?php echo e($city->state_id); ?>


            </div>

        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Country:</strong>

                <?php echo e($city->country_id); ?>


            </div>

        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Status:</strong>

                <?php echo e($city->status); ?>


            </div>

        </div>


    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.general', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>