<?php get_header(); ?>


<div class="text-primary-green text-center leading-tight! pb-20 text-lg lg:text-3xl lg:max-w-[831px] mx-auto tracking-5p entry-content">
	<?php the_content(); ?>
</div>

<h1
        class="text-primary-green text-center mb-6 lg:mb-14 text-sm lg:text-lg font-owners tracking-5p"
      >
        ARTIMIAUSIAS SENGIRĖS KINAS
      </h1>

      <?php
      $args = array(
          'post_type' => 'renginiai',
          'posts_per_page' => 2,
          'meta_key' => 'movie_date',
          'orderby' => 'meta_value',
          'order' => 'ASC',
          'meta_query' => array(
              array(
                  'key' => 'movie_date',
                  'value' => date('Ymd'),
                  'compare' => '>=',
                  'type' => 'DATE'
              )
          )
      );
      $renginiai_query = new WP_Query($args);
      $image_class_toggle = true;

      if ($renginiai_query->have_posts()) :
      ?>
      <div
        class="flex flex-col lg:flex-row justify-center lg:items-start gap-14 lg:gap-10 mb-20 lg:mb-36 text-primary-green text-center text-xl"
      >
        <?php while ($renginiai_query->have_posts()) : $renginiai_query->the_post(); ?>
        <div class="flex justify-center flex-col lg:w-1/2 relative">
          <div class="relative">
            <?php if (has_post_thumbnail()) : ?>
              <img
                src="<?php the_post_thumbnail_url(); ?>"
                alt="<?php the_title_attribute(); ?>"
                class="object-cover aspect-[16/10 <?php echo $image_class_toggle ? 'clip-image' : 'clip-image2'; ?>"
              />
            <?php endif; ?>
          </div>
          <div class="pt-4 text-medium lg:text-large leading-none">
            <p><?php the_field('movie_date'); ?></p>
            <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
          </div>
        </div>
        <?php 
          $image_class_toggle = !$image_class_toggle;
          endwhile; 
          wp_reset_postdata(); 
        ?>
      </div>
      <?php endif; ?>
	  <div class="flex justify-center">
        <a
          href="<?php echo get_permalink(get_option('page_for_posts')); ?>"
          class="text-primary-green mb-6 lg:mb-24 text-sm lg:text-lg hover:underline font-owners tracking-5p"
        >
          NAUJIENOS
        </a>
      </div>
	  <div
        class="flex flex-col lg:flex-row items-center lg:items-start justify-center px-9 lg:px-0 gap-10 pb-16 lg:pb-24 text-primary-green text-center text-xl"
      >
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4
        );
        $query = new WP_Query($args);
        $image_class_toggle = true; // To toggle between clip-image1 and clip-image2

        while ($query->have_posts()) : $query->the_post();
            $image_class = $image_class_toggle ? 'clip-image' : 'clip-image2';
            $image_class_toggle = !$image_class_toggle;
        ?>
        <div class="flex justify-center flex-col lg:w-1/4 relative">
          <div class="relative">
            <?php if (has_post_thumbnail()) : ?>
              <img
                src="<?php the_post_thumbnail_url(); ?>"
                alt="<?php the_title_attribute(); ?>"
                class="w-full h-full object-cover aspect-[16/10] <?php echo $image_class; ?>"
              />
            <?php endif; ?>
          </div>
          <div class="text-center">
            <p
              class="text-sm lg:text-lg pb-1 pt-4 lg:pt-6 font-owners tracking-5p"
            >
              <?php echo get_the_date('Y.m.d'); ?>
            </p>
            <a href="<?php the_permalink(); ?>" class="text-lg lg:text-3xl hover:underline tracking-5p">
              <p class="leading-tight">
                <?php the_title(); ?>
              </p>
            </a>
          </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
	  <h1
        class="text-primary-green text-center text-sm lg:text-lg font-owners tracking-5p"
      >
        LOKACIJOS
      </h1>
	  <div class="pt-6 lg:py-12">

	  	<?php echo do_shortcode('[library_map]'); ?>
	  </div>
<?php
get_footer();
