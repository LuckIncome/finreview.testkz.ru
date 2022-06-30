<?php $__env->startSection('page_title',(strlen($tag->name) > 1 ? $tag->name : '')); ?>
<?php $__env->startSection('seo_title', (strlen($tag->seo_title) > 1 ? $tag->seo_title : '')); ?>
<?php $__env->startSection('meta_keywords',(strlen($tag->meta_keywords) > 1 ? $tag->meta_keywords : '')); ?>
<?php $__env->startSection('meta_description', (strlen($tag->meta_description) > 1 ? $tag->meta_description : '')); ?>
<?php $__env->startSection('image',''); ?>
<?php $__env->startSection('url',url()->current()); ?>
<?php $__env->startSection('page_class','page'); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col bread">
			    <ul>
					<li><a href="/"><?php echo app('translator')->get('general.home'); ?></a></li>
					<li><a href="<?php echo e(route('tag', [])); ?>"><?php echo app('translator')->get('general.allTags'); ?></a></li>
					<li><?php echo e($tag->name); ?></li>
				</ul>
			</div>
		</div>
		<div class="row zag">
			<div class="col">
				<?php echo e($tag->name); ?>

			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-9 align-self-center">
				<?php $__currentLoopData = $allTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<a href="<?php echo e(route('tag.show', ['tags' => $t->slug])); ?>" class="btn btn-success mt-2 mb-2">#<?php echo e($t->name); ?>( <?php echo e($t->article_count); ?> )</a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>

		<div class="row justify-content-center mt-5" id="post">
			<?php echo $__env->make('partials.loops.articles_tag_show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>

		<div class="row text-center" id="pag">
			<div class="col-12 pagination">
				<?php echo e($articles_paginate->links('partials.paginate')); ?>

			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/pages/tag/show.blade.php ENDPATH**/ ?>