@forelse($data as $d)
@if($d->article_category)
<div class="col-12 article_inner">
	<div class="row align-items-md-center">
		<div class="col-5 col-md-3 article_inner_image">
			<picture>
				<img src="{{Voyager::image($d->image)}}" alt="{{$d->title}}">
			</picture>
			<div class="container-fluid">
				<a href="{{route('category.show.article', ['categories' => $d->article_category->slug, 'article' => $d->slug])}}">
					<div class="row align-items-end">
						<div class="col">
							<span>{{$d->article_category->getTranslatedAttribute('name')}}</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-7 col-md-9">
			<div class="article_inner_info">
				<span>{{date('d.m.Y', strtotime($d->created_at))}}</span>
				<p>
					<a href="{{route('category.show.article', ['categories' => $d->article_category->slug, 'article' => $d->slug])}}">
						{{ \Illuminate\Support\Str::limit($d->title, 120,'...') }}
					</a>
				</p>
			</div>
		</div>
	</div>
</div>
@endif
@empty
<div class="col search_query">
	@lang('general.onRequest') «<b>{{$request_search}}</b>» @lang('general.nothingWasFound')
</div>
@endforelse
