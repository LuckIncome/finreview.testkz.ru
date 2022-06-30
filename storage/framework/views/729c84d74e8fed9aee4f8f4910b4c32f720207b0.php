
<?php $__env->startSection('page_title', __('general.pageNotFound')); ?>
<?php $__env->startSection('seo_title',  __('general.pageNotFound')); ?>
<?php $__env->startSection('meta_keywords', __('general.pageNotFound')); ?>
<?php $__env->startSection('meta_description',  __('general.pageNotFound')); ?>
<?php $__env->startSection('image',env('APP_URL').'/images/og.jpg'); ?>
<?php $__env->startSection('url',url()->current()); ?>
<?php $__env->startSection('page_class','page'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead"><?php echo app('translator')->get('general.dearUser'); ?></div>
                <div class="mb-4 lead"><?php echo app('translator')->get('general.notFoundTitle'); ?></div>
                <div class="mb-4 lead"><?php echo app('translator')->get('general.notFoundText'); ?></div>
                <a href="/" class="btn btn-link"><?php echo app('translator')->get('general.backToHome'); ?></a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/errors/404.blade.php ENDPATH**/ ?>