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
	$catlist = get_categories('parent='.$current_cat.'');
	
	// echo $current_cat;
	// echo $id_par;
	// print_r($catlist);
?>
<?php if (is_category(array(3)) || $id_par == 3){ ?>

		

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
									else: echo '
<div class="ons_cart" style="max-width:1200px;display:block;margin:0 auto;">
<div class="item_cart">

  <div id="" class="cart_good" style="height: 450px;">
    <div class="cart_good_img">
      <div class="fon_bg"> 
        <div class="fon_bg2">  
          <div class="fon_bg3">  
            <a rel="gallery-0" href="/nomera-standard-suite/" class="image hover">
                <div class="hover_blok"><div class="fon_hover"></div><img class="img_blok" src="/wp-content/uploads/2021/06/standardSuite.jpg"><div><span>Подробнее</span></div></div>
              <img width="300" height="200" src="/wp-content/uploads/2021/06/standardSuite.jpg" alt="">
            </a>              
          </div>
        </div>
      </div>
    </div>
    <p class="cart_good_title">Номера «Standard Suite»</p>
    <div class="cart_good_content"></div>
    <img srchttps://turgenevhotel.ru/wp-admin/admin.php?page=metaslider="http://restoran-turgenev.ru/wp-content/themes/restourant/img/thumb_cart_item.jpg" alt="">
  </div>

  <div id="" class="cart_good" style="height: 450px;">
    <div class="cart_good_img">
      <div class="fon_bg"> 
        <div class="fon_bg2">  
          <div class="fon_bg3">  
            <a rel="gallery-0" href="/nomera-executive-suite/" class="image hover">
              <div class="hover_blok"><div class="fon_hover"></div>
                <img class="img_blok" src="/wp-content/uploads/2021/06/executiveSuite.jpg"><div><span>Подробнее</span></div></div>
              <img width="300" height="200" src="/wp-content/uploads/2021/06/executiveSuite.jpg" alt="">
            </a>                 
          </div>
        </div>
      </div>
    </div>
    <p class="cart_good_title">Номера «Executive Suite»</p>
    <div class="cart_good_content"></div>
    <img src="http://restoran-turgenev.ru/wp-content/themes/restourant/img/thumb_cart_item.jpg" alt="">
  </div>

  <div id="" class="cart_good" style="height: 450px;">
    <div class="cart_good_img">
      <div class="fon_bg"> 
        <div class="fon_bg2">  
          <div class="fon_bg3">  
            <a rel="gallery-0" href="/nomera-s-uglovoj-vannoj/" class="image hover">
              <div class="hover_blok"><div class="fon_hover"></div><img class="img_blok" src="/wp-content/uploads/2021/06/Executive-Suitee.jpg"><div><span>Подробнее</span></div></div>
              <img width="300" height="200" src="/wp-content/uploads/2021/06/Executive-Suite.jpg" alt="">
            </a>                 
          </div>
        </div>
      </div>
    </div>
    <p class="cart_good_title">Номера «Executive Suite с угловой ванной»</p>
    <div class="cart_good_content"></div>
    <img src="http://restoran-turgenev.ru/wp-content/themes/restourant/img/thumb_cart_item.jpg" alt="">
  </div>

    <div id="" class="cart_good" style="height: 450px;">
    <div class="cart_good_img">
      <div class="fon_bg"> 
        <div class="fon_bg2">  
          <div class="fon_bg3">  
            <a rel="gallery-0" href="/nomera-junior-suite/" class="image hover">
                            <div class="hover_blok"><div class="fon_hover"></div><img class="img_blok" src="/wp-content/uploads/2021/06/juniorSuite.jpg"><div><span>Подробнее</span></div></div>
              <img width="300" height="200" src="/wp-content/uploads/2021/06/juniorSuite.jpg" alt="">
            </a>                 
          </div>
        </div>
      </div>
    </div>
    <p class="cart_good_title">Номера «Junior Suite»</p>
    <div class="cart_good_content"></div>
    <img src="http://restoran-turgenev.ru/wp-content/themes/restourant/img/thumb_cart_item.jpg" alt="">
  </div>

    <div id="" class="cart_good" style="height: 450px;">
    <div class="cart_good_img">
      <div class="fon_bg"> 
        <div class="fon_bg2">  
          <div class="fon_bg3">  
            <a rel="gallery-0" href="/turgenevhotel.ru/nomer-suite/" class="image hover">
                            <div class="hover_blok"><div class="fon_hover"></div><img class="img_blok" src="/wp-content/uploads/2021/06/Suite-3.jpg"><div><span>Подробнее</span></div></div>
              <img width="300" height="200" src="/wp-content/uploads/2021/06/Suite-3.jpg" alt="">
            </a>                 
          </div>
        </div>
      </div>
    </div>
    <p class="cart_good_title">Номер «Suite»</p>
    <div class="cart_good_content"></div>
    <img src="http://restoran-turgenev.ru/wp-content/themes/restourant/img/thumb_cart_item.jpg" alt="">
  </div>

    <div id="" class="cart_good" style="height: 450px;">
    <div class="cart_good_img">
      <div class="fon_bg"> 
        <div class="fon_bg2">  
          <div class="fon_bg3">  
            <a rel="gallery-0" href="/turgenevhotel.ru/nomer-president-suite-s-kabinetom-9/" class="image hover">
                            <div class="hover_blok"><div class="fon_hover"></div><img class="img_blok" src="/wp-content/uploads/2021/06/President-Suite.jpg"><div><span>Подробнее</span></div></div>
              <img width="300" height="200" src="/wp-content/uploads/2021/06/President-Suite.jpg" alt="">
            </a>                 
          </div>
        </div>
      </div>
    </div>
    <p class="cart_good_title">НОМЕР «PRESIDENT SUITE С КАБИНЕТОМ №9»</p>
    <div class="cart_good_content"></div>
    <img src="http://restoran-turgenev.ru/wp-content/themes/restourant/img/thumb_cart_item.jpg" alt="">
  </div>

    <div id="" class="cart_good" style="height: 450px;">
    <div class="cart_good_img">
      <div class="fon_bg"> 
        <div class="fon_bg2">  
          <div class="fon_bg3">  
            <a rel="gallery-0" href="/turgenevhotel.ru/nomer-president-suite-15/" class="image hover">
                            <div class="hover_blok"><div class="fon_hover"></div><img class="img_blok" src="/wp-content/uploads/2021/06/DSC.jpg"><div><span>Подробнее</span></div></div>
              <img width="300" height="200" src="/wp-content/uploads/2021/06/DSC.jpg" alt="">
            </a>                 
          </div>
        </div>
      </div>
    </div>
    <p class="cart_good_title">
НОМЕР «PRESIDENT SUITE № 15»</p>
    <div class="cart_good_content"></div>
    <img src="http://restoran-turgenev.ru/wp-content/themes/restourant/img/thumb_cart_item.jpg" alt="">
  </div>

      <div id="" class="cart_good" style="height: 450px;">
    <div class="cart_good_img">
      <div class="fon_bg"> 
        <div class="fon_bg2">  
          <div class="fon_bg3">  
            <a rel="gallery-0" href="/turgenevhotel.ru/nomer-president-suite-s-verandoj-16/" class="image hover">
                            <div class="hover_blok"><div class="fon_hover"></div><img class="img_blok" src="/wp-content/uploads/2021/06/DSC2.jpg"><div><span>Подробнее</span></div></div>
              <img width="300" height="200" src="/wp-content/uploads/2021/06/DSC2.jpg" alt="">
            </a>                 
          </div>
        </div>
      </div>
    </div>
    <p class="cart_good_title">НОМЕР «PRESIDENT SUITE с верандой №16»</p>
    <div class="cart_good_content"></div>
    <img src="http://restoran-turgenev.ru/wp-content/themes/restourant/img/thumb_cart_item.jpg" alt="">
  </div>

     

</div>   
</div>
									'; endif;  ?>	 
								<?php pagination(); ?>						
							</div>
						</div>		
					</div>
				</div>
			</section>	

<?php } elseif (is_category(array(4))) {?>

		
			
<?php } elseif (($id_par == 4) || ($id_par == 51)|| ($id_par == 50) || ($id_par == 52) || ($id_par == 53)) {?>
<div class="menu_parent">
	
	<?php 
	if (!empty($catlist)){
		$need_id = get_query_var('cat');
	} else {
		$need_id = $id_par;
	}
	
	?>
	
	<?php 
	
		$args = array(
			'parent' => $need_id,
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
	
<?php } /*elseif (($id_par == 50) || ($id_par == 51) || ($id_par == 52) || ($id_par == 53)) {?>
<div class="menu_parent">	
	<?php 
		$args = array(
			'parent' => $id_par,
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

<?php }*/ else{ ?>
	
<?php } ?>
<?php
if (($_SERVER['REQUEST_URI'] =="/category/menu/napitki/") || ($_SERVER['REQUEST_URI'] =="/category/menu/vinnaya-karta/")) {?>
	
	<style>
	.cart_good_img {
		min-height: 0!important;
		height:0!important;
	}
	.cart_good {
		    height: 285px!important;
		
	}
	

.cart_good_img  .fon_bg2::after,
.cart_good_img  .fon_bg3::before  {
	background: none!important;
   
      
    
}
	</style>
	
<?}?>

<?php get_footer(); ?>