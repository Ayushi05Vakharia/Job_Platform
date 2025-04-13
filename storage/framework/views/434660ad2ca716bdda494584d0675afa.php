<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-center align-items-center p-5"
        style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background: linear-gradient(to right,rgb(214, 212, 216),rgb(175, 181, 193));">
        <div class="card shadow-lg border-0 rounded-4 w-100"
            style="max-width: 550px;width: 50%; background-color: #ffffffee; padding: 30px;">

            <div class="d-flex mb-4" style="display: flex; justify-content:space-between">
                <h2 class="mb-4 text-center text-dark fw-bold" style="text-align: center;">Edit Job</h2>
                <a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-sm btn-outline-primary rounded-pill"
                    style="background-color:rgba(164, 177, 228, 0.93); padding: 5px; height: fit-content; margin-top: auto;">
                    Back to Job List
                </a>
            </div>
            <form action="<?php echo e(route('jobs.update', $job->id)); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-group mb-2" style="display: flex; justify-content: space-between;">
                    <label class="fw-semibold text-gray-800"><i class="bi bi-envelope-at-fill me-2"></i>Job Title</label>
                    <input type="text" name="title" class="form-control rounded-pill px-4 py-2"
                        value="<?php echo e(old('title', $job->title)); ?>" required>

                </div>
                <div class="form-group mb-2" style="display: flex; justify-content: space-between;">
                    <label class="fw-semibold text-gray-800"><i class="bi bi-envelope-at-fill me-2"></i>Description</label>
                    <textarea id="description" name="description"
                        class="form-control rounded-pill px-4 py-2"><?php echo e(old('description', $job->description)); ?></textarea>

                </div>


                <button type="submit" class="btn btn-primary w-full rounded-pill py-2 mt-4 text-blue-500 fw-bold"
                    style="background-color:rgba(164, 177, 228, 0.93);">Update Job</button>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\vakha\job-booking-platform\resources\views/jobs/edit.blade.php ENDPATH**/ ?>