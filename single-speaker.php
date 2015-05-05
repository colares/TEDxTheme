<?php get_header(); ?>
  <div class="container spacing-top">
    <div class="row">
      <div class="col-md-12">
        <div class="post-content">
          <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <?php
            $speaker  = get_post();
            $video_id = get_post_meta($speaker->ID, '_speaker_video_id', true);
			$image = wp_get_attachment_image_src(get_post_thumbnail_id($speaker->ID), 'speaker');
			  if (is_array($image) && !empty($image[0])) { $image = $image[0]; }
            $name     = $speaker->post_title;
            $excerpt  = $speaker->post_excerpt;
            ?>
            <div class="page-header">
              <h2><?php the_title(); ?>
                <small><?= $excerpt ?></small>
              </h2>
            </div>
            <?php if (!empty($video_id)): ?>
              <div class="feature-image">
                <div class="video-container">
                  <iframe width="100%" height="100%" src="//www.youtube.com/embed/<?= $video_id ?>" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
            <?php endif; ?>


            <div class="user-generated-content">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3" style="text-align: center">
						<img src="<?= $image; ?>" alt="" style="margin-bottom: 30px"/>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-9 col-lg-9">
						<?php the_content(); ?>
					</div>
				</div>
            </div>

		  <div class="row" style="margin-bottom: 60px">
			  <div class="col-md-6"></div>
			  <div class="col-md-6">
				  <div class="pull-right">
			  <span class="social social-facebook">
				<div class="fb-like" data-href="<?= get_permalink($speaker->ID); ?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
			  </span>
			  <span class="social social-twitter">
				<a href="https://twitter.com/share" class="twitter-share-button" data-via="<?= get_theme_mod('twitter_account') ?>">Tweet</a>
			  </span>
				  </div>
			  </div>
		  </div>

          <?php endwhile; endif; ?>
        </div>
      </div>
<!--      <div class="col-md-3">-->
        <?php //get_sidebar('speaker'); ?>
<!--      </div>-->
    </div>
  </div>
<?php get_footer(); ?>