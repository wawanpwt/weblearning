<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_education_academy_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_education_academy_slider_hide_show') != '') { ?>

  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod( 'vw_education_academy_slider_speed',3000)) ?>"> 
      <?php $vw_education_academy_slider_pages = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_education_academy_slider_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $vw_education_academy_slider_pages[] = $mod;
          }
        }
        if( !empty($vw_education_academy_slider_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_education_academy_slider_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_education_academy_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_education_academy_slider_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('vw_education_academy_slider_button_text','READ MORE') != ''){ ?>
                  <div class="more-btn">
                    <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_education_academy_slider_button_text',__('READ MORE','vw-education-academy')));?><i class="<?php echo esc_attr(get_theme_mod('vw_education_academy_slider_button_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_education_academy_slider_button_text',__('READ MORE','vw-education-academy')));?></span></a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
          <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-education-academy' );?></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-education-academy' );?></span>
      </a>
    </div>
    <div class="clearfix"></div>
  </section>

  <?php } ?>

  <?php do_action( 'vw_education_academy_after_slider' ); ?>

  <section id="about-section">
    <div class="container">
      <div class="row m-0">
        <?php $vw_education_academy_about_pages = array();
          $mod = absint( get_theme_mod( 'vw_education_academy_about_page' ));
          if ( 'page-none-selected' != $mod ) {
            $vw_education_academy_about_pages[] = $mod;
          }
          if( !empty($vw_education_academy_about_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_education_academy_about_pages,
              'orderby' => 'postabout_page__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="col-lg-7 col-md-7">
                  <?php if( get_theme_mod( 'vw_education_academy_section_title') != '') { ?>
                    <span><i class="<?php echo esc_attr(get_theme_mod('vw_education_academy_about_title_icon','fas fa-graduation-cap')); ?>"></i></span>
                    <h2><?php echo esc_html(get_theme_mod('vw_education_academy_section_title',''));?></h2>
                    <hr>
                  <?php }?>
                  <h3><?php the_title(); ?></h3>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_education_academy_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_education_academy_about_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_education_academy_about_button_text','READ MORE') != ''){ ?>
                    <div class="more-btn">
                      <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_education_academy_about_button_text',__('READ MORE','vw-education-academy')));?><i class="<?php echo esc_attr(get_theme_mod('vw_education_academy_about_button_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_education_academy_about_button_text',__('READ MORE','vw-education-academy')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
                <div class="col-lg-5 col-md-5">
                  <?php the_post_thumbnail(); ?>
                </div>
              <?php endwhile; ?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
          endif;
          wp_reset_postdata()?>
        <div class="clearfix"></div> 
      </div>
    </div>
  </section>

  <?php do_action( 'vw_education_academy_after_services' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>