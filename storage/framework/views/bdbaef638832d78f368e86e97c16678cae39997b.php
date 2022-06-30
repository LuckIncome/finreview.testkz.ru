<div class="col bread">
	<ul>
		<li><a href="/"><?php echo app('translator')->get('general.home'); ?></a></li>
		<?php if(isset($subtitle)): ?>
			<li><?php echo e($subtitle); ?></li>
		<?php endif; ?>
		<?php if(isset($childTitle)): ?>
			<li><a href="<?php echo e($subTitleLink); ?>"><?php echo e($subtitle_one); ?></a></li>
			<li><?php echo e($childTitle); ?></li>
		<?php endif; ?>
	</ul>
</div><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/partials/breadcrumbs.blade.php ENDPATH**/ ?>