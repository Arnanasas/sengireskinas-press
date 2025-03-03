<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<main class="article mx-auto px-5 md:px-0 md:w-1/2 xl:max-w-[660px]">
<div class="flex justify-center pt-4">

		<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700 text-primary-green mb-6 lg:mb-8 text-sm lg:text-lg hover:underline font-owners tracking-5p"><?php echo get_the_date( 'Y.m.d' ); ?></time>
      </div>

      <div
        class="flex justify-center flex-col relative text-primary-green text-center text-xl"
      >
        <div class="relative">
			<?php if ( has_post_thumbnail() ) : ?>
				<img
					src="<?php the_post_thumbnail_url(); ?>"
					alt="<?php the_post_thumbnail_caption(); ?>"
					class="w-full h-full object-cover aspect-[16/10] clip-image"
				/>
			<?php endif; ?>
        </div>
        <div
          class="pt-5 lg:pt-8 pb-8 lg:pb-12 text-medium lg:text-large leading-none"
        >
		<?php the_title( sprintf( '<h1 class=""><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

        </div>
      </div>


	<div class="text-primary-green text-sm lg:text-lg font-owners tracking-5p entry-content">
		<?php the_content(); ?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
		?>
	</div>
</main>
</article>
