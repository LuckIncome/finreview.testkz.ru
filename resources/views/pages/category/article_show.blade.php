@extends('partials.layout')
@section('page_title',(strlen($article->title) > 1 ? $article->title : ''))
@section('seo_title', (strlen($article->seo_title) > 1 ? $article->seo_title : ''))
@section('meta_keywords',(strlen($article->meta_keywords) > 1 ? $article->meta_keywords : ''))
@section('meta_description', (strlen($article->meta_description) > 1 ? $article->meta_description : ''))
@section('image',$article->image)
@section('url',url()->current())
@section('page_class','page')
@section('content')

	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col bread">
					@include('partials.breadcrumbs', [
					  'subTitleLink' => route('category.show', ['categories' => $articleCategory->slug]),
					  'subtitle_one' => $articleCategory->name,
					  'childTitle' => $article->title
					])
				</div>
			</div>
			<div class="row zag">
				<div class="col">
					{{$article->title}}
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2">
					<div class="sidebar">
						<div class="row align-items-center">
							<div class="col-6 col-md-4 col-lg-12 text-center text-md-start">
								<span class="article_date">{{date('d.m.Y', strtotime($article->created_at))}}</span>
							</div>
							<div class="col-6 col-md-4 col-lg-12 text-center text-md-start">
								@php
						            if($article->view_count == 1000000000) {
						                \DB::table('article')->where('id', $article->id)->update(['view_count'=>0]);
						            }
						            else {
						                \DB::table('article')->where('id', $article->id)->update(['view_count'=>$article->view_count + 1]);
						            }
						        @endphp
								<span class="article_see">{{$article->view_count}}</span>
							</div>
							<div class="col-md-4 col-lg-12 text-center text-md-start">
								@lang('general.readingTime'):
								 @if($article->subtitle)
								    <b id='time'>{{$article->subtitle}} @lang('general.min')</b>
								 @else
								    <b id='time'>{!! ceil((iconv_strlen($c->content) / 1500) * 0.2) !!} @lang('general.min')</b>
								 @endif
							</div>
							<div class="col-12 d-none d-lg-block">
								@lang('general.authorArticle'):
								<picture>
								    @if($article->avatar)
									<img src="{{Voyager::image($article->avatar)}}" alt="{{$article->author}}">
									@else
								  	<img src="{{asset('assets/img/autor.png')}}" alt="avatar">
									@endif
								</picture>
								<strong>{{$article->author}}</strong>
								<a>@lang('general.articles')</a> <i>({{$author_count->count()}})</i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 article_text">
					<div class="row article_text_image">
						<div class="col">
							<a href="{{Voyager::image($article->iamge)}}" data-fancybox="gallery">
								<picture>
									<img src="{{Voyager::image($article->image)}}" alt="{{$article->title}}">
								</picture>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col">
							{!!$article->content!!}
						</div>
					</div>
					<div class="row d-lg-none autor_mobile">
						<div class="col">
							@lang('general.authorArticle'): <strong>{{$article->author}}</strong> <a>@lang('general.articles')</a> <i>({{$author_count->count()}})</i>
						</div>
					</div>
					<div class="row article_tags align-items-center">
						<div class="col-lg-6 text-center text-lg-start">
							<script src="https://yastatic.net/share2/share.js"></script>
							<div class="ya-share2" data-curtain data-shape="round" data-limit="5" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp"></div>
						</div>
						<div class="col-lg-6 text-center text-lg-end">
							@foreach ($article->tag as $tag)
								<a href="{{ route('tag.show', ['tags' => $tag->slug]) }}">{{$tag->getTranslatedAttribute('name')}}</a>
							@endforeach
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					@foreach($articles as $art)
						@foreach($art->article as $a)
						<div class="row sidebar_articles">
							<div class="col-6 mini_article_image">
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
							<div class="col-6 mini_article_text">
								<span>{{date('d.m.Y', strtotime($a->created_at))}}</span>
								<a href="{{route('category.show.article', ['categories' => $art->slug, 'article' => $a->slug])}}">
									{{ \Illuminate\Support\Str::limit($a->getTranslatedAttribute('title'), 42,'...') }}
								</a>
							</div>
						</div>
						@endforeach
					@endforeach

					<div class="row">
						<div class="col">
							<a href="{{ route('category.show', ['categories' => $articleCategory->slug]) }}" class="more_link">@lang('general.all') {{ $articleCategory->name }}</a>
						</div>
					</div>
				</div>
			</div>

			@if(is_object($temas))
			<!-- Материалы по теме START -->
			<div class="row inner_block_1">
				<div class="col-12 text-center zag">
					@lang('general.materialsTopic')
				</div>
				@foreach($temas as $tema)
					@foreach($tema->article as $a)
					<!-- Статья START -->
					<div class="col-md-6 col-lg-3 article_inner">
						<div class="row">
							<div class="col-5 col-md-12 article_inner_image">
								<picture>
									<img src="{{Voyager::image($a->image)}}" alt="{{$a->title}}">
								</picture>
								<div class="container-fluid">
									<a href="{{route('category.show.article', ['categories' => $a->article_category->slug, 'article' => $a->slug])}}">
										<div class="row align-items-end">
											<div class="col">
												<span>@lang('general.tema'): {{$tema->name}}</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-7 col-md-12">
								<div class="article_inner_info">
									<span>{{date('d.m.Y', strtotime($a->created_at))}}</span>
									<p>
										<a href="{{route('category.show.article', ['categories' => $a->article_category->slug, 'article' => $a->slug])}}">
											{{ \Illuminate\Support\Str::limit($a->getTranslatedAttribute('title'), 58,'...') }}
										</a>
									</p>
									<a href="{{route('category.show.article', ['categories' => $a->article_category->slug, 'article' => $a->slug])}}" class="more_link">@lang('general.moreDetailed')</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Статья END -->
					@endforeach
				@endforeach

				<div class="row text-center">
					<div class="col-12 pagination">
						{{$temas_paginate->links('partials.paginate')}}
					</div>
				</div>
			</div>
			<!-- Материалы по теме END -->
			@else

			@endif

			<!-- Рейтинги по теме START -->
			<div class="row inner_block_1">
				<div class="col-12 text-center zag">
					@if(strpos(url()->current(), 'ratings'))
						@lang('general.researches')
					@else
						@lang('general.ratings')
					@endif
				</div>
				@foreach($ratings as $rat)
					@foreach($rat->article as $r)
					<!-- Статья START -->
					<div class="col-md-6 col-lg-3 article_inner">
						<div class="row">
							<div class="col-5 col-md-12 article_inner_image">
								<picture>
									<img src="{{Voyager::image($r->image)}}" alt="{{$r->getTranslatedAttribute('title')}}">
								</picture>
								<div class="container-fluid">
									<a href="{{route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])}}">
										<div class="row align-items-end">
											<div class="col">
												<span>{{$rat->name}}</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="col-7 col-md-12">
								<div class="article_inner_info">
									<span>{{date('d.m.Y', strtotime($r->created_at))}}</span>
									<p>
										<a href="{{route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])}}">
											{{ \Illuminate\Support\Str::limit($r->getTranslatedAttribute('title'), 58,'...') }}
										</a>
									</p>
									<a href="{{route('category.show.article', ['categories' => $rat->slug, 'article' => $r->slug])}}" class="more_link">@lang('general.moreDetailed')</a>
								</div>
							</div>
						</div>
					</div>
					<!-- Статья END -->
					@endforeach
				@endforeach

			</div>
			<!-- Рейтинги по теме END -->

			<!-- Мнения START -->
			<div class="container block_main_4 inner_block_1">
				<div class="row zag">
					<div class="col text-center">
						@if(strpos(url()->current(), 'opinions'))
							@lang('general.researches')
						@else
							@lang('general.opinions')
						@endif
					</div>
				</div>
				<div class="row">
					@foreach($opinions as $opi)
						@foreach($opi->article as $o)
						<div class="col-md-6 col-lg-3">
							<a href="{{route('category.show.article', ['categories' => $opi->slug, 'article' => $o->slug])}}">
								<picture>
									<img src="{{Voyager::image($o->image)}}" alt="{{$o->getTranslatedAttribute('title')}}">
								</picture>
							</a>
							<span>{{date('d.m.Y', strtotime($o->created_at))}}</span>
							<a href="{{route('category.show.article', ['categories' => $opi->slug, 'article' => $o->slug])}}">
								{{ \Illuminate\Support\Str::limit($o->getTranslatedAttribute('title'), 52,'...') }}
							</a>
						</div>
						@endforeach
					@endforeach
				</div>
				<div class="row">
					<div class="col text-md-center">
						@if(strpos(url()->current(), 'opinions'))
							<a href="/researches" class="more_link">@lang('general.allResearches')</a>
						@else
							<a href="/category/opinions" class="more_link">@lang('general.allOpinions')</a>
						@endif
					</div>
				</div>
			</div>
			<!-- Мнения END -->

		</div>
	</div>

@endsection
