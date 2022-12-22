<?php
/**
 * Шаблон сайдбара (sidebar.php)
 * @package WordPress
 * @subpackage restourant
 */
?>
<?php if (is_active_sidebar( 'sidebar' )) { // если в сайдбаре есть что выводить ?>
<div class="menu-toggle">
	<div class="open_menus">
		<div></div>
		<div></div>
		<div></div>
	</div>
</div>
<div class="shoutdown">
	<aside>
		<div class="center-block" style="text-align:center;">
			<?php if( has_custom_logo() ){
				echo get_custom_logo();
			} ?>
		</div>
		<?php dynamic_sidebar('sidebar'); // выводим сайдбар, имя определено в functions.php ?>
	</aside>
</div>	
<?php } ?>