<?php $__env->startSection('page_title',(strlen($page->title) > 1 ? $page->title : '')); ?>
<?php $__env->startSection('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : '')); ?>
<?php $__env->startSection('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : '')); ?>
<?php $__env->startSection('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : '')); ?>
<?php $__env->startSection('image',$page->thumbic); ?>
<?php $__env->startSection('url',url()->current()); ?>
<?php $__env->startSection('page_class','page'); ?>
<?php $__env->startSection('content'); ?>

<!-- Блок Исследования START -->
<div class="container-fluid">
	<div class="container">
		<div class="row zag">
			<div class="col">
				<?php echo e($research->title); ?>

			</div>
		</div>
		<div class="row">
			<!-- Основная новость блока START -->
			<div class="col-lg-6 big_article">
				<div class="row">
					<div class="col-md-8 col-lg-12 big_article_image">
						<picture>
							<img src="<?php echo e(Voyager::image($research_one->image)); ?>" alt="<?php echo e($research_one->title); ?>">
						</picture>
						<div class="container-fluid">
							<a href="<?php echo e(route('category.show.article', ['categories' => $research_one->cat->slug, 'article' => $research_one->slug])); ?>">
								<div class="row align-items-end">
									<div class="col">
										<span><?php echo e($research_one->cat->getTranslatedAttribute('name')); ?></span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4 col-lg-12 big_article_text">
						<span><?php echo e(date('d.m.Y', strtotime($research_one->created_at))); ?></span>
						<a href="<?php echo e(route('category.show.article', ['categories' => $research_one->cat->slug, 'article' => $research_one->slug])); ?>">
							<?php echo e(\Illuminate\Support\Str::limit($research_one->title, 105,'...')); ?>

						</a>
						<p></p>
						<p><?php echo e(\Illuminate\Support\Str::limit($research_one->excerpt, 105,'...')); ?></p>
					</div>
				</div>
			</div>
			<!-- Основная новость блока END -->


			<!-- Мини новости блока START -->
			<div class="col-lg-6">
				<div class="row">
					<?php $__currentLoopData = $researches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rese): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<!-- Мини новость START -->
						<div class="col-md-4 col-lg-12 mini_article">
							<div class="row">
								<div class="col-5 col-md-12 col-lg-6 mini_article_image">
									<picture>
										<img src="<?php echo e(Voyager::image($rese->image)); ?>" alt="<?php echo e($rese->title); ?>">
									</picture>
									<div class="container-fluid">
										<a href="<?php echo e(route('category.show.article', ['categories' => $rese->cat->slug, 'article' => $rese->slug])); ?>">
											<div class="row align-items-end">
												<div class="col">
													<span><?php echo e($rese->cat->getTranslatedAttribute('name')); ?></span>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-7 col-md-12 col-lg-6 mini_article_text">
									<span><?php echo e(date('d.m.Y', strtotime($rese->created_at))); ?></span>
									<a href="<?php echo e(route('category.show.article', ['categories' => $rese->cat->slug, 'article' => $rese->slug])); ?>">
										<?php echo e(\Illuminate\Support\Str::limit($rese->title, 80,'...')); ?>

									</a>
									<p></p>
									<p><?php echo e(\Illuminate\Support\Str::limit($rese->excerpt, 55,'...')); ?></p>
								</div>
							</div>
						</div>
						<!-- Мини новость END -->
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<div class="col-12 text-start text-md-center text-lg-start">
						<a href="<?php echo e(route('researches', [])); ?>" class="more_link"><?php echo app('translator')->get('general.allStudies'); ?></a>
					</div>

				</div>
			</div>
			<!-- Мини новости блока END -->

		</div>
	</div>
</div>
<!-- Блок Исследования END -->

<!-- Блок Рейтинги START -->
<div class="container-fluid ratings_block">
	<div class="container">
		<div class="row zag">
			<div class="col">
				<?php echo e($rating->name); ?>

			</div>
		</div>
		<div class="row">
			<?php $__currentLoopData = $rating_one->article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<!-- Основная новость блока START -->
			<div class="col-lg-6 big_article">
				<div class="row">
					<div class="col-md-8 col-lg-12 big_article_image">
						<picture>
							<img src="<?php echo e(Voyager::image($r_one->image)); ?>" alt="<?php echo e($r_one->getTranslatedAttribute('title')); ?>">
						</picture>
						<div class="container-fluid">
							<a href="<?php echo e(route('category.show.article', ['categories' => $rating_one->slug, 'article' => $r_one->slug])); ?>">
								<div class="row align-items-end">
									<div class="col">
										<br>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4 col-lg-12 big_article_text">
						<span><?php echo e(date('d.m.Y', strtotime($r_one->created_at))); ?></span>
						<a href="<?php echo e(route('category.show.article', ['categories' => $rating_one->slug, 'article' => $r_one->slug])); ?>">
							<?php echo e(\Illuminate\Support\Str::limit($r_one->getTranslatedAttribute('title'), 105,'...')); ?>

						</a>
						<p></p>
						<p><?php echo e(\Illuminate\Support\Str::limit($r_one->getTranslatedAttribute('excerpt'), 105,'...')); ?></p>
					</div>
				</div>
			</div>
			<!-- Основная новость блока END -->
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<!-- Мини новости блока START -->
			<div class="col-lg-6">
				<div class="row">
					<?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php $__currentLoopData = $rat->article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<!-- Мини новость START -->
						<div class="col-md-4 col-lg-12 mini_article">
							<div class="row">
								<div class="col-5 col-md-12 col-lg-6 mini_article_image">
									<picture>
										<img src="<?php echo e(Voyager::image($r->image)); ?>" alt="<?php echo e($r->getTranslatedAttribute('title')); ?>">
									</picture>
									<div class="container-fluid">
										<a href="<?php echo e(route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])); ?>">
											<div class="row align-items-end">
												<div class="col">
													<br>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-7 col-md-12 col-lg-6 mini_article_text">
									<span><?php echo e(date('d.m.Y', strtotime($r->created_at))); ?></span>
									<a href="<?php echo e(route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])); ?>">
										<?php echo e(\Illuminate\Support\Str::limit($r->getTranslatedAttribute('title'), 80,'...')); ?>

									</a>
									<p></p>
									<p><?php echo e(\Illuminate\Support\Str::limit($r->getTranslatedAttribute('excerpt'), 40,'...')); ?></p>
								</div>
							</div>
						</div>
						<!-- Мини новость END -->
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<div class="col-12 text-start text-md-center text-lg-start">
						<a href="<?php echo e(route('category.show', ['categories' => $rating->slug])); ?>" class="more_link"><?php echo app('translator')->get('general.allRatings'); ?></a>
					</div>

				</div>
			</div>
			<!-- Мини новости блока END -->

		</div>
	</div>
</div>
<!-- Блок Рейтинги END -->

<div class="container-fluid block_main_3">
	<div class="container">
		<div class="row">

			<!-- Карикатура дня START -->
			<div class="col-md-9 col-lg-6 caricatura order-1">
				<div class="row zag">
					<div class="col">
						<?php echo app('translator')->get('general.caricatureDay'); ?>
					</div>
				</div>
				<div class="row">
					<div class="col">
					    <a href="/cartoons">
    						<picture>
    							<img src="<?php echo e(Voyager::image($cartoon->Thumbic)); ?>" alt="<?php echo e($cartoon->name); ?>">
    						</picture>
						</a>
					</div>
				</div>
			</div>
			<!-- Карикатура дня END -->

			<!-- Выбор редакции / Популярное START -->
			<div class="col-lg-4 order-lg-2 order-3">
				<div class="row">
					<div class="col">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="redak-tab" data-bs-toggle="tab" data-bs-target="#redak" type="button" role="tab" aria-controls="redak" aria-selected="true"><?php echo app('translator')->get('general.editorsChoice'); ?></button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular" type="button" role="tab" aria-controls="popular" aria-selected="false"><?php echo app('translator')->get('general.popular'); ?></button>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">

							<div class="tab-pane fade show active" id="redak" role="tabpanel" aria-labelledby="redak-tab">
								<div class="row">
									<?php $__currentLoopData = $populars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="col-md-4 col-lg-12 block_3_main_article">
											<picture>
												<img src="<?php echo e(Voyager::image($e->image)); ?>" alt="<?php echo e($e->title); ?>">
											</picture>
											<div class="container-fluid">
												<a href="<?php echo e(route('category.show.article', ['categories' => $e->article_category->slug, 'article' => $e->slug])); ?>">
													<div class="row align-items-end">
														<div class="col">
															<div>
																<span><?php echo e(date('d.m.Y', strtotime($e->created_at))); ?></span>
																<p><?php echo e(\Illuminate\Support\Str::limit($e->title, 80,'...')); ?></p>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
							<div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">
								<div class="row">
									<?php $__currentLoopData = $editorials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

										<div class="col-md-4 col-lg-12 block_3_main_article">
											<picture>
												<img src="<?php echo e(Voyager::image($p->image)); ?>" alt="<?php echo e($p->title); ?>">
											</picture>
											<div class="container-fluid">
												<a href="<?php echo e(route('category.show.article', ['categories' => $p->article_category->slug, 'article' => $p->slug])); ?>">
													<div class="row align-items-end">
														<div class="col">
															<div>
																<span><?php echo e(date('d.m.Y', strtotime($p->created_at))); ?></span>
																<p><?php echo e(\Illuminate\Support\Str::limit($p->title, 80,'...')); ?></p>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Выбор редакции / Популярное END -->

			<!-- Теги START -->
			<div class="col-md-3 col-lg-2 tags_block order-2 order-lg-3">
				<div class="row zag">
					<div class="col">
						<?php echo app('translator')->get('general.tags'); ?>
					</div>
				</div>
				<?php $__currentLoopData = $tags->take(7); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="row tag align-items-end">
						<div class="col-8">
							<a href="<?php echo e(route('tag.show', ['tags' => $tag->slug])); ?>"><?php echo e($tag->name); ?></a>
						</div>
						<div class="col-4 text-end">
							<?php echo e($tag->article_count); ?>

						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<div class="row">
					<div class="col">
						<a href="<?php echo e(route('tag', [])); ?>" class="more_link"><?php echo app('translator')->get('general.allTags'); ?></a>
					</div>
				</div>
			</div>
			<!-- Теги END -->

		</div>
	</div>
</div>

<!-- Мнения START -->
<div class="container block_main_4">
	<div class="row zag">
		<div class="col">
			<?php echo e($opinion->name); ?>

		</div>
	</div>
	<div class="row">
		<?php $__currentLoopData = $opinions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php $__currentLoopData = $opi->article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-6 col-lg-3">
				<a href="<?php echo e(route('category.show.article', ['categories' => $opi->slug, 'article' => $o->slug])); ?>">
					<picture>
						<img src="<?php echo e(Voyager::image($o->image)); ?>" alt="<?php echo e($o->getTranslatedAttribute('title')); ?>">
					</picture>
				</a>
				<span><?php echo e(date('d.m.Y', strtotime($o->created_at))); ?></span>
				<a href="<?php echo e(route('category.show.article', ['categories' => $opi->slug, 'article' => $o->slug])); ?>">
					<?php echo e(\Illuminate\Support\Str::limit($o->getTranslatedAttribute('title'), 40,'...')); ?>

				</a>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="row">
		<div class="col text-md-center">
			<a href="<?php echo e(route('category.show', ['categories' => $opinion->slug])); ?>" class="more_link"><?php echo app('translator')->get('general.allOpinions'); ?></a>
		</div>
	</div>
</div>
<!-- Мнения END -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/pages/home.blade.php ENDPATH**/ ?>