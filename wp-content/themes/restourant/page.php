<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage restourant
 */
get_header(); ?>
<section>
	<div class="containers">
		<div class="row">
			<?php get_template_part('heads'); ?>
			<div id="content_zone" class="content_zone">
				<div class="ons">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
							<h1><?php //the_title(); ?></h1>
							<?php the_content(); ?>
						</article>
					<?php endwhile; // конец цикла ?>
				</div>
			</div>		
		</div>
	</div>
</section>
<?php get_footer(); ?>