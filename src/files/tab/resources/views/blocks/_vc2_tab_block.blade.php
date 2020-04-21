<?php
// Create id attribute allowing for custom "anchor" value.
		$id = 'tab-' . $block['id'];
		if( !empty($block['anchor']) ) {
		    $id = $block['anchor'];
		}

		// Create class attribute allowing for custom "className" and "align" values.
		$className = 'vc-tab';
		if( !empty($block['className']) ) {
		    $className .= ' ' . $block['className'];
		}
		if( !empty($block['align']) ) {
		    $className .= ' align' . $block['align'];
		}
		if( $is_preview ) {
		    $className .= ' is-admin';
		}

		$vc_heading = get_field('vc_heading');
		$vc_subheading = get_field('vc_subheading');
		$tab_icons = get_field('tab_icons');
		$description = get_field('description');
		

		?>
		<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
			<div class="container">
				<div class="content-wrap">
					<?php if (!empty($vc_heading)): ?>
						<h3 class="title"><?php echo $vc_heading; ?></h3>
					<?php endif ?>
					<?php if (!empty($vc_subheading)): ?>
						<div class="description"><?php echo $vc_subheading; ?></div>
					<?php endif ?>
				</div>
				<?php if( have_rows('tab_icons') ): ?>
					<div class="tab-icons">
						<?php while( have_rows('tab_icons') ): the_row();
							$tab_icon = get_sub_field('tab_icon');
						?>
							<div class="tab-icon">
								<img src="{{ $tab_icon }}" alt="image">
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif ?>
				<?php if( have_rows('tab_items') ): ?>
					<div class="tab-items">
						<ul class="tab-titles">
						<?php
							$i=1;
							while( have_rows('tab_items') ): the_row();
								$tab_title = get_sub_field('tab_title');
								if ($i==1) {
									$active = 'active';
								}
								else {
									$active = '';
								}
								?>
									<li class="title {{$active}}" id="tab-{{$i}}"><span>{{$tab_title}}</span></li>

								<?php
								$i++;
							endwhile; ?>
						</ul>
						<div class="tab-content">
							<?php $i=1; while( have_rows('tab_items') ): the_row();
								$tab_description = get_sub_field('tab_description');
								if ($i==1) {
									$active = 'active';
								}
								else {
									$active = '';
								}
							?>
								<div class="tab-desc {{$active}}" id="tab-{{$i}}">{{$tab_description}}</div>	
							<?php $i++; endwhile; ?>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
<?php     