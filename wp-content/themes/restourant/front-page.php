<?php
/**
 * Страница с кастомным шаблоном (front-page.php)
 * @package WordPress
 * @subpackage restourant
 * Template Name: Главная страница
 */
get_header(); ?>
<section>
	<div class="containers">
		<div class="row">
			<div>
			<?php $bg_container =  get_field('bg_container');
				if ($bg_container == ''){
					$bg_container = '/wp-content/themes/restourant/img/main-bg.jpg';
				}
			?>
				<div class="main-bg" style="background:url(<?php echo $bg_container; ?>) no-repeat top center; background-size:cover;">
					<header>
						<div class="header">
							<div class="header-layout">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 phone">
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/phone.png" alt="">
									<?php $tel = get_theme_mod('phone', '<span>+7(4872)</span>&nbsp;&nbsp;25 97 25'); ?>
									<p><span>+7(963)</span>&nbsp;939 19 99<br/><?/*php echo $tel; */?><span>+7(4872)</span>&nbsp;25 97 25<br/>
										
									<a  href="#contact_callback" class="fancybox">Заказать звонок</a>
									</p>
											
									<div class="spec-block">
										<?
											$post_id_409 = get_post( 409 );
											$title = $post_id_409->post_title;
											$content = $post_id_409->post_content;	
											$thumb = get_the_post_thumbnail( 409, 'full ' );									
										?>
										<?php /*<div style="display:none;">
										<?php 
										$post_mass = get_post_meta( 409 );
										echo "<pre>";
										echo $post_mass["mytextinput"][0];
										echo "</pre>";
										?>
										</div>
										*/?>
                                   	<style>
										.spec-block__title_open {
											display: none;
										}
										.spec-block__img {
											display: none;
										}
										.spec-block__more {
											display: none;
										}
										.spec-block__title_ico {
											display: none;
										}
										.spec-block__title {
											display: none;
										}
										.spec-block__img {
											display: none;
										}
										.spec-block__hide.spec-block__hide_open {
												display: none;
											}
										.main_slider_nomers {
												display: none;
											}
										.main_slider_restoraunt {
												display: none;
											}
										.main-bg {
											min-height: 580px ;
										}
										.main_bron {
											margin-top: 35%!important;
										}
																					</style>
                                        
										<div class="spec-block__title spec-block__title_ico spec-block__title_open">ПРЕДЛОЖЕНИЯ<br>ДЛЯ ГУРМАНОВ</div>
											<div class="spec-block__hide spec-block__hide_open">
												<div class="spec-block__img">
													<div class="spec-block__img-wrapper">
														<?=$thumb;?>
													</div>
												</div>
												<div class="spec-block__text">
													<!--div class="spec-block__text-title"><?=$title?></div-->
													<span><?=$post_mass["mytextinput"][0]?></span>
													<?=$content;?>
												</div>											
											<a href="/category/offer/" class="spec-block__more">Узнать подробнее</a >
											</div>
                                        <div class="spec-block__title spec-block__title_ico">ПОДАРОЧНЫЙ<br>НАБОР</div>	
											<div class="spec-block__hide">
												<div class="spec-block__img">
													<div class="spec-block__img-wrapper">
														<img width="203" height="203" src="/wp-content/themes/restourant/img/nabor.jpg" class="attachment-full  size-full  wp-post-image" alt="Подарочный набор">
													</div>
												</div>
												<a href="/category/offer/" class="spec-block__more">Узнать подробнее</a >
											</div>
											<div class="spec-block__title _last">НОВОСТИ</div>	
											<div class="spec-block__hide _last">
												<div class="spec-block__img">
													<div class="spec-block__img-wrapper">
														<img width="203" height="203" src="/wp-content/themes/restourant/img/news.jpg" class="attachment-full  size-full  wp-post-image" alt="Новости">
													</div>
												</div>
												<a href="/category/news/" class="spec-block__more">Читать все новости</a >
											</div>
									</div>							
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 ons">
									<a href="/">
									<div class="since-index">1886</div>
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mainlogo.png" class="img-responsive text-center" alt="Бутик - отель Тургене" style="display:inline;"></a>
									<div class="main_bron" style="margin-top:45%;">
										<div class="forms">
											<a href="/booking/" title="Перейти к бронированию номера"><button class="brons">Забронировать номер</button></a>
										</div>		
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 adress-h">
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/geo.png" alt="Спуститься вниз">
									<?php $adress = get_theme_mod('adress', '300024, г. Тула, ул. Тургеневская, д. 13.');
										$adress = str_replace('Тула,', 'Тула<br/>', $adress);
									?>
									<p><?php echo $adress; ?></p>
								</div>
							</div>
						</div>
					</header>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/polzunok.png" alt="" class="polzunok">					
				</div>
				<div class="main_slider_restoraunt animateme scrollme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="-300">
					<?php echo do_shortcode('[metaslider id=40]')?>
					
				</div>
				<div id="main_slider_nomers" class="main_slider_nomers animateme scrollme" data-when="enter" data-from="0.75" data-to="0" data-opacity="0" data-translatex="300">
					<?php echo do_shortcode('[metaslider id=40]')?>
				</div>
				<div class="content_zone">
					<div class="ons">
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php the_content(); // контент ?>
							</article>
						<?php endwhile; ?>
					</div>	
				</div>
					<p class="h1"></p>
					<?php				
					query_posts('tag=show_menu&posts_per_page=8&order=DESC');
					$temp = 1;
					while (have_posts()) : the_post(); ?>
						<?php if ($temp == 1 || $temp == 5 ){
							echo '<div class="imgs-row ing-border">';
						} ?>
						
						<?php $temp++; 
						if ($temp == 1 || $temp == 5){
							echo '</div>';
						} ?>
					<?php endwhile; wp_reset_query();?>		
				</div>
							
				</div>
			</div>
		</div>
	</div>

</section>

<?php get_footer(); ?>