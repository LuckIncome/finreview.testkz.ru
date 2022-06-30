<select id="select">
	<option value="" <?php if($getSort == ''): ?> selected <?php else: ?> '' <?php endif; ?>><?php echo app('translator')->get('general.sorting'); ?></option>
	<option value="?sort=sort_by_date" <?php if($getSort == 'sort_by_date'): ?> selected <?php else: ?> '' <?php endif; ?>><?php echo app('translator')->get('general.byDate'); ?></option>
	<option value="?sort=sort_by_views" <?php if($getSort == 'sort_by_views'): ?> selected <?php else: ?> '' <?php endif; ?>><?php echo app('translator')->get('general.byViews'); ?></option>
</select><?php /**PATH C:\Users\jandos\Desktop\OpenServer\domains\finreview-fixed\resources\views/partials/sorting.blade.php ENDPATH**/ ?>