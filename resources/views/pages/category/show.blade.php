@extends('partials.layout')
@section('page_title',(strlen($categorySEO->name) > 1 ? $categorySEO->name : ''))
@section('seo_title', (strlen($categorySEO->seo_title) > 1 ? $categorySEO->seo_title : ''))
@section('meta_keywords',(strlen($categorySEO->meta_keywords) > 1 ? $categorySEO->meta_keywords : ''))
@section('meta_description', (strlen($categorySEO->meta_description) > 1 ? $categorySEO->meta_description : ''))
@section('image','')
@section('url',url()->current())
@section('page_class','page')
@section('content')

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col bread">
				@include('partials.breadcrumbs', [
			  		'subtitle' => $categorySEO->name
				])
			</div>
		</div>
		<div class="row zag">
			<div class="col">
				{{$categorySEO->name}}
			</div>
		</div>

		<div class="row justify-content-between">
		    @if(url()->current() == route('category.show', ['categories' => 'ratings']) OR url()->current() == route('category.show', ['categories' => 'opinions']))
				<div class="col-lg-9 children_pages"></div>
				<div class="col-lg-12 text-center text-lg-end sort">
					@include('partials.sorting')
				</div>
			@else
				<div class="col-lg-9 children_pages">
					<ul>
						<li><a href="{{ route('category', []) }}">@lang('general.all')</a></li>
						@foreach ($articleCategories as $cat)
							@if($cat->slug != 'opinions' && $cat->slug != 'ratings')
								<li>
									<a
									href="{{route('category.show', ['categories' => $cat->slug])}}"
									@if($url = URL::current() == route('category.show', ['categories' => $cat->slug]))
										class="active"
									@endif
									>
										{{$cat->name}}
									</a>
								</li>
							@endif
						@endforeach
					</ul>
				</div>
				<div class="col-lg-3 text-center text-lg-end sort">
					@include('partials.sorting')
				</div>
			@endif
		</div>

		<div class="row justify-content-center" id="post">
			@include('partials.loops.articles_show')
		</div>
		<div class="row text-center" id="pag">
			<div class="col-12">
				<a class="more_download" id="load" style="display:none;"></a>
				<a class="more_download" id="load-more">@lang('general.downloadMore')</a>
			</div>
			<div class="col-12 pagination">
				{{$articles_paginate->links('partials.paginate')}}
			</div>
		</div>
	</div>
</div>

@endsection
