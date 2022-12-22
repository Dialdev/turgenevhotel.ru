<?php
/**
 * Шаблон поиска (search.php)
 * @package WordPress
 * @subpackage turgenev
 */
get_header(); // подключаем header.php ?> 
<section>
	<div class="containers">
		<div class="row">
		<?php $i = 1;?>
		<?php get_template_part('heads'); ?>
		<?$i = 1;?>
		<div class="search-center">
		<h1>Поиск по: "<?php echo $_GET['s'];?>"</h1>
		<div class="search-col">
		 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		 <a class="search-block" href="<?php the_permalink();?>"><?php echo $i++ . ")" . " "; the_title(); ?></a>
		 <?php endwhile; else: ?>
		 <p>Поиск не дал результатов.</p>
		 <?php endif;?>
		 </div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); // подключаем footer.php ?>