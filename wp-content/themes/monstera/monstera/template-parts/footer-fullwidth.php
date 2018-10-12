<?php
/**
 * @package Monstera
 * 
 */

//Display full-width-footer if active
	 if ( is_active_sidebar( 'full-width-footer' ) ) : ?>
				<div id="full-width-footer" class="full-width-footer widget-area" role="complementary">
					<?php dynamic_sidebar( 'full-width-footer' ); ?>
				</div><!-- #full-width-footer -->
			<?php endif; ?>

