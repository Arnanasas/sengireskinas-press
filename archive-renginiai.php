<?php get_header(); ?>
<div class="flex justify-center">
        <h1
          class="text-primary-green mb-6 lg:mb-16 text-sm lg:text-lg font-owners tracking-5p"
        >
          Renginiai
        </h1>
      </div>
	<div class="container my-8 mx-auto">

    <div
        class="grid lg:grid-rows-2 lg:grid-cols-2 grid-cols-1 items-center lg:items-start justify-center lg:gap-y-28 gap-14 text-primary-green text-center text-xl"
      >
        <?php
        $args = array(
            'post_type' => 'renginiai',
            'posts_per_page' => -1,
            'meta_key' => 'movie_date',
            'orderby' => 'meta_value',
            'order' => 'ASC'
        );
        $renginiai_query = new WP_Query($args);
        if ($renginiai_query->have_posts()) :
            while ($renginiai_query->have_posts()) : $renginiai_query->the_post();
        ?>
        <div class="flex justify-center flex-col relative">
          <div class="relative">
            <?php if (has_post_thumbnail()) : ?>
              <img
                src="<?php the_post_thumbnail_url(); ?>"
                alt="<?php the_title_attribute(); ?>"
                class="w-full h-full object-cover <?php echo ($renginiai_query->current_post % 2 == 0) ? 'clip-image' : 'clip-image2'; ?>"
              />
            <?php endif; ?>
          </div>
          <div class="pt-4 text-medium lg:text-large leading-none">
            <p><?php the_field('movie_date'); ?></p>
            <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
          </div>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
      </div>

	</div>

<?php
get_footer();
