<?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<?php if($d->article_category): ?>
<div class="col-12 article_inner">
	<div class="row align-items-md-center">
		<div class="col-5 col-md-3 article_inner_image">
			<picture>
				<img src="<?php echo e(Voyager::image($d->image)); ?>" alt="<?php echo e($d->title); ?>">
			</picture>
			<div class="container-fluid">
				<a href="<?php echo e(route('category.show.article', ['categories' => $d->article_category->slug, 'article' => $d->slug])); ?>">
					<div class="row align-items-end">
						<div class="col">
							<span><?php echo e($d->article_category->getTranslatedAttribute('name')); ?></span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-7 col-md-9">
			<div class="article_inner_info">
				<span><?php echo e(date('d.m.Y', strtotime($d->created_at))); ?></span>
				<p>
					<a href="<?php echo e(route('category.show.article', ['categories' => $d->article_category->slug, 'article' => $d->slug])); ?>">
						<?php echo e(\Illuminate\Support\Str::limit($d->title, 120,'...')); ?>

					</a>
				</p>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<div class="col search_query">
	<?php echo app('translator')->get('general.onRequest'); ?> «<b><?php echo e($request_search); ?></b>» <?php echo app('translator')->get('general.nothingWasFound'); ?>
</div>
<?php endif; ?>
<?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/partials/loops/article_search.blade.php ENDPATH**/ ?>