
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer
      class="container mx-auto px-5 lg:px-0 pt-10 lg:pt-16 pb-9 font-owners tracking-5p" role="contentinfo"
    >
      <h2 class="text-primary-green text-sm lg:text-lg">DRAUGAI</h2>
      <img
        src="<?php echo get_template_directory_uri(); ?>/resources/images/line.png"
        alt="Line"
        class="mt-2 lg:mt-4 mb-6 lg:mb-8 w-full"
      />

      <div class="flex flex-col lg:flex-row pb-16 lg:pb-20 text-primary-green">
	  <div class="flex flex-row gap-10 lg:gap-20 pb-9 lg:pb-0 pr-16 lg:pr-0">

	  <?php if( have_rows('partners_section', 'option') ): ?>
          <?php while( have_rows('partners_section', 'option') ): the_row(); 
              $partner_logo = get_sub_field('partner_logo');
              $partner_logo_url = $partner_logo['url'];
              $partner_logo_alt = $partner_logo['alt'];
            ?>
          <div>
            <img
              src="<?php echo esc_url($partner_logo_url); ?>"
              alt="<?php echo esc_attr($partner_logo_alt); ?>"
            />
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
	  </div>
        <div class="lg:ml-auto lg:text-right">
          <p class="text-primary-green text-xs">
            Dizainas: Ugnė Balčiūnaitė<br />
            Svetainės dizainas: <a href="https://westcoast.lt" class="hover:underline" target="_blank">Edmundas Stundžius</a><br />
            Programavimas: <a href="https://demesysmulkmenai.lt" class="hover:underline" target="_blank">Dėmesys Smulkmenai</a>
          </p>
        </div>
      </div>

      <div class="flex flex-col lg:flex-row">
        <div class="text-primary-green lg:w-2/5 order-2 lg:order-1">
          <div class="flex flex-row gap-4 pb-5 lg:pb-6">
            <a href="<?php the_field('facebook_link', 'option'); ?>" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/resources/images/facebook.svg" alt="Facebook" /> </a>
            <a href="<?php the_field('instagram_link', 'option'); ?>" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/resources/images/instagram.svg" alt="Instagram" /> </a>
          </div>
          <div class="flex flex-col leading-none">
            <div>
              <a
                href="tel:<?php the_field('phone_number', 'option'); ?>"
                class="text-sm lg:text-lg hover:underline"
                ><?php the_field('phone_number', 'option'); ?></a
              >
            </div>
            <div>
              <a
                href="mailto:<?php the_field('email', 'option'); ?>"
                class="text-sm lg:text-lg hover:underline uppercase"
              >
                <?php the_field('email', 'option'); ?>
              </a>
            </div>
          </div>
        </div>

        <div class="lg:w-3/5 order-1 lg:order-2">
          <p class="text-primary-green text-sm lg:text-lg pb-8">
            NAUJIENLAIŠKIS:
          </p>
        </div>
      </div>
    </footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
