<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage restourant
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="icon" href="https://restoran-turgenev.ru/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="https://restoran-turgenev.ru/favicon.ico" type="image/x-icon" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/slick/slick-theme.css"/>

<!--Start_code-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-181133849-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-181133849-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
   ym(42628189, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/42628189" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!--End_code-->
	 <!--[if lt IE 9]>
	 <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <![endif]-->
	
	<title><?php typical_title(); ?></title>
	<?php wp_head(); ?>
    <?php /*отключены warning php  сообщения файл wp-config строка 90*/ ?>
</head>
<body <?php body_class(); ?>>
	<div class="pages">
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
		<div class="pages-layout 455">
			<div id="inners" class="inners">
			<?php if( !is_front_page() ) {
			   
			    $bg_container =  get_field('bg_container');
				if ($bg_container == ''){
					$bg_container = '/wp-content/uploads/2016/10/main-bg.jpg';
				}
			?>	
			
			<div style="background:url('<?php echo $bg_container ?>') no-repeat center center;" class="other-bg">
				<header>
					<div class="header">
						<div class="header-layout">
							<div class="phone">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/phone.png" alt="">
								<p><span>+7(4872)</span>&nbsp;25 97 25<?php/* echo get_theme_mod('phone', '<span>+7(4872)</span> 25 97 25'); */?><br/>
								<span>+7(963)</span>&nbsp;939 19 99<br>
								<a href="#contact_callback"  class="fancybox">Заказать звонок</a>
								</p>
							</div>
							<div class="header-page-logo">
								<a href="/">
								<div class="since-index">1886</div>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/mainlogo.png" alt=""></a>
							</div>
							<div class="adress-h">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/geo.png" alt="">
								<?php $adress = get_theme_mod('adress', '300024, г. Тула, ул. Тургеневская, д. 13.');
									$adress = str_replace('Тула,', 'Тула<br/>', $adress);
								?>
								<p><?php echo $adress; ?></p>
							</div>
						</div>
					</div>
				</header>
				<div class="zagolovok">
					<?php if( is_single() || is_page()){ ?>
						<h1><?php the_title();	?></h1>
					<?php }?>
					<h1><?php single_cat_title(); ?></h1>
					<p><?//php echo get_bloginfo('description');?></p>
				</div>
				<div class="breadcrumbs"><?php if(function_exists('bcn_display')){ bcn_display(); } ?></div>
			</div>	
			   
			<?php } ?>