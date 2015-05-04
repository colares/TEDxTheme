<div class="row" style="margin-bottom: 50px">
	<fieldset>
		<legend><?= $name; ?></legend>
		<?php if ($partners->have_posts()): while ($partners->have_posts()) : $partners->the_post(); ?>
			<?php
			if (has_post_thumbnail()):
				$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));

				//$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'small-partner');
				if (is_array($thumb) && !empty($thumb[0])) {
					$thumbnail_src = $thumb[0];
				} else {
					$thumbnail_src = '';
				}
				?>
				<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 partner-tile" style="text-align: center">
					<a href='<?= get_post_meta(get_the_ID(), '_partner_url', true); ?>' target="_blank">
						<img alt='<?php the_title(); ?>' src='<?= $thumbnail_src; ?>'/>
					</a>
				</div>
			<?php endif; ?>
		<?php endwhile; endif; ?>
	</fieldset>
</div>
