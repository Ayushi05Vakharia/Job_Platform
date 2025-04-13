<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Edit Job</h2>
    <form action="<?php echo e(route('jobs.update', $job->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" id="title" name="title" value="<?php echo e(old('title', $job->title)); ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control"><?php echo e(old('description', $job->description)); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\vakha\job-booking-platform\resources\views/jobs/edit.blade.php ENDPATH**/ ?>