<?php $__empty_1 = true; $__currentLoopData = $articles->article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<?php if($a->article_category): ?>
		<!-- Статья START -->
		<div class="col-md-4 col-lg-3 article_inner">
			<div class="row">
				<div class="col-5 col-md-12 article_inner_image">
					<picture>
						<img src="<?php echo e(Voyager::image($a->image)); ?>" alt="<?php echo e($a->getTranslatedAttribute('title')); ?>">
					</picture>
					<div class="container-fluid">
						<a href="<?php echo e(route('category.show.article', ['categories' => $a->article_category->slug, 'article' => $a->slug])); ?>">
							<div class="row align-items-end">
								<div class="col">
									<span><?php echo e($a->article_category->getTranslatedAttribute('name')); ?></span>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-7 col-md-12">
					<div class="article_inner_info">
						<span><?php echo e(date('d.m.Y', strtotime($a->created_at))); ?></span>
						<p>
							<a href="<?php echo e(route('category.show.article', ['categories' => $a->article_category->slug, 'article' => $a->slug])); ?>">
								<?php echo e(\Illuminate\Support\Str::limit($a->getTranslatedAttribute('title'), 58,'...')); ?>

							</a>
						</p>
						<a href="<?php echo e(route('category.show.article', ['categories' => $a->article_category->slug, 'article' => $a->slug])); ?>" class="more_link"><?php echo app('translator')->get('general.moreDetailed'); ?></a>
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
<?php endif; ?><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/partials/loops/articles_tag_show.blade.php ENDPATH**/ ?>