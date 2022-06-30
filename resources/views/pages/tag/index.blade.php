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
						<li>@lang('general.allTags')</li>
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
			<div class="col-lg-12">
				@foreach($tags as $tag)
					<a href="{{ route('tag.show', ['tags' => $tag->slug]) }}" class="btn btn-success mt-2 mb-2">#{{$tag->name}}( {{$tag->article_count}} )</a>
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection
