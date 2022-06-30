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
						{{--<li><a href="{{route('researches')}}">@lang('general.researches')</a></li>--}}
						<li>@lang('general.allCartoons')</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row zag">
			<div class="col">
				{{$page->title}}
			</div>
		</div>
		<div class="row">
			@foreach($cartoons as $cartoon)
			<div class="col-md-6 col-lg-3">
				<div class="team_block">
					<a href="{{ $cartoon->link }}">
					<picture>
						<img src="{{Voyager::image($cartoon->image)}}" alt="{{$cartoon->name}}">
					</picture>
					</a>
					<span>{{date('d.m.Y', strtotime($cartoon->created_at))}}</span>
				</div>
			</div>
			@endforeach
		</div>
		<div class="row text-center" id="pag">
			<div class="col-12 pagination">
				{{$cartoons_paginate->links('partials.paginate')}}
			</div>
		</div>
	</div>
</div>

@endsection
