<?php get_header(); ?>
<main class="container mx-auto px-5 lg:px-0 pb-10">
      <h1
        class="text-primary-green text-center text-sm lg:text-lg pb-6 lg:pb-10 font-owners tracking-5p"
      >
        LOKACIJOS
      </h1>

      <div
      class="text-primary-green leading-tight text-center text-lg lg:text-3xl lg:px-32 xl:px-80 tracking-5p"

      >
        <?php the_content(); ?>
</div>

      <div class="py-8 lg:py-16">
	  	<?php echo do_shortcode('[library_map]'); ?>
      </div>

      <ul
        class="font-owners text-primary-green text-center text-xs lg:text-lg tracking-5p"
      >
        <?php
        $args = array(
            'post_type' => 'bibliotekos',
            'posts_per_page' => -1
        );
        $bibliotekos_query = new WP_Query($args);

        if ($bibliotekos_query->have_posts()) :
            while ($bibliotekos_query->have_posts()) : $bibliotekos_query->the_post();
                $website = get_post_meta(get_the_ID(), 'website', true);
        ?>
                <li>
                    <?php if ($website) : ?>
                        <a href="<?php echo esc_url($website); ?>" class="hover:underline" target="_blank" rel="noopener noreferrer">
                            <?php the_title(); ?>
                        </a>
                    <?php else : ?>
                        <?php the_title(); ?>
                    <?php endif; ?>
                </li>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
      </ul>
    </main>

<?php
get_footer();
