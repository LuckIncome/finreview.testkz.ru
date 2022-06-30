@foreach ($articles as $art)
	@forelse($art->article as $a)
	<!-- Статья START -->
	<div class="col-md-4 col-lg-3 article_inner">
		<div class="row">
			<div class="col-5 col-md-12 article_inner_image">
				<picture>
					<img src="{{Voyager::image($a->image)}}" alt="{{$a->getTranslatedAttribute('title')}}">
				</picture>
				<div class="container-fluid">
					<a href="{{route('category.show.article', ['categories' => $art->slug, 'article' => $a->slug])}}">
						<div class="row align-items-end">
							<div class="col">
								<span>{{$art->name}}</span>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-7 col-md-12">
				<div class="article_inner_info">
					<span>{{date('d.m.Y', strtotime($a->created_at))}}</span>
					<p>
						<a href="{{route('category.show.article', ['categories' => $art->slug, 'article' => $a->slug])}}">
							{{ \Illuminate\Support\Str::limit($a->getTranslatedAttribute('title'), 58,'...') }}
						</a>
					</p>
					<a href="{{route('category.show.article', ['categories' => $art->slug, 'article' => $a->slug])}}" class="more_link">@lang('general.moreDetailed')</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Статья END -->
	@empty
		<div class="col-md-12 col-lg-12 article_inner text-center" id="asd">
			@lang('general.noNews')
		</div>
	@endforelse
@endforeach
