<footer class="footer mt-auto py-3">
	<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 text-center text-lg-start">
				<a href="/">
					<picture>
						<img src="{{Voyager::image(setting('site.footer_logo'))}}" alt="finreview logo">
					</picture>
				</a>
			</div>
			<div class="col-lg-8">
				{{menu('header_menu','vendor.voyager.menu.mobile_header_menu')}}
			</div>
			<div class="col-lg-2">
				<div class="row">
					<div class="col-md-4 col-lg-12 text-center text-md-start text-lg-end">
						<a href="mailto:{{$email->value}}" class="email_footer">{{$email->value}}</a>
					</div>
					<div class="col-md-4 col-lg-12 text-center text-lg-end footer_soc">
						<a href="{{setting('site.instagram_link')}}" target="_blank">
							<svg fill="none" height="25" viewBox="0 0 25 25" width="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><clipPath id="a_4"><path d="m7.5 7.5h10v10h-10z"/></clipPath><circle cx="12.5" cy="12.5" class="soc_footer" r="12.5"/><g clip-path="url(#a_4)" fill="#2e963d"><path d="m14.5952 7.5h-4.1904c-1.60169 0-2.9048 1.30311-2.9048 2.9048v4.1904c0 1.6017 1.30311 2.9048 2.9048 2.9048h4.1904c1.6017 0 2.9048-1.3031 2.9048-2.9048v-4.1904c0-1.60169-1.3031-2.9048-2.9048-2.9048zm2.1236 7.0952c0 1.1709-.9527 2.1236-2.1236 2.1236h-4.1904c-1.17091 0-2.12355-.9527-2.12355-2.1236v-4.1904c0-1.17091.95264-2.12355 2.12355-2.12355h4.1904c1.1709 0 2.1236.95264 2.1236 2.12355z"/><path d="m12.5 9.80469c-1.4862 0-2.69531 1.20911-2.69531 2.69531s1.20911 2.6953 2.69531 2.6953 2.6953-1.2091 2.6953-2.6953-1.2091-2.69531-2.6953-2.69531zm0 4.60941c-1.0554 0-1.9141-.8587-1.9141-1.9141s.8587-1.9141 1.9141-1.9141 1.9141.8587 1.9141 1.9141-.8587 1.9141-1.9141 1.9141z"/><path d="m15.2344 10.1562c.2157 0 .3906-.17484.3906-.39058 0-.21573-.1749-.39062-.3906-.39062-.2158 0-.3906.17489-.3906.39062 0 .21574.1748.39058.3906.39058z"/></g></svg>
						</a>
						<a href="{{setting('site.telegram_link')}}" target="_blank">
							<svg fill="none" height="25" viewBox="0 0 25 25" width="25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><clipPath id="a_5"><path d="m6.25 6.25h12.5v12.5h-12.5z"/></clipPath><circle cx="12.5" cy="12.5" class="soc_footer" r="12.5"/><g clip-path="url(#a_5)"><path d="m18.557 7.49168c-.1527-.18673-.3814-.28953-.644-.28953-.1428 0-.294.03004-.4495.08945l-10.581 4.0391c-.56153.2143-.63715.5359-.63229.7085s.09861.4894.67139.6717c.00343.001.00686.0021.0103.003l2.19478.6281 1.18692 3.3941c.1619.4627.5251.7502.9482.7502.2667 0 .5291-.1118.7587-.3231l1.3576-1.25 1.969 1.5855c.0002.0002.0005.0003.0007.0005l.0187.015c.0017.0014.0035.0028.0052.0041.2189.1698.4578.2594.6912.2595.456 0 .8191-.3375.9248-.8597l1.7337-8.56058c.0696-.3436.0113-.65107-.1644-.86584zm-8.69608 5.73102 4.23438-2.1632-2.6366 2.8016c-.0432.0459-.0738.102-.0889.1632l-.5084 2.0593zm1.66338 3.4017c-.0175.0161-.0352.0305-.0528.0437l.4717-1.9104.858.691zm6.4793-8.41231-1.7337 8.56061c-.0167.082-.07.2726-.207.2726-.0678 0-.1528-.0369-.2399-.1039l-2.2312-1.7966c-.0003-.0003-.0007-.0005-.0011-.0007l-1.3276-1.0691 3.8129-4.0515c.1221-.1297.1331-.32835.0262-.47083-.107-.14248-.3008-.1873-.4594-.10624l-6.27121 3.20377-2.22464-.6365 10.57775-4.03784c.0894-.03414.1518-.04129.1883-.04129.0224 0 .0623.00267.077.02089.0195.02374.0443.10471.0136.25663z" fill="#2e963d"/></g></svg>
						</a>
						<a href="{{setting('site.facebook_link')}}" target="_blank">
							<svg fill="none" height="25" viewBox="0 0 26 25" width="26" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><clipPath id="a_6"><path d="m8.30005 7.5h10v10h-10z"/></clipPath><circle cx="13.3" cy="12.5" class="soc_footer" r="12.5"/><g clip-path="url(#a_6)"><path d="m14.9654 9.16042h.9129v-1.59c-.1575-.02167-.6991-.07042-1.33-.07042-1.3162 0-2.2179.82792-2.2179 2.34958v1.40042h-1.4525v1.7775h1.4525v4.4725h1.7809v-4.4721h1.3937l.2213-1.7775h-1.6155v-1.2246c.0005-.51372.1388-.86538.8546-.86538z" fill="#2e963d"/></g></svg>
						</a>
					</div>
					<div class="col-md-4 col-lg-12 text-center text-md-end">
						<a href="#" data-bs-toggle="modal" data-bs-target="#subscribe" class="subscribe_footer">
							@lang('general.subscribeTo')
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row f_2">
			<div class="col-6 col-md-4">
				© 2021 finreview.info
			</div>
			<div class="col-6 col-md-4 text-end text-md-center">
				@lang('general.allRightsReserved')
			</div>
			<div class="col-md-4 text-center text-md-end">
				<a href="https://i-marketing.kz" target="_blank">
					<picture>
						<img src="{{ asset('assets/img/im.svg') }}" alt="i-marketing">
					</picture>
				</a>
			</div>
		</div>
	</div>
</div>
</footer>