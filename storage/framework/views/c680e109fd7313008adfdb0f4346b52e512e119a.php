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
			<?php echo $__env->make('partials.breadcrumbs', [
			  'subtitle' => $page->title
			], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		<div class="row zag">
			<div class="col">
				<?php echo app('translator')->get('general.searchResults'); ?>
			</div>
		</div>
		<div class="row search_result">
			<div class="col-12" id="search_block">
				<form class="needs-validation" id="search" action="<?php echo e(route('search')); ?>/" method="post" novalidate>
					<?php echo csrf_field(); ?>
					<input type="text" id="head_s" name="header_search" placeholder="<?php echo e($request_search); ?>" required="">
					<input type="submit" class="search_button">
					<div class="invalid-feedback">
						<?php echo app('translator')->get('general.pleaseEnterSearchWord'); ?> ...
					</div>
				</form>
			</div>

			<div class="col search_query">
				<?php if($request_search): ?>
					<?php echo app('translator')->get('general.lookingFor'); ?> «<b><?php echo e($request_search); ?></b>»
				<?php endif; ?>
			</div>
			<div id="post">
				<?php echo $__env->make('partials.loops.article_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>

		</div>
		<div class="row text-center">
			<div class="col-12 pagination">
				<?php echo e($articles_paginate->links('partials.paginate')); ?>

			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/pages/search.blade.php ENDPATH**/ ?>