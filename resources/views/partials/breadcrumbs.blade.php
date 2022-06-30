<div class="col bread">
	<ul>
		<li><a href="/">@lang('general.home')</a></li>
		@if(isset($subtitle))
			<li>{{$subtitle}}</li>
		@endif
		@if(isset($childTitle))
			<li><a href="{{$subTitleLink}}">{{$subtitle_one}}</a></li>
			<li>{{$childTitle}}</li>
		@endif
	</ul>
</div>