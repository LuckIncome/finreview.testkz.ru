@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

<!-- Блок Исследования START -->
<div class="container-fluid">
	<div class="container">
		<div class="row zag">
			<div class="col">
				{{$research->title}}
			</div>
		</div>
		<div class="row">
			<!-- Основная новость блока START -->
			<div class="col-lg-6 big_article">
				<div class="row">
					<div class="col-md-8 col-lg-12 big_article_image">
						<picture>
							<img src="{{Voyager::image($research_one->image)}}" alt="{{$research_one->title}}">
						</picture>
						<div class="container-fluid">
							<a href="{{route('category.show.article', ['categories' => $research_one->cat->slug, 'article' => $research_one->slug])}}">
								<div class="row align-items-end">
									<div class="col">
										<span>{{$research_one->cat->getTranslatedAttribute('name')}}</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4 col-lg-12 big_article_text">
						<span>{{date('d.m.Y', strtotime($research_one->created_at))}}</span>
						<a href="{{route('category.show.article', ['categories' => $research_one->cat->slug, 'article' => $research_one->slug])}}">
							{{ \Illuminate\Support\Str::limit($research_one->title, 105,'...') }}
						</a>
						<p></p>
						<p>{{ \Illuminate\Support\Str::limit($research_one->excerpt, 105,'...') }}</p>
					</div>
				</div>
			</div>
			<!-- Основная новость блока END -->


			<!-- Мини новости блока START -->
			<div class="col-lg-6">
				<div class="row">
					@foreach($researches as $rese)
						<!-- Мини новость START -->
						<div class="col-md-4 col-lg-12 mini_article">
							<div class="row">
								<div class="col-5 col-md-12 col-lg-6 mini_article_image">
									<picture>
										<img src="{{Voyager::image($rese->image)}}" alt="{{$rese->title}}">
									</picture>
									<div class="container-fluid">
										<a href="{{route('category.show.article', ['categories' => $rese->cat->slug, 'article' => $rese->slug])}}">
											<div class="row align-items-end">
												<div class="col">
													<span>{{$rese->cat->getTranslatedAttribute('name')}}</span>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-7 col-md-12 col-lg-6 mini_article_text">
									<span>{{date('d.m.Y', strtotime($rese->created_at))}}</span>
									<a href="{{route('category.show.article', ['categories' => $rese->cat->slug, 'article' => $rese->slug])}}">
										{{ \Illuminate\Support\Str::limit($rese->title, 80,'...') }}
									</a>
									<p></p>
									<p>{{ \Illuminate\Support\Str::limit($rese->excerpt, 55,'...') }}</p>
								</div>
							</div>
						</div>
						<!-- Мини новость END -->
					@endforeach

					<div class="col-12 text-start text-md-center text-lg-start">
						<a href="{{route('researches', [])}}" class="more_link">@lang('general.allStudies')</a>
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
				{{$rating->name}}
			</div>
		</div>
		<div class="row">
			@foreach ($rating_one->article as $r_one)
			<!-- Основная новость блока START -->
			<div class="col-lg-6 big_article">
				<div class="row">
					<div class="col-md-8 col-lg-12 big_article_image">
						<picture>
							<img src="{{Voyager::image($r_one->image)}}" alt="{{$r_one->getTranslatedAttribute('title')}}">
						</picture>
						<div class="container-fluid">
							<a href="{{route('category.show.article', ['categories' => $rating_one->slug, 'article' => $r_one->slug])}}">
								<div class="row align-items-end">
									<div class="col">
										<br>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-4 col-lg-12 big_article_text">
						<span>{{date('d.m.Y', strtotime($r_one->created_at))}}</span>
						<a href="{{route('category.show.article', ['categories' => $rating_one->slug, 'article' => $r_one->slug])}}">
							{{ \Illuminate\Support\Str::limit($r_one->getTranslatedAttribute('title'), 105,'...') }}
						</a>
						<p></p>
						<p>{{ \Illuminate\Support\Str::limit($r_one->getTranslatedAttribute('excerpt'), 105,'...') }}</p>
					</div>
				</div>
			</div>
			<!-- Основная новость блока END -->
			@endforeach

			<!-- Мини новости блока START -->
			<div class="col-lg-6">
				<div class="row">
					@foreach ($ratings as $rat)
						@foreach ($rat->article as $r)
						<!-- Мини новость START -->
						<div class="col-md-4 col-lg-12 mini_article">
							<div class="row">
								<div class="col-5 col-md-12 col-lg-6 mini_article_image">
									<picture>
										<img src="{{Voyager::image($r->image)}}" alt="{{$r->getTranslatedAttribute('title')}}">
									</picture>
									<div class="container-fluid">
										<a href="{{route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])}}">
											<div class="row align-items-end">
												<div class="col">
													<br>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-7 col-md-12 col-lg-6 mini_article_text">
									<span>{{date('d.m.Y', strtotime($r->created_at))}}</span>
									<a href="{{route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])}}">
										{{ \Illuminate\Support\Str::limit($r->getTranslatedAttribute('title'), 80,'...') }}
									</a>
									<p></p>
									<p>{{ \Illuminate\Support\Str::limit($r->getTranslatedAttribute('excerpt'), 40,'...') }}</p>
								</div>
							</div>
						</div>
						<!-- Мини новость END -->
						@endforeach
					@endforeach

					<div class="col-12 text-start text-md-center text-lg-start">
						<a href="{{route('category.show', ['categories' => $rating->slug])}}" class="more_link">@lang('general.allRatings')</a>
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
						@lang('general.caricatureDay')
					</div>
				</div>
				<div class="row">
					<div class="col">
					    <a href="/cartoons">
    						<picture>
    							<img src="{{ Voyager::image($cartoon->Thumbic) }}" alt="{{$cartoon->name}}">
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
								<button class="nav-link active" id="redak-tab" data-bs-toggle="tab" data-bs-target="#redak" type="button" role="tab" aria-controls="redak" aria-selected="true">@lang('general.editorsChoice')</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular" type="button" role="tab" aria-controls="popular" aria-selected="false">@lang('general.popular')</button>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">

							<div class="tab-pane fade show active" id="redak" role="tabpanel" aria-labelledby="redak-tab">
								<div class="row">
									@foreach($populars as $e)
										<div class="col-md-4 col-lg-12 block_3_main_article">
											<picture>
												<img src="{{ Voyager::image($e->image) }}" alt="{{$e->title}}">
											</picture>
											<div class="container-fluid">
												<a href="{{route('category.show.article', ['categories' => $e->article_category->slug, 'article' => $e->slug])}}">
													<div class="row align-items-end">
														<div class="col">
															<div>
																<span>{{date('d.m.Y', strtotime($e->created_at))}}</span>
																<p>{{ \Illuminate\Support\Str::limit($e->title, 80,'...') }}</p>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div>
									@endforeach
								</div>
							</div>
							<div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">
								<div class="row">
									@foreach($editorials as $p)

										<div class="col-md-4 col-lg-12 block_3_main_article">
											<picture>
												<img src="{{Voyager::image($p->image)}}" alt="{{$p->title}}">
											</picture>
											<div class="container-fluid">
												<a href="{{route('category.show.article', ['categories' => $p->article_category->slug, 'article' => $p->slug])}}">
													<div class="row align-items-end">
														<div class="col">
															<div>
																<span>{{date('d.m.Y', strtotime($p->created_at))}}</span>
																<p>{{ \Illuminate\Support\Str::limit($p->title, 80,'...') }}</p>
															</div>
														</div>
													</div>
												</a>
											</div>
										</div>

									@endforeach
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
						@lang('general.tags')
					</div>
				</div>
				@foreach ($tags->take(7) as $tag)
					<div class="row tag align-items-end">
						<div class="col-8">
							<a href="{{ route('tag.show', ['tags' => $tag->slug]) }}">{{$tag->name}}</a>
						</div>
						<div class="col-4 text-end">
							{{$tag->article_count}}
						</div>
					</div>
				@endforeach

				<div class="row">
					<div class="col">
						<a href="{{route('tag', [])}}" class="more_link">@lang('general.allTags')</a>
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
			{{$opinion->name}}
		</div>
	</div>
	<div class="row">
		@foreach ($opinions as $opi)
			@foreach ($opi->article as $o)
			<div class="col-md-6 col-lg-3">
				<a href="{{route('category.show.article', ['categories' => $opi->slug, 'article' => $o->slug])}}">
					<picture>
						<img src="{{Voyager::image($o->image)}}" alt="{{$o->getTranslatedAttribute('title')}}">
					</picture>
				</a>
				<span>{{date('d.m.Y', strtotime($o->created_at))}}</span>
				<a href="{{route('category.show.article', ['categories' => $opi->slug, 'article' => $o->slug])}}">
					{{ \Illuminate\Support\Str::limit($o->getTranslatedAttribute('title'), 40,'...') }}
				</a>
			</div>
			@endforeach
		@endforeach
	</div>
	<div class="row">
		<div class="col text-md-center">
			<a href="{{route('category.show', ['categories' => $opinion->slug])}}" class="more_link">@lang('general.allOpinions')</a>
		</div>
	</div>
</div>
<!-- Мнения END -->

@endsection
