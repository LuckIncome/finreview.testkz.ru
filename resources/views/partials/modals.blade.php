<div class="modal fade" id="subscribe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">@lang('general.subscribeTo')</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="subscribe_form" class="needs-validation" action="{{route('subscribe', [])}}" method="POST" novalidate>
					@csrf
					<input type="text" name="email" placeholder="@lang('general.enterYourMail')" required="">
					<div class="invalid-feedback">
						@lang('general.enterYourEmail') ...
					</div>
					<button type="submit" class="subscribe">@lang('general.subscribe')</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="application" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel2">@lang('general.letterEditor')</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="feedback" class="needs-validation" action="{{route('feedback', [])}}" method="POST" novalidate>
					@csrf
					<div>
						<input type="text" name="name" placeholder="@lang('general.yourName')" required="">
						<div class="invalid-feedback">
							@lang('general.pleaseEnterYourName')
						</div>
					</div>
					<div>
						<input type="text" name="email" placeholder="@lang('general.enterYourEmail')" required="">
						<div class="invalid-feedback">
							@lang('general.pleaseEnterYourEmail')
						</div>
					</div>
					<div>
						<textarea name="text" placeholder="@lang('general.yourMessage')"></textarea>
					</div>
					<input type="hidden" name="url" value="{{url()->current()}}">
					<button type="submit" class="subscribe">@lang('general.send')</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- modal thanks start -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                   @lang('general.thanks')
                </div>
                <div class="text-center">
                    @lang('general.requestSend')
                    @lang('general.callbackAns')
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('general.close')</button>
            </div>
        </div>
    </div>
</div>
<!-- modal thanks end -->
