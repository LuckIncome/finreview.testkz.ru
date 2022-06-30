
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
			  'subtitle' => $page->seo_title
			], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		<div class="row zag">
			<div class="col">
				<?php echo e($page->seo_title); ?>

			</div>
		</div>
		<div class="row align-items-center justify-content-between about_info">
			<div class="col-lg-6">
				<picture>
					<img src="<?php echo e(Voyager::image($about->first_image)); ?>" alt="about">
				</picture>
			</div>
			<div class="col-lg-5">
				<?php echo $about->first_content; ?>

			</div>
		</div>
		<div class="row align-items-center justify-content-between about_info">
			<div class="col-lg-5 order-2 order-lg-1">
				<?php echo $about->second_content; ?>

			</div>
			<div class="col-lg-6 order-1 order-lg-2">
				<picture>
					<img src="<?php echo e(Voyager::image($about->second_image)); ?>" alt="about">
				</picture>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/pages/about.blade.php ENDPATH**/ ?>