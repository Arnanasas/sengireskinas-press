<?php get_header(); ?>
<div class="flex justify-center">
        <h1
          class="text-primary-green mb-6 lg:mb-16 text-sm lg:text-lg font-owners tracking-5p pt-4"
        >
          NAUJIENOS
        </h1>
      </div>
	<div class="container my-8 mx-auto">

    <div
        class="grid lg:grid-rows-2 lg:grid-cols-4 grid-cols-1 px-9 lg:px-0 items-center lg:items-start justify-center lg:gap-y-32 gap-10 pb-16 text-primary-green text-center text-xl"
      >
      <?php wp_reset_query(); ?>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="flex justify-center flex-col relative">
                  <div class="relative">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img
                          src="<?php the_post_thumbnail_url(); ?>"
                          alt="<?php the_title_attribute(); ?>"
                          class="w-full h-full object-cover clip-image"
                        />
                    <?php endif; ?>
                  </div>
                  <div class="text-center">
                    <p
                      class="text-sm lg:text-lg pb-1 pt-4 lg:pt-6 font-owners tracking-5p"
                    >
                      <?php echo get_the_date( 'Y.m.d' ); ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="text-lg lg:text-3xl hover:underline tracking-5p">
                      <p class="leading-tight">
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
