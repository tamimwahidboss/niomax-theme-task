<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package niomax
 */

get_header();
?>

<!-- Start Hero Section -->
<div class="hero-section">

    <div class="hero-bg bg1" style="background-image: linear-gradient(270deg, rgba(6, 39, 39, 0) 1.59%, rgba(6, 39, 39, 0.8) 100%), url('<?php echo esc_url( get_theme_mod('hero_bg_image_1') ); ?>');"></div>
    <div class="hero-bg bg2" style="background-image: linear-gradient(270deg, rgba(6, 39, 39, 0) 1.59%, rgba(6, 39, 39, 0.8) 100%), url('<?php echo esc_url( get_theme_mod('hero_bg_image_2') ); ?>');"></div>
    <div class="hero-bg bg3" style="background-image: linear-gradient(270deg, rgba(6, 39, 39, 0) 1.59%, rgba(6, 39, 39, 0.8) 100%), url('<?php echo esc_url( get_theme_mod('hero_bg_image_3') ); ?>');"></div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="hero-content">
                    <h1><?php echo get_theme_mod('slider_heading'); ?></h1>
                    <p class="mb-4"><?php echo get_theme_mod('slider_desc'); ?></p>
                    <a href="<?php echo get_theme_mod('slider_btn_link'); ?>" class="btn-cta py-2"><?php echo get_theme_mod('slider_btn_text'); ?></a>
                </div>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>
<!-- End Hero Section -->


<!-- Slider main container -->
<div class="feature-section">
  <div class="container">
    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php
        $args = array(
            'post_type'      => 'wporg_product', // Custom post type
            'posts_per_page' => 10,               // Number of posts to show
        );

        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="feature-box">
                        <?php
                        // Display the post thumbnail if available
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full', ['class' => 'w-25 pb-4']);
                        } else {
                            // Fallback image
                            echo '<img class="w-25 pb-4" src="' . get_template_directory_uri() . '/assets/img/icon/icon1.png" alt="Fallback Image">';
                        }
                        ?>
                        <!-- Post title -->
                        <h5><?php the_title(); ?></h5>
                        <!-- Post excerpt or custom field for description -->
                        <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div>
      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>
<!-- End featured section -->


<!-- Start about section -->
<div class="about-section dft-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="about-info">
                    <span><div class="abt-green"></div><?php echo get_theme_mod('about_sub_heading'); ?></span>
                    <h2><?php echo get_theme_mod('about_heading'); ?></h2>
                    <p><b><?php echo get_theme_mod('about_descB'); ?></b></p>
                    <p><?php echo get_theme_mod('about_desc'); ?></p>
                    <ul class="abt-info-icon">
                        <li><img class="icon" src="<?php echo get_template_directory_uri(  ) ?>/assets/img/icon/check-circle.png" alt=""><?php echo get_theme_mod('about_list1'); ?></li>
                        <li><img class="icon" src="<?php echo get_template_directory_uri(  ) ?>/assets/img/icon/check-circle.png" alt=""><?php echo get_theme_mod('about_list2'); ?></li>
                    </ul>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="abt-box">
                                <div class="row">
                                    <div class="col-2">
                                        <img class="icon" src="<?php echo get_template_directory_uri(  ) ?>/assets/img/icon/trophy-fill.png" alt="">
                                    </div>
                                    <div class="col-10">
                                        <h6><?php echo get_theme_mod('about_box1_h6'); ?></h6>
                                        <p><?php echo get_theme_mod('about_box2_p'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="abt-box">
                                <div class="row">
                                    <div class="col-2">
                                        <img class="icon" src="<?php echo get_template_directory_uri(  ) ?>/assets/img/icon/medal-fill.png" alt="">
                                    </div>
                                    <div class="col-10">
                                        <h6><?php echo get_theme_mod('about_box2_h6'); ?></h6>
                                        <p><?php echo get_theme_mod('about_box2_p'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="abt-img">
                    <div class="abt-bg" style="background-image: url('<?php echo esc_url( get_theme_mod('about_image') ); ?>');"></div>
                    <img class="market-place" src="<?php echo get_template_directory_uri(  ) ?>/assets/img/icon/market-place.png" alt="">
                    <img class="green-dot" src="<?php echo get_template_directory_uri(  ) ?>/assets/img/icon/green-dot.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End about section -->

<!-- Start cta section -->
<div class="cta-section dft-section">
    <div class="container">
        <div class="cta-box">
            <h2 class="mb-4"><?php echo get_theme_mod('cta_heading'); ?></h2>
            <a href="<?php echo get_theme_mod('cta_btn_link'); ?>" class="btn-cta py-2 rounded"><?php echo get_theme_mod('cta_btn_text'); ?></a>
        </div>
    </div>
</div>
<!-- End cta section -->

<!-- Start video section -->
 <div class="video-section dft-section text-center">
    <div class="container">
        <div class="row">
            <span class="d-flex justify-content-center align-items-center mb-3"><div class="abt-green"></div><?php echo get_theme_mod('vide_sub_heading'); ?></span>
            <h2><?php echo get_theme_mod('vide_heading'); ?></h2>
            <p class="mb-5"><?php echo get_theme_mod('vide_desc'); ?></p>

            <!-- Trigger Button (Video Icon) -->
            <div class="video-inner">
                <div class="our-history m-auto">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#videoModal">
                        <i class="fas fa-play-circle fa-3x"></i> <!-- Video play icon -->
                    </button>
                </div>

                <div class="row">
                    <div class="col-6">
                        <img class="vd-img-1" src="<?php echo get_template_directory_uri(  ) ?>/assets/img/icon/green.png" alt="">
                    </div>
                    <div class="col-6">
                        <img class="vd-img-2" src="<?php echo get_template_directory_uri(  ) ?>/assets/img/icon/green-dot.png" alt="">
                    </div>
                </div>
            </div>

            

            <!-- Video Modal -->
            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel"><?php echo get_theme_mod('vide_sub_heading'); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <!-- Embed the video -->
                        <div class="ratio ratio-16x9">
                            <iframe id="video" src="<?php echo get_theme_mod('vide_link'); ?>" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


 </div>
<!-- End video section -->


<div class="blog dft-section">
    <div class="container">
        <div class="row text-center">
            <span class="d-flex justify-content-center align-items-center mb-3">
                <div class="abt-green"></div>
                <?php echo get_theme_mod( 'blog_sub_heading', 'Default Subheading' ) ; ?>
            </span>
            <h2><?php echo get_theme_mod( 'blog_heading', 'Default Heading' ); ?></h2>
            <p class="mb-5"><?php echo get_theme_mod( 'blog_desc', 'Default Description' ); ?></p>
        </div>
        <div class="row">
            <?php
            $args = array(
                'post_type'      => 'post',   // Default post type
                'posts_per_page' => 3,        // Number of posts to show
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>
                    <div class="col-md-4 col-sm-6 col-12">
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                            <div class="blog-box">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" alt="<?php the_title_attribute(); ?>" />
                                <?php endif; ?>
                                <span><?php echo esc_html( get_the_date() ); ?></span>
                                <h5 class="mt-2"><?php echo esc_html( get_the_title() ); ?></h5>
                            </div>
                        </a>
                    </div>
                    <?php
                endwhile;
            else :
                echo '<p>' . esc_html__( 'No posts found', 'your-theme-textdomain' ) . '</p>';
            endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>






<?php
get_footer();
