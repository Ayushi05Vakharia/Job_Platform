
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Create Job</h1>
    <form method="POST" action="<?php echo e(route('jobs.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Post Job</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\vakha\job-booking-platform\resources\views/jobs/create.blade.php ENDPATH**/ ?>