<div class="secondary-header">
	<div class="row">
		<div class="small-10 medium-11 large-10 columns">
			<?php if ( is_active_sidebar( 'secondaryheader' ) ) : ?>
			<?php dynamic_sidebar( 'secondaryheader' ); ?>
			<?php else : ?>
			<div class="alert help">
				<p><?php _e( 'Please activate some Widgets.', 'jointswp' ); ?></p>
			</div>
			<?php endif; ?>
		</div>
		<div class="small-2 medium-1 large-2 columns"><?php //joints_social_nav(); ?></div>
		<div class="clear"></div>
	</div>
</div>