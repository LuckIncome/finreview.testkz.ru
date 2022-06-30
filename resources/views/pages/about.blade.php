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
			  'subtitle' => $page->seo_title
			])
		</div>
		<div class="row zag">
			<div class="col">
				{{$page->seo_title}}
			</div>
		</div>
		<div class="row align-items-center justify-content-between about_info">
			<div class="col-lg-6">
				<picture>
					<img src="{{Voyager::image($about->first_image)}}" alt="about">
				</picture>
			</div>
			<div class="col-lg-5">
				{!!$about->first_content!!}
			</div>
		</div>
		<div class="row align-items-center justify-content-between about_info">
			<div class="col-lg-5 order-2 order-lg-1">
				{!!$about->second_content!!}
			</div>
			<div class="col-lg-6 order-1 order-lg-2">
				<picture>
					<img src="{{Voyager::image($about->second_image)}}" alt="about">
				</picture>
			</div>
		</div>
	</div>
</div>

@endsection