<?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<?php if($art->article_category): ?>
	<!-- Статья START -->
	<div class="col-md-4 col-lg-3 article_inner">
		<div class="row">
			<div class="col-5 col-md-12 article_inner_image">
				<picture>
					<img src="<?php echo e(Voyager::image($art->image)); ?>" alt="<?php echo e($art->title); ?>">
				</picture>
				<div class="container-fluid">

					<a href="<?php echo e(route('category.show.article', ['categories' => $art->article_category->slug, 'article' => $art->slug])); ?>">
						<div class="row align-items-end">
							<div class="col">
								<span><?php echo e($art->article_category->getTranslatedAttribute('name')); ?></span>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-7 col-md-12">
				<div class="article_inner_info">
					<span><?php echo e(date('d.m.Y', strtotime($art->created_at))); ?></span>
					<p>
						<a href="<?php echo e(route('category.show.article', ['categories' => $art->article_category->slug, 'article' => $art->slug])); ?>">
							<?php echo e(\Illuminate\Support\Str::limit($art->title, 58,'...')); ?>

						</a>
					</p>
					<a href="<?php echo e(route('category.show.article', ['categories' => $art->article_category->slug, 'article' => $art->slug])); ?>" class="more_link"><?php echo app('translator')->get('general.moreDetailed'); ?></a>
				</div>
			</div>
		</div>
	</div>
	<!-- Статья END -->
	<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	<div class="col-md-12 col-lg-12 article_inner text-center">
		<?php echo app('translator')->get('general.noNews'); ?>
	</div>
<?php endif; ?>
<?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/partials/loops/articles.blade.php ENDPATH**/ ?>