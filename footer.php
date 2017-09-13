<div class="footer-widget" role="contentinfo">
	<div id="inner-footerwidget" class="row">
	<div class=" small-12 medium-6 large-3 columns">
		<?php if ( is_active_sidebar( 'footerwidget1' ) ) : ?>
		<?php dynamic_sidebar( 'footerwidget1' ); ?>
		<?php else : ?>
		<div class="alert help">
			<p><?php _e( 'Please activate some Widgets.', 'jointswp' ); ?></p>
		</div>
		<?php endif; ?>
	</div>
	<div class=" small-12 medium-6 large-3 columns">
		<?php if ( is_active_sidebar( 'footerwidget2' ) ) : ?>
		<?php dynamic_sidebar( 'footerwidget2' ); ?>
		<?php else : ?>
		<div class="alert help">
			<p><?php _e( 'Please activate some Widgets.', 'jointswp' ); ?></p>
		</div>
		<?php endif; ?>
	</div>
	<div class=" small-12 medium-6 large-3 columns">
	<?php if ( is_active_sidebar( 'footerwidget3' ) ) : ?>
		<?php dynamic_sidebar( 'footerwidget3' ); ?>
		<?php else : ?>
		<div class="alert help">
			<p><?php _e( 'Please activate some Widgets.', 'jointswp' ); ?></p>
		</div>
		<?php endif; ?>
	</div>
	<div class=" small-12 medium-6 large-3 columns">
	<?php if ( is_active_sidebar( 'footerwidget4' ) ) : ?>
		<?php dynamic_sidebar( 'footerwidget4' ); ?>
		<?php else : ?>
		<div class="alert help">
			<p><?php _e( 'Please activate some Widgets.', 'jointswp' ); ?></p>
		</div>
		<?php endif; ?>
	</div>
	</div>
</div>
<footer class="footer" role="contentinfo">
	<div id="inner-footer" class="row">
		<div class="large-12 medium-12 columns">
			<nav role="navigation">
				<?php joints_footer_links(); ?>
			</nav>
		</div>
		<div class="small-12 medium-9 large-8 columns">
			<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
		</div>
		<div class="small-10 medium-2 large-2 columns text-right">
			<span class="totop"><a href="#top">Tilbage til toppen</a></span>
		</div>
		<div class="small-2 medium-1 large-2 columns"><?php joints_social_nav(); ?></div>
		<div class="clear"></div>
	</div>
</footer>
				</div>  <!-- end .main-content -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->