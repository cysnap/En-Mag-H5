<!DOCTYPE html>
<html lang="en_US">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<title><?php if(is_single() || is_page() || is_archive() || is_404() || is_search()) : wp_title('_',true,'right'); endif; bloginfo('name'); if(is_front_page()) : echo " - "; echo bloginfo('description'); endif;  if( $paged == "" ) $pagenum = "";else echo $pagenum = " - Page: ".$paged; ?></title>
	<link rel="apple-touch-icon" href="/iOS_icon.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<?php if(is_home() && !is_paged()) :?>
		<meta name="description" content="<?php echo bloginfo('description'); ?>" />
		<?php endif; if(is_single()) :?>
		<meta name="description" content="<?php echo mb_substr(strip_tags($post->post_content),0,120); ?>" />
		<?php endif; if(is_category() && !is_paged()) :?>
		<meta name="description" content="<?php echo strip_tags(category_description()); ?>" />
	<?php endif;?>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url');_e('?');echo(date('Ynj', time()));?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/functions.js"></script>
	<?php wp_head(); ?>
</head>

<body>

<header>
	<div class="nova-l-h">
			<div class="nova-l"><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.gif" class="logo" alt="<?php bloginfo('name'); ?>" /></a></div>
			<div class="flat_image">
				<ul>
					<?php wp_reset_query(); ?>
					<?php query_posts($query_string . 'meta_key=flat_image&posts_per_page=3'); ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img alt="<?php the_title(); ?>" src="<?php $key="flat_image"; echo get_post_meta($post->ID, $key, true); ?>&w=182&h=100&crop-to-fit"/>
						<span><?php the_title(); ?></span></a>
					</li>
					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>
				</ul>
			</div>
			<div class="clearfix"></div>
	</div>
	<div class="nav">
		<nav>
			<?php $h5menu = wp_nav_menu(array('theme_location'=>'header-menu','container'=>false,'items_wrap'=>'%3$s','echo'=>false,)); $find=array('><a','</a>','li'); $replace=array('','','a'); echo str_replace($find,$replace,$h5menu);?>
			<div class="search">
			<?php if (!is_search()) {$search_text = "Search";} else {$search_text = "$s";} ?>
				<form method="get" class="searchform" name="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<input type="text" class="search-input nova-l" size="24" value="Search" name="s" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" />
				</form>
			</div>
		</nav>
	</div>
</header>

<main>
	<div class="content">
