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
			  'subTitleLink' => route('pages.get',['page' => $pages['about']->first()->slug]),
			  'subtitle_one' => $pages['about']->first()->title,
			  'childTitle' => $page->seo_title
			], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
		<div class="row zag">
			<div class="col">
				<?php echo e($page->seo_title); ?>

			</div>
		</div>
		<div class="row">
			<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-6 col-lg-3">
				<div class="team_block">
					<picture>
						<img src="<?php echo e(Voyager::image($item->image)); ?>" alt="<?php echo e($item->name); ?>">
					</picture>
					<?php echo e($item->name); ?>

					<span><?php echo e($item->position); ?></span>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/pages/team.blade.php ENDPATH**/ ?>