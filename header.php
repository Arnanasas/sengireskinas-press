<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-black text-primary-green antialiased'); ?>>

	<?php do_action('tailpress_site_before'); ?>

	<div id="page" class="min-h-screen flex flex-col">
		<div class="fixed inset-0 pointer-events-none z-50 bg-repeat"
			style="background-image: url('<?php echo get_template_directory_uri(); ?>/resources/images/dust.png'); opacity: 1">
		</div>
		<?php do_action('tailpress_header'); ?>

		<header id="site-header" class="sticky top-0 mt-8 left-0 w-full transition-all duration-300 z-50"
			style="background: none">
			<div class="container mx-auto flex flex-col items-center py-4 transition-all duration-300"
				style="color: #C8F27E;">
				<nav class="main-navigation md:text-lg text-primary-green w-full">
					<?php
					wp_nav_menu(
						array(
							'container_id' => 'primary-menu',
							'container_class' => 'nav-menu',
							'menu_class' => 'nav-menu',
							'theme_location' => 'primary',
							'li_class' => 'menu-item uppercase',
							'fallback_cb' => false,
						)
					);
					?>
				</nav>
				<div id="site-logo" class="flex justify-center pt-4 w-full">
					<img src="<?php echo get_template_directory_uri(); ?>/resources/images/logo.svg"
						alt="Sengires Kinas" class="normal-logo" />
				</div>
			</div>

		</header>


		<!-- <div id="content" class="site-content grow"> -->
		<main class="container mx-auto px-5 lg:px-0 pt-24" id="main-content">