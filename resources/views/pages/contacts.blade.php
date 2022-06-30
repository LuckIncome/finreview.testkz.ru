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
			  'subTitleLink' => route('pages.get',['page' => $pages['about']->first()->slug]),
			  'subtitle_one' => $pages['about']->first()->title,
			  'childTitle' => $page->seo_title
			])
		</div>
		<div class="row zag">
			<div class="col">
				{{$page->seo_title}}
			</div>
		</div>
		<div class="row justify-content-between contacts_inner">

			<div class="col-lg-4 col-xl-3 text-center">
				<span class="phone text-start">
					@foreach($phones as $phone)
						<a href="tel:{{$phone->link}}">{{$phone->value}}</a><br>
					@endforeach
				</span>
				<span class="email text-start">
					<a href="mailto:{{$email->value}}">{{$email->value}}</a>
				</span>
				<span class="address text-start">
					{{$adress->translate_value}}
				</span>
				<div class="soc_contacts">
					@foreach($socials as $social)
					<a href="{{$social->link}}" target="_blank">
						<picture>
							<img src="{{Voyager::image($social->icon)}}" alt="{{$social->value}}">
						</picture>
					</a>
					@endforeach
				</div>
				<a href="#" data-bs-toggle="modal" data-bs-target="#application" class="application">
					@lang('general.writeToEditor')
				</a>
			</div>

			<div class="col-lg-8">
				<div class="map">
					{!!$map->value!!}
				</div>
			</div>

		</div>
	</div>
</div>

@endsection
