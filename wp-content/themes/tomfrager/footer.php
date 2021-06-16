<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TomFrager
 */

/* The below code checks if a mobile-menu is set from the backend in the menu settings. If a menu has been set it will be displayed in the header. Or else, a menu has not been set then display a message.*/
if ( function_exists('has_nav_menu') && has_nav_menu('mobile-menu') ) {
wp_nav_menu( array(
'depth' => 6,
'sort_column' => 'menu_order',
'container' => 'div',
'menu_id' => 'main-toolbar',
'menu_class' => 'menu-toolbar',
'theme_location' => 'mobile-menu'
) );
} else {
echo "<ul class='nav mobile-menu'> <font style='color:red'>Mobile Menu has not been set</font> </ul>";
}
?>
	<footer id="colophon" class="site-footer">
<!--		<div class="site-info">-->
<!--			<a href="--><?php //echo esc_url( __( 'https://wordpress.org/', 'tomfrager' ) ); ?><!--">-->
<!--				--><?php
//				/* translators: %s: CMS name, i.e. WordPress. */
//				printf( esc_html__( 'Proudly powered by %s', 'tomfrager' ), 'WordPress' );
//				?>
<!--			</a>-->
<!--			<span class="sep"> | </span>-->
<!--				--><?php
//				/* translators: 1: Theme name, 2: Theme author. */
//				printf( esc_html__( 'Theme: %1$s by %2$s.', 'tomfrager' ), 'tomfrager', '<a href="http://underscores.me/">Underscores.me</a>' );
//				?>
<!--		</div>-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
