<?php $__env->startSection('content'); ?>
<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4 shadow rounded-4 w-100" style="max-width: 600px;">
        <h2 class="mb-4 text-center">Post a New Job</h2>
        <form method="POST" action="<?php echo e(route('jobs.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill">Submit Job</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\vakha\job-booking-platform\resources\views/jobs/create.blade.php ENDPATH**/ ?>