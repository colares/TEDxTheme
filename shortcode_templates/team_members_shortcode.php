<section ng-controller="TeamCtrl">
  <div class="row animated-tiles">
    <?php if ($team_members->have_posts()): while ($team_members->have_posts()) :
      $team_members->the_post(); ?>
      <?php $post = get_post(); ?>

      <?php

		$backgroundColors = array('rgb(242, 124, 177)', 'rgb(124, 194, 66)', 'rgb(255, 198, 11)', 'rgb(57, 197, 233)');
		$randomBackgroundColor = $backgroundColors[array_rand($backgroundColors)];

      $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'team');
      if (is_array($thumb) && !empty($thumb[0])) {
        $thumbnail_src = $thumb[0];
      } else {
        $thumbnail_src = get_bloginfo('template_url') . "/images/defaults/team.jpg";
      }
      ?>
		<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2"
			 ng-init="descriptions[<?= $post->ID ?>] = {title: '<?= $post->post_title; ?>', content: '<?= $post->post_content; ?>', jobDescription: '<?= $teamMemberJobDescription ?>', twitter: '<?= $twitter; ?>' }"
			>
			<div class="thumbnail"
				 style="border: 0; cursor: pointer;"
				 ng-click="setModalDescriptionId(<?= $post->ID ?>)"
				 data-toggle="modal" data-target="#descriptionModal"
				>
				<img
					alt='<?php the_title(); ?>' src='<?=  $thumbnail_src; ?>'
					style="position: relative; z-index: 1;" class="team-photo">
				<div class="caption"
					 style="cursor: pointer; background-color: <?= $randomBackgroundColor; ?>; color: black"
					 ng-click="setModalDescriptionId(<?= $post->ID ?>)"
					 data-toggle="modal" data-target="#descriptionModal"
					>
					<h5 style="margin: 0"><?=  $post->post_title; ?><br/>
						<em><small style="color: black"><?=  get_post_meta($post->ID, '_team_job_description', true) ?>&nbsp;</small></em>
					</h5>
				</div>
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
					<p ng-show="descriptions[modalDescriptionId].twitter">
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