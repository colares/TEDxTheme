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
           data-href="<?php the_permalink(); ?>">
		  <?php
		  	$twitter = get_post_meta($post->ID, '_team_twitter_link', true);
		  	$teamMemberJobDescription = get_post_meta($post->ID, '_team_job_description', true);
		  ?>
		  <div class="team-photo-wrapper"
			   style="position: relative; cursor: pointer;"
			   ng-click="setModalDescriptionId(<?= $post->ID ?>)"
			   data-toggle="modal" data-target="#descriptionModal"
			   ng-init="descriptions[<?= $post->ID ?>] = {title: '<?= $post->post_title; ?>', content: '<?= $post->post_content; ?>', jobDescription: '<?= $teamMemberJobDescription ?>', twitter: '<?= $twitter; ?>' }">
			<i class="fa fa-2x fa-info-circle"
			   style="position: absolute;right:10px; top: 10px;z-index: 10; color: white"
				></i>
		  	<img
				alt='<?php the_title(); ?>' src='<?=  $thumbnail_src; ?>'
				style="position: relative; z-index: 1;" class="team-photo">
        </div>
        <!-- .team-photo-wrapper -->
        <div class="team-info">
          <div class='team-links pull-right'>
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

	<!-- Modal -->
	<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
<!--				<div class="modal-header">-->
<!--					-->
<!--				</div>-->
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title" id="myModalLabel">
						{{descriptions[modalDescriptionId].title}}
					</h3>
					<p class="text-muted"><em>{{descriptions[modalDescriptionId].jobDescription}}</em></p>
					<p>{{descriptions[modalDescriptionId].content}}</p>
					<p>

						<a href='{{descriptions[modalDescriptionId].twitter}}' target='_blank'>
							<i class="fa fa-twitter"></i> {{descriptions[modalDescriptionId].twitter}}
						</a>
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
</section>