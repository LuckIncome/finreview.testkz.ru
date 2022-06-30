@extends('partials.layout')
@section('page_title',(strlen($tag->name) > 1 ? $tag->name : ''))
@section('seo_title', (strlen($tag->seo_title) > 1 ? $tag->seo_title : ''))
@section('meta_keywords',(strlen($tag->meta_keywords) > 1 ? $tag->meta_keywords : ''))
@section('meta_description', (strlen($tag->meta_description) > 1 ? $tag->meta_description : ''))
@section('image','')
@section('url',url()->current())
@section('page_class','page')
@section('content')

<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col bread">
			    <ul>
					<li><a href="/">@lang('general.home')</a></li>
					<li><a href="{{route('tag', [])}}">@lang('general.allTags')</a></li>
					<li>{{$tag->name}}</li>
				</ul>
			</div>
		</div>
		<div class="row zag">
			<div class="col">
				{{$tag->name}}
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-9 align-self-center">
				@foreach($allTags as $t)
					<a href="{{ route('tag.show', ['tags' => $t->slug]) }}" class="btn btn-success mt-2 mb-2">#{{$t->name}}( {{$t->article_count}} )</a>
				@endforeach
			</div>
		</div>

		<div class="row justify-content-center mt-5" id="post">
			@include('partials.loops.articles_tag_show')
		</div>

		<div class="row text-center" id="pag">
			<div class="col-12 pagination">
				{{$articles_paginate->links('partials.paginate')}}
			</div>
		</div>
	</div>
</div>

@endsection
