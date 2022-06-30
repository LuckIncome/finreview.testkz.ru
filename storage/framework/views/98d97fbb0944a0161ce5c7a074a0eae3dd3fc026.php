<?php $__env->startSection('page_title',(strlen($article->title) > 1 ? $article->title : '')); ?>
<?php $__env->startSection('seo_title', (strlen($article->seo_title) > 1 ? $article->seo_title : '')); ?>
<?php $__env->startSection('meta_keywords',(strlen($article->meta_keywords) > 1 ? $article->meta_keywords : '')); ?>
<?php $__env->startSection('meta_description', (strlen($article->meta_description) > 1 ? $article->meta_description : '')); ?>
<?php $__env->startSection('image',$article->image); ?>
<?php $__env->startSection('url',url()->current()); ?>
<?php $__env->startSection('page_class','page'); ?>
<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col bread">
					<?php echo $__env->make('partials.breadcrumbs', [
					  'subTitleLink' => route('category.show', ['categories' => $articleCategory->slug]),
					  'subtitle_one' => $articleCategory->name,
					  'childTitle' => $article->title
					], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
			</div>
			<div class="row zag">
				<div class="col">
					<?php echo e($article->title); ?>

				</div>
			</div>
			<div class="row">
				<div class="col-lg-2">
					<div class="sidebar">
						<div class="row align-items-center">
							<div class="col-6 col-md-4 col-lg-12 text-center text-md-start">
								<span class="article_date"><?php echo e(date('d.m.Y', strtotime($article->created_at))); ?></span>
							</div>
							<div class="col-6 col-md-4 col-lg-12 text-center text-md-start">
								<?php
						            if($article->view_count == 1000000000) {
						                \DB::table('article')->where('id', $article->id)->update(['view_count'=>0]);
						            }
						            else {
						                \DB::table('article')->where('id', $article->id)->update(['view_count'=>$article->view_count + 1]);
						            }
						        ?>
								<span class="article_see"><?php echo e($article->view_count); ?></span>
							</div>
							<div class="col-md-4 col-lg-12 text-center text-md-start">
								<?php echo app('translator')->get('general.readingTime'); ?>:
								 <?php if($article->subtitle): ?>
								    <b id='time'><?php echo e($article->subtitle); ?> <?php echo app('translator')->get('general.min'); ?></b>
								 <?php else: ?>
								    <b id='time'><?php echo ceil((iconv_strlen($c->content) / 1500) * 0.2); ?> <?php echo app('translator')->get('general.min'); ?></b>
								 <?php endif; ?>
							</div>
							<div class="col-12 d-none d-lg-block">
								<?php echo app('translator')->get('general.authorArticle'); ?>:
								<picture>
								    <?php if($article->avatar): ?>
									<img src="<?php echo e(Voyager::image($article->avatar)); ?>" alt="<?php echo e($article->author); ?>">
									<?php else: ?>
								  	<img src="<?php echo e(asset('assets/img/autor.png')); ?>" alt="avatar">
									<?php endif; ?>
								</picture>
								<strong><?php echo e($article->author); ?></strong>
								<a><?php echo app('translator')->get('general.articles'); ?></a> <i>(<?php echo e($author_count->count()); ?>)</i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 article_text">
					<div class="row article_text_image">
						<div class="col">
							<a href="<?php echo e(Voyager::image($article->iamge)); ?>" data-fancybox="gallery">
								<picture>
									<img src="<?php echo e(Voyager::image($article->image)); ?>" alt="<?php echo e($article->title); ?>">
								</picture>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<?php echo $article->content; ?>

						</div>
					</div>
					<div class="row d-lg-none autor_mobile">
						<div class="col">
							<?php echo app('translator')->get('general.authorArticle'); ?>: <strong><?php echo e($article->author); ?></strong> <a><?php echo app('translator')->get('general.articles'); ?></a> <i>(<?php echo e($author_count->count()); ?>)</i>
						</div>
					</div>
					<div class="row article_tags align-items-center">
						<div class="col-lg-6 text-center text-lg-start">
							<script src="https://yastatic.net/share2/share.js"></script>
							<div class="ya-share2" data-curtain data-shape="round" data-limit="5" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
						</div>
						<div class="col-lg-6 text-center text-lg-end">
							<?php $__currentLoopData = $article->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<a href="<?php echo e(route('tag.show', ['tags' => $tag->slug])); ?>"><?php echo e($tag->getTranslatedAttribute('name')); ?></a>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php $__currentLoopData = $art->article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="row sidebar_articles">
							<div class="col-6 mini_article_image">
								<picture>
									<img src="<?php echo e(Voyager::image($a->image)); ?>" alt="<?php echo e($a->getTranslatedAttribute('title')); ?>">
								</picture>
								<div class="container-fluid">
									<a href="<?php echo e(route('category.show.article', ['categories' => $art->slug, 'article' => $a->slug])); ?>">
										<div class="row align-items-end">
											<div class="col">
												<span><?php echo e($art->name); ?></span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-6 mini_article_text">
								<span><?php echo e(date('d.m.Y', strtotime($a->created_at))); ?></span>
								<a href="<?php echo e(route('category.show.article', ['categories' => $art->slug, 'article' => $a->slug])); ?>">
									<?php echo e(\Illuminate\Support\Str::limit($a->getTranslatedAttribute('title'), 42,'...')); ?>

								</a>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<div class="row">
						<div class="col">
							<a href="<?php echo e(route('category.show', ['categories' => $articleCategory->slug])); ?>" class="more_link"><?php echo app('translator')->get('general.all'); ?> <?php echo e($articleCategory->name); ?></a>
						</div>
					</div>
				</div>
			</div>

			<?php if(is_object($temas)): ?>
			<!-- Материалы по теме START -->
			<div class="row inner_block_1">
				<div class="col-12 text-center zag">
					<?php echo app('translator')->get('general.materialsTopic'); ?>
				</div>
				<?php $__currentLoopData = $temas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $__currentLoopData = $tema->article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<!-- Статья START -->
					<div class="col-md-6 col-lg-3 article_inner">
						<div class="row">
							<div class="col-5 col-md-12 article_inner_image">
								<picture>
									<img src="<?php echo e(Voyager::image($a->image)); ?>" alt="<?php echo e($a->title); ?>">
								</picture>
								<div class="container-fluid">
									<a href="<?php echo e(route('category.show.article', ['categories' => $a->article_category->slug, 'article' => $a->slug])); ?>">
										<div class="row align-items-end">
											<div class="col">
												<span><?php echo app('translator')->get('general.tema'); ?>: <?php echo e($tema->name); ?></span>
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
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<div class="row text-center">
					<div class="col-12 pagination">
						<?php echo e($temas_paginate->links('partials.paginate')); ?>

					</div>
				</div>
			</div>
			<!-- Материалы по теме END -->
			<?php else: ?>

			<?php endif; ?>

			<!-- Рейтинги по теме START -->
			<div class="row inner_block_1">
				<div class="col-12 text-center zag">
					<?php if(strpos(url()->current(), 'ratings')): ?>
						<?php echo app('translator')->get('general.researches'); ?>
					<?php else: ?>
						<?php echo app('translator')->get('general.ratings'); ?>
					<?php endif; ?>
				</div>
				<?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $__currentLoopData = $rat->article; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<!-- Статья START -->
					<div class="col-md-6 col-lg-3 article_inner">
						<div class="row">
							<div class="col-5 col-md-12 article_inner_image">
								<picture>
									<img src="<?php echo e(Voyager::image($r->image)); ?>" alt="<?php echo e($r->getTranslatedAttribute('title')); ?>">
								</picture>
								<div class="container-fluid">
									<a href="<?php echo e(route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])); ?>">
										<div class="row align-items-end">
											<div class="col">
												<span><?php echo e($rat->name); ?></span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-7 col-md-12">
								<div class="article_inner_info">
									<span><?php echo e(date('d.m.Y', strtotime($r->created_at))); ?></span>
									<p>
										<a href="<?php echo e(route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])); ?>">
											<?php echo e(\Illuminate\Support\Str::limit($r->getTranslatedAttribute('title'), 58,'...')); ?>

										</a>
									</p>
									<a href="<?php echo e(route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])); ?>" class="more_link"><?php echo app('translator')->get('general.moreDetailed'); ?></a>
								</div>
							</div>
						</div>
					</div>
					<!-- Статья END -->
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</div>
			<!-- Рейтинги по теме END -->

			<!-- Мнения START -->
			<div class="container block_main_4 inner_block_1">
				<div class="row zag">
					<div class="col text-center">
						<?php if(strpos(url()->current(), 'opinions')): ?>
							<?php echo app('translator')->get('general.researches'); ?>
						<?php else: ?>
							<?php echo app('translator')->get('general.opinions'); ?>
						<?php endif; ?>
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
								<?php echo e(\Illuminate\Support\Str::limit($o->getTranslatedAttribute('title'), 52,'...')); ?>

							</a>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="row">
					<div class="col text-md-center">
						<?php if(strpos(url()->current(), 'opinions')): ?>
							<a href="/researches" class="more_link"><?php echo app('translator')->get('general.allResearches'); ?></a>
						<?php else: ?>
							<a href="/category/opinions" class="more_link"><?php echo app('translator')->get('general.allOpinions'); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<!-- Мнения END -->

		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('partials.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/pages/category/article_show.blade.php ENDPATH**/ ?>