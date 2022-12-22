<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage restourant
 */
get_header(); ?> 
<?php 
	$current_cat = get_query_var('cat');
	$id_par = wp_get_term_taxonomy_parent_id( $current_cat );
?>
<?php if (is_category(array(3)) || $id_par == 3){ ?>

		<div class="menu_parent">	
			<?php 
				$args = array(
					'parent' => 3,
					'hide_empty' => 0,
					'exclude' => '', 
					'number' => '0',
					'taxonomy' => 'category', 
					'pad_counts' => true
				);
				$categories = get_categories($args); 

				$images_raw = get_option( 'taxonomy_image_plugin' ); // получаем все изображения в виде массива
				$result = '';
				foreach ($categories as $category) { 
					$term_taxonomy_id = $category->term_taxonomy_id; // узнаем ID категории
					$term_taxonomy_name = $category->name; // узнаем имя категории
					$term_taxonomy_image = wp_get_attachment_image( $images_raw[ $term_taxonomy_id ], 'full' ); // получаем прикрепленное изображение
					$term_taxonomy_link = get_term_link((int)$term_taxonomy_id, 'category' ); // получаем ссылку на соответствующую рубрику

					$result .= '<div class="menu_inside"><a class="link-cat" href="'.$term_taxonomy_link.'">
						<div class="image_menu">'.$term_taxonomy_image.'</div>
						<p class="category-title">'.$term_taxonomy_name.'</p>
					</a></div>';
				}
				echo $result; // выводим сформированную ранее строку - рубрики с изображениями
			?>
		</div>

			<section>
				<div class="containers">
					<div class="row">
						<div id="content_zone" class="content_zone">
							<div class="ons_cart" style="max-width:1200px;display:block;margin:0 auto;">
								<?php if (have_posts()):
								echo '<div class="item_cart">';
									 while (have_posts()) : the_post();  ?>	
									<?php get_template_part('loop_menu'); ?>
									<?php endwhile; 
								echo '</div>';
									else: echo '<p>Раздел меню пуст.</p>'; endif;  ?>	 
								<?php pagination(); ?>						
							</div>
						</div>		
					</div>
				</div>
			</section>	

<?php } else {	?>
123
	<section>
		<div class="containers">
			<div class="row">
				<div id="content_zone" class="content_zone">
					<div class="ons">
						<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
						<?php get_template_part('loop'); ?>
						<?php endwhile; 
							else:
								echo category_description();
							endif;  ?>	 
						<?php pagination(); ?>						
					</div>
				</div>		
			</div>
		</div>
	</section>

<?php } ?>
<?php
if($_SERVER['REQUEST_URI'] =="/category/menu/napitki/") {?>
	
	<style>
	.cart_good_img {
		min-height: 0!important;
		height:0!important;
	}
	.cart_good {
		    height: 250px!important;
		
	}
	

.cart_good_img  .fon_bg2::after,
.cart_good_img  .fon_bg3::before  {
	background: none!important;
   
      
    
}
	</style>
	
<?}?>

<?php get_footer(); ?>