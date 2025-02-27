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
		<?php if (!is_single()): ?>
			<div class="fixed inset-0 pointer-events-none z-50 bg-repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/resources/images/dust.png'); opacity: 1;   background-size: contain;
  background-position: center;
  background-repeat: no-repeat;">
			</div>
		<?php endif; ?>
		<?php do_action('tailpress_header'); ?>

		<?php if (!is_front_page()): ?>
			<header id="site-header" class="fixed top-0 left-0 w-full h-[80px] z-50" style="background: none">
				<div class="container mx-auto flex flex-col items-center py-4 h-[80px] " style="color: #C8F27E;">
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
					<?php if (is_front_page() || is_page('pagrindinis')): ?>
						<div id="site-logo" class="flex justify-center pt-2 w-full px-2 md:px0 md:w-[831px]">
							<a href="<?php echo home_url('/pagrindinis'); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/resources/images/logo.svg"
									alt="Sengires Kinas" class="w-[831px]" />
							</a>
						<?php else: ?>
							<a href="<?php echo home_url('/pagrindinis'); ?>">
								<img id="site-logo-not-moving"
									src="<?php echo get_template_directory_uri(); ?>/resources/images/logo.svg"
									alt="Sengires Kinas" class=" w-[150px]" />
							</a>
						</div>
					<?php endif; ?>
					<!-- </div> -->
			</header>
		<?php endif; ?>


		<main
			class="container mx-auto px-5 lg:px-0 pt-[280px] <?php echo (is_page('pakeisti i pagrindini') || is_page('pagrindinis')) ? 'md:pt-[550px]' : 'md:pt-[180px]'; ?>"
			id="main-content">