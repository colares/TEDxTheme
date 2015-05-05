<?php
/*
Template Name: Homepage
*/

get_header();
?>

<div class="banner" style="background: url(<?php the_field('banner_background'); ?>) top center repeat-x;">
  <div class="banner-container">
		<a class="btn btn-danger" href="<?php the_field('banner_callout_button_link'); ?>"><?php the_field('banner_callout_button_text'); ?></a>

	  <!--    <h1>--><?php //the_field('banner_title'); ?><!--</h1>-->
	  <!---->
	  <!--    <h2>--><?php //the_field('banner_subtitle'); ?><!--</h2>-->
	  <!--	  <br/>-->
	  <!--		<a class="btn btn-danger" href="--><?php //the_field('banner_callout_button_link'); ?><!--">--><?php //the_field('banner_callout_button_text'); ?><!--</a>-->
  </div>
</div>

<div class="container contents">
  <div class="row">
    <div class="col-md-9">
      <section>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; endif; ?>
      </section>
		
    </div>
    <div class="col-md-3">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div><!-- .container contents -->
<?php get_footer(); ?>
