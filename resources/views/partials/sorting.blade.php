<select id="select">
	<option value="" @if($getSort == '') selected @else '' @endif>@lang('general.sorting')</option>
	<option value="?sort=sort_by_date" @if($getSort == 'sort_by_date') selected @else '' @endif>@lang('general.byDate')</option>
	<option value="?sort=sort_by_views" @if($getSort == 'sort_by_views') selected @else '' @endif>@lang('general.byViews')</option>
</select>