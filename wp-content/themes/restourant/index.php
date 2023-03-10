<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage restourant
 */
get_header(); ?> 
<section>
	<div class="containers">
		<div class="row">
			<div class="content_zone">
				<div class="ons">
					<h1><?php
						if (is_day()) : printf('Daily Archives: %s', get_the_date());
						elseif (is_month()) : printf('Monthly Archives: %s', get_the_date('F Y'));
						elseif (is_year()) : printf('Yearly Archives: %s', get_the_date('Y'));
						else : 'Archives';
					endif; ?></h1>
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