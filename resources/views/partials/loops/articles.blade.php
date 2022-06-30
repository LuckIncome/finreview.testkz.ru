@forelse($articles as $art)
	@if($art->article_category)
	<!-- Статья START -->
	<div class="col-md-4 col-lg-3 article_inner">
		<div class="row">
			<div class="col-5 col-md-12 article_inner_image">
				<picture>
					<img src="{{Voyager::image($art->image)}}" alt="{{$art->title}}">
				</picture>
				<div class="container-fluid">

					<a href="{{route('category.show.article', ['categories' => $art->article_category->slug, 'article' => $art->slug])}}">
						<div class="row align-items-end">
							<div class="col">
								<span>{{$art->article_category->getTranslatedAttribute('name')}}</span>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-7 col-md-12">
				<div class="article_inner_info">
					<span>{{date('d.m.Y', strtotime($art->created_at))}}</span>
					<p>
						<a href="{{route('category.show.article', ['categories' => $art->article_category->slug, 'article' => $art->slug])}}">
							{{ \Illuminate\Support\Str::limit($art->title, 58,'...') }}
						</a>
					</p>
					<a href="{{route('category.show.article', ['categories' => $art->article_category->slug, 'article' => $art->slug])}}" class="more_link">@lang('general.moreDetailed')</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Статья END -->
	@endif
@empty
	<div class="col-md-12 col-lg-12 article_inner text-center">
		@lang('general.noNews')
	</div>
@endforelse
