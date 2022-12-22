<?php
/**
 * Страница с кастомным шаблоном (contact.php)
 * @package WordPress
 * @subpackage restourant
 * Template Name: Контакты
 */
get_header(); ?>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script>
        ymaps.ready(init);
		adress = jQuery('li.adr').text();
        function init() {
			var map = new ymaps.Map("map", {
				center: [54.190151, 37.618228],
				zoom: 14,
				controls: ['largeMapDefaultSet']
			});
			var placemark = new ymaps.Placemark([54.190151, 37.618228], {
				balloonContentBody: 'Россия, Тула, Тургеневская улица, 13',
				placemarkName: 'Тургеневская улица, 13'
			});
			map.geoObjects.add(placemark);
        }
      </script>
<section>
	<div class="containers">
		<div class="row">
			<?php get_template_part('heads'); ?>
			<div id="content_zone" class="content_zone">
				<div class="ons">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_content(); ?>
						</article>
					<?php endwhile; // конец цикла ?>
				</div>
			</div>		
		</div>
	</div>
</section>
<?php get_footer(); ?>