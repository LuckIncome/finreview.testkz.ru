<div class="modal fade" id="subscribe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('general.subscribeTo'); ?></h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="subscribe_form" class="needs-validation" action="<?php echo e(route('subscribe', [])); ?>" method="POST" novalidate>
					<?php echo csrf_field(); ?>
					<input type="text" name="email" placeholder="<?php echo app('translator')->get('general.enterYourMail'); ?>" required="">
					<div class="invalid-feedback">
						<?php echo app('translator')->get('general.enterYourEmail'); ?> ...
					</div>
					<button type="submit" class="subscribe"><?php echo app('translator')->get('general.subscribe'); ?></button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="application" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel2"><?php echo app('translator')->get('general.letterEditor'); ?></h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="feedback" class="needs-validation" action="<?php echo e(route('feedback', [])); ?>" method="POST" novalidate>
					<?php echo csrf_field(); ?>
					<div>
						<input type="text" name="name" placeholder="<?php echo app('translator')->get('general.yourName'); ?>" required="">
						<div class="invalid-feedback">
							<?php echo app('translator')->get('general.pleaseEnterYourName'); ?>
						</div>
					</div>
					<div>
						<input type="text" name="email" placeholder="<?php echo app('translator')->get('general.enterYourEmail'); ?>" required="">
						<div class="invalid-feedback">
							<?php echo app('translator')->get('general.pleaseEnterYourEmail'); ?>
						</div>
					</div>
					<div>
						<textarea name="text" placeholder="<?php echo app('translator')->get('general.yourMessage'); ?>"></textarea>
					</div>
					<input type="hidden" name="url" value="<?php echo e(url()->current()); ?>">
					<button type="submit" class="subscribe"><?php echo app('translator')->get('general.send'); ?></button>
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
                   <?php echo app('translator')->get('general.thanks'); ?>
                </div>
                <div class="text-center">
                    <?php echo app('translator')->get('general.requestSend'); ?>
                    <?php echo app('translator')->get('general.callbackAns'); ?>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('general.close'); ?></button>
            </div>
        </div>
    </div>
</div>
<!-- modal thanks end -->
<?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/partials/modals.blade.php ENDPATH**/ ?>