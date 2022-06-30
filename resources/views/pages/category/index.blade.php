@extends('partials.layout')
@section('page_title',(strlen($page->title) > 1 ? $page->title : ''))
@section('seo_title', (strlen($page->seo_title) > 1 ? $page->seo_title : ''))
@section('meta_keywords',(strlen($page->meta_keywords) > 1 ? $page->meta_keywords : ''))
@section('meta_description', (strlen($page->meta_description) > 1 ? $page->meta_description : ''))
@section('image',$page->thumbic)
@section('url',url()->current())
@section('page_class','page')
@section('content')

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col bread">
				<div class="col bread">
					<ul>
						<li><a href="/">@lang('general.home')</a></li>
						<li>@lang('general.allCategories')</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row zag">
			<div class="col">
				@lang('general.allCategories')
			</div>
		</div>
		<div class="row justify-content-between">
			<div class="col-lg-9 children_pages">
				<ul>
					<li><a href="{{ route('category', []) }}" class="active">@lang('general.all')</a></li>
					@foreach ($articleCategories as $cat)
						@if($cat->slug != 'opinions' && $cat->slug != 'ratings')
						<li>
							<a href="{{route('category.show', ['categories' => $cat->slug])}}">
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
		</div>

		<div class="row justify-content-center" id="post">
			@include('partials.loops.articles')
			<!-- Статья END -->
		</div>

		<div class="row text-center">
			<div class="col-12">
				<a class="more_download" id="load-more">@lang('general.downloadMore')</a>
			</div>
			<div class="col-12 pagination">
				{{$articles_paginate->links('partials.paginate')}}
			</div>
		</div>
	</div>
</div>

@endsection
