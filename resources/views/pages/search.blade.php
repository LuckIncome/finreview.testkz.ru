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
			@include('partials.breadcrumbs', [
			  'subtitle' => $page->title
			])
		</div>
		<div class="row zag">
			<div class="col">
				@lang('general.searchResults')
			</div>
		</div>
		<div class="row search_result">
			<div class="col-12" id="search_block">
				<form class="needs-validation" id="search" action="{{ route('search') }}/" method="post" novalidate>
					@csrf
					<input type="text" id="head_s" name="header_search" placeholder="{{$request_search}}" required="">
					<input type="submit" class="search_button">
					<div class="invalid-feedback">
						@lang('general.pleaseEnterSearchWord') ...
					</div>
				</form>
			</div>

			<div class="col search_query">
				@if($request_search)
					@lang('general.lookingFor') «<b>{{$request_search}}</b>»
				@endif
			</div>
			<div id="post">
				@include('partials.loops.article_search')
			</div>

		</div>
		<div class="row text-center">
			<div class="col-12 pagination">
				{{$articles_paginate->links('partials.paginate')}}
			</div>
		</div>
	</div>
</div>

@endsection
