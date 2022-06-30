<?php $__env->startSection('page_title',(strlen($page->title) > 1 ? $page->title : '')); ?>
<?php $__env->startSection('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : '')); ?>
<?php $__env->startSection('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : '')); ?>
<?php $__env->startSection('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : '')); ?>
<?php $__env->startSection('image',$page->thumbic); ?>
<?php $__env->startSection('url',url()->current()); ?>
<?php $__env->startSection('page_class','page'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col bread">
                <div class="col bread">
                    <ul>
                        <li><a href="/"><?php echo app('translator')->get('general.home'); ?></a></li>
                        <li><?php echo app('translator')->get('general.researches'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row zag">
            <div class="col">
                <?php echo e($page->title); ?>

            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-lg-9 children_pages">
                <ul>
                    <li><a href="<?php echo e(route('category', [])); ?>"><?php echo app('translator')->get('general.all'); ?></a></li>
                    <?php $__currentLoopData = $articleCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($cat->slug != 'opinions' && $cat->slug != 'ratings'): ?>
                        <li>
                            <a href="<?php echo e(route('category.show', ['categories' => $cat->slug])); ?>">
                                <?php echo e($cat->name); ?>

                            </a>
                        </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-lg-3 text-center text-lg-end sort">
                <?php echo $__env->make('partials.sorting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="row justify-content-center" id="post">
            <?php echo $__env->make('partials.loops.articles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="row text-center">
            <div class="col-12">
                <a class="more_download" id="load-more"><?php echo app('translator')->get('general.downloadMore'); ?></a>
            </div>
            <div class="col-12 pagination">
                <?php echo e($articles_paginate->links('partials.paginate')); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/pages/researches.blade.php ENDPATH**/ ?>