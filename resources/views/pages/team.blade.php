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
		<div class="row">
			@foreach($teams as $item)
			<div class="col-md-6 col-lg-3">
				<div class="team_block">
					<picture>
						<img src="{{Voyager::image($item->image)}}" alt="{{$item->name}}">
					</picture>
					{{$item->name}}
					<span>{{$item->position}}</span>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

@endsection
