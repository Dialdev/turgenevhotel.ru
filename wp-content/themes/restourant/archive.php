<?php
/**
 * Страница архивов записей (archive.php)
 * @package WordPress
 * @subpackage restourant
 */
<style>
get_header(); ?> 

<section>
	<div class="containers">
		<div class="row">
			<div id="content_zone" class="content_zone">
				<div class="ons">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('loop'); ?>
					<?php endwhile;
					else: echo '<p>Нет записей.</p>'; endif; ?>	 
					<?php pagination(); ?>
				</div>
			</div>		
		</div>
	</div>
</section>
<?php get_footer(); ?>