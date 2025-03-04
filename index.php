<?php get_header(); ?>
<div class="flex justify-center">
        <h1
          class="text-primary-green mb-6 text-sm lg:text-lg font-owners tracking-5p lh-64-ls-5"
        >
          NAUJIENOS
        </h1>
      </div>
	<div class="container mx-auto">

  <div class="flex flex-col lg:flex-row items-center lg:items-start justify-center px-9 lg:px-0 gap-10 pb-16 lg:pb-24 text-primary-green text-center text-xl">
    <?php wp_reset_query(); ?>
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="flex flex-col justify-center relative w-full lg:basis-1/4">
                <div class="relative">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img
                            src="<?php the_post_thumbnail_url(); ?>"
                            alt="<?php the_title_attribute(); ?>"
                            class="w-full h-full aspect-[16/10] object-cover clip-image"
                        />
                    <?php endif; ?>
                </div>
                <div class="text-center">
                    <p class="text-sm lg:text-lg pb-1 pt-4 lg:pt-6 font-owners tracking-5p lh-34-ls-5">
                        <?php echo get_the_date( 'Y.m.d' ); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="text-lg lg:text-3xl hover:underline tracking-5p lh-34-ls-5">
                        <p>
                            <?php the_title(); ?>
                        </p>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>




	</div>

<?php
get_footer();
