<?php
get_header();
?>

<main class="container mx-auto px-5 lg:px-0 pt-4 overflow-x-hidden">
      <div
        class="flex justify-center mx-auto flex-col lg:w-1/2 relative text-primary-green text-center pt-4 pb-12 lg:pb-20"
      >
        <div class="relative">
          <img
            src="<?php the_post_thumbnail_url('full'); ?>"
            alt="Forest"
            class="w-full h-full object-cover aspect-[16/10] clip-image2"
          />
        </div>
        <div class="pt-4 lg:pt-6 text-medium lg:text-large leading-none lh-60-ls-0">
          <span> <?php the_field('movie_date'); ?> </span>
          <p> <?php the_title(); ?> </p>
        </div>
        <p
          class="text-primary-green leading-tight text-center text-lg lg:text-3xl tracking-5p pt-5 lg:pt-6 lh-34-ls-5"
        >
          <?php the_field('movie_intro'); ?>
        </p>
      </div>

      <div class="lg:mx-72 text-primary-green">
        <h1 class="text-center mb-6 text-sm lg:text-lg font-owners tracking-5p lh-64-ls-5">
          FILMAS
        </h1>
        <p class="text-center pb-4 text-medium lg:text-large uppercase lh-62-ls-2"><?php the_field('movie_title'); ?></p>
        <p
          class="text-center text-lg lg:text-3xl tracking-5p pb-7 lg:pb-8 leading-tight lh-24-ls-5"
        >
          <?php the_field('genre'); ?>
          <br /><?php the_field('rezisierius'); ?>  
        </p>
        <p class="text-center text-sm lg:text-lg font-owners tracking-5p lh-24-ls-5">
          <?php if (get_field('prodiuseris')) : ?>
            Prodiuseris: <?php the_field('prodiuseris'); ?><br />
          <?php endif; ?>
          <?php if (get_field('operatorius')) : ?>
            Operatorius: <?php the_field('operatorius'); ?><br />
          <?php endif; ?>
          <?php if (get_field('montazas')) : ?>
            Montažas: <?php the_field('montazas'); ?><br />
          <?php endif; ?>
          <?php if (get_field('garsas')) : ?>
            Garsas: <?php the_field('garsas'); ?><br />
          <?php endif; ?>
          <?php if (get_field('garso_dizainas')) : ?>
            Garso dizainas: <?php the_field('garso_dizainas'); ?><br />
          <?php endif; ?>
          <?php if (get_field('scenarijus')) : ?>
            Scenarijus: <?php the_field('scenarijus'); ?><br />
          <?php endif; ?>
          <div class="text-center text-sm lg:text-lg font-owners tracking-5p pt-4 entry-content lh-24-ls-5">
          <?php the_content(); ?>
          </div>
        </p>
      </div>

      <div class="article-container mb-12 lg:mb-24">
        <div
          class="container mx-auto font-owners tracking-5p text-sm lg:text-lg text-primary-green"
        >
          <div class="w-full">
            <div class="swiper">
              <div class="mb-1 lg:mb-4 flex items-center justify-between">
                <div>
                  <h3 class="">FILMO NUOTRAUKOS</h3>
                </div>
                <div>
                  <p class="button-prev mr-5 inline cursor-pointer">&lt;</p>
                  <p class="mr-5 inline slide-count">1 / 34</p>
                  <p class="button-next inline cursor-pointer">&gt;</p>
                </div>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/resources/images/line.png" alt="Line" class="mb-8 w-full" />

              <div class="swiper-wrapper flex">
                <?php if (have_rows('image_section')) : ?>
                  <?php $i = 0; ?>
                  <?php while (have_rows('image_section')) : the_row(); 
                    $image = get_sub_field('image');
                    if ($image) :
                      $image_url = $image['url'];
                      $class = ($i % 2 == 0) ? 'clip-image' : 'clip-image2';
                  ?>
                    <div class="swiper-slide">
                      <div class="relative">
                        <img
                          src="<?php echo esc_url($image_url); ?>"
                          alt="Forest"
                          class="w-full max-h-[500px] aspect-[16/10] object-contain <?php echo $class; ?>"
                        />
                      </div>
                    </div>
                    <?php $i++; ?>
                  <?php endif; ?>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div
        class="flex justify-center mx-auto flex-col lg:w-1/2 relative text-primary-green text-center pb-12 lg:pb-24"
      >
        <h3
          class="text-center mb-6 lg:mb-8 text-sm lg:text-lg font-owners tracking-5p lh-64-ls-5"
        >
          FILMO TREILERIS
        </h3>
        <div class="relative mb-12 lg:mb-16">
          <div class="iframe-wrapper">
            <iframe
              src="<?php the_field('youtube_iframe'); ?>"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin"
              allowfullscreen
            ></iframe>
          </div>
        </div>
        <?php if (get_field('mokomoji_medziaga')) : ?>
        <h3
          class="text-center mb-6 text-sm lg:text-lg font-owners tracking-5p lh-64-ls-5"
        >
          MOKOMOJI MEDŽIAGA
        </h3>
        <?php endif; ?>
        <p
          class="text-center text-lg lg:text-3xl tracking-5p leading-tight mb-5 lg:mb-7 lh-34-ls-5"
        >
          <?php the_field('mokomoji_medziaga'); ?>
        </p>
        <?php if (have_rows('medziaga_section')) : ?>
          <?php while (have_rows('medziaga_section')) : the_row(); 
            $file = get_sub_field('medziaga');
            if ($file) :
              $file_url = $file['url'];
              $file_size = size_format(filesize(get_attached_file($file['ID'])));
          ?>
            <a
              href="<?php echo esc_url($file_url); ?>"
              target="_blank"
              class="text-center text-sm lg:text-lg font-owners tracking-5p hover:underline"
            >
              PARSISIŲSTI (<?php echo $file_size; ?> PDF)
            </a>
          <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <?php 
    $back_url = get_post_meta(get_the_ID(), 'back_button_url', true); 
    if (!$back_url) {
        $back_url = 'javascript:history.back();'; // Fallback to browser back if no custom field is set
    }
?>
<div class="text-center pb-8">
    <a
        href="<?php echo esc_url($back_url); ?>"
        class="text-primary-green text-sm lg:text-lg font-owners tracking-5p hover:underline"
    >
        &lt; ATGAL
    </a>
</div>
    </main>


<?php get_footer(); ?>