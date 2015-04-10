<section ng-controller="TeamCtrl">
  <div class="row animated-tiles">
    <?php if ($team_members->have_posts()): while ($team_members->have_posts()) :
      $team_members->the_post(); ?>
      <?php $post = get_post(); ?>

      <?php

      $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'team');
      if (is_array($thumb) && !empty($thumb[0])) {
        $thumbnail_src = $thumb[0];
      } else {
        $thumbnail_src = get_bloginfo('template_url') . "/images/defaults/team.jpg";
      }
      ?>
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">

      <div class="team-tile" data-remote="true"
           data-href="<?php the_permalink(); ?>" ng-init="descriptions[<?= $post->ID ?>] = {show: false}">

		  <div class="team-photo-wrapper">

			  			<div ng-show="descriptions[<?= $post->ID ?>].show == true" style=" float: left;
			     position: absolute;
			     top: 0;
			     width: 90%;
			     z-index: 1000;
			     padding: 20px;
			     margin: 0;
			     color: #FFFFFF;
			     font-weight: normal;">
							<span ng-click="descriptions[<?= $post->ID ?>].show = false"  class="pull-right"><i class="fa fa-times fa-2x text-muted"></i></span>

							<p style="text-align: left"><small><?=  $post->post_content; ?></small></p>
						</div>

			  <div ng-show="descriptions[<?= $post->ID ?>].show == false" style=" float: left;
			     position: absolute;
			     top: 0;
			     width: 90%;
			     z-index: 1000;
			     padding: 20px;
			     color: white;
			     margin: 0;
			     font-weight: normal;"
				   ng-click="showDescription(<?= $post->ID ?>)">
				  <span  class="pull-right"><i class="fa fa-info-circle fa-2x"></i></span>
<!--				  <i class="fa fa-info-circle"></i>-->
			  </div>
			  <img alt='<?php the_title(); ?>' ng-show="descriptions.<?= $post->ID ?>.show == true" src='<?= get_bloginfo('template_url') . "/assets/img/000000.gif" ?>' class="team-photo" >

          <img alt='<?php the_title(); ?>'  ng-show="descriptions.<?= $post->ID ?>.show == false" src='<?=  $thumbnail_src; ?>' class="team-photo">
        </div>
        <!-- .team-photo-wrapper -->
        <div class="team-info">
          <div class='team-links pull-right'>
            <?php $twitter = get_post_meta($post->ID, '_team_twitter_link', true); ?>
            <?php if (!empty($twitter)): ?>
<!--              <div class='ir ico tweet ico-box'>-->
			  <div>
                <a href='<?=  $twitter; ?>' target='_blank' style="display:block; margin: 10px; z-index: 2000;">
					<i class="fa fa-twitter fa-2x"></i>
                </a>
              </div>
            <?php endif; ?>
            <!-- END TODO -->
          </div>
          <!-- .team-links -->
          <div class="team-title">
            <h2><?=  $post->post_title; ?></h2>
            <div class="team-role">
              <?=  get_post_meta($post->ID, '_team_job_description', true) ?>
            </div>
          </div>
          <!-- .team-title -->
          <!--
          <div class='team-details-container'>
            <?=  $post->post_content; ?>
          </div>-->
          <!-- .team-details-container -->
        </div>
        <!-- .team-info -->


      </div>
		</div>
    <?php endwhile;
    endif;
    ?>
  </div>
</section>