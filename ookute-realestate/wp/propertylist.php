<?php
/*
Template Name: 物件情報
*/

$paged = max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) );
$GLOBALS['paged'] = $paged;
$the_query = new WP_Query(
	array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => 10,
		'paged'          => $paged,
	)
);

$format_range = static function ( $min, $max, $unit ) {
	$min = trim( (string) $min );
	$max = trim( (string) $max );

	if ( '' !== $min && '' !== $max ) {
		return $min === $max
			? $min . $unit
			: $min . $unit . '～' . $max . $unit;
	}

	if ( '' !== $min ) {
		return $min . $unit . '～';
	}

	if ( '' !== $max ) {
		return '～' . $max . $unit;
	}

	return '';
};
?>
<?php get_header(); ?>
	<main class="next propertyListMain">
		<article class="title_box top_level">
			<div class="inner">
				<h2 data-title="PROPERTY">物件情報</h2>
			</div>
		</article>
		<div class="pankuzu">
			<ul>
				<li><a href="<?php echo home_url(); ?>">ホーム</a></li>
				<li>物件情報</li>
			</ul>
		</div>
		<div class="propertylist_container">
			<div class="contents_box">
				<div class="topTitle">
					<h3>物件情報</h3>
				</div>
				<div class="listPanel">
					<ul>
						<?php while ( $the_query->have_posts() ) : ?>
							<?php
							$the_query->the_post();

							$availability        = get_field( 'list_availability' );
							$availability_labels = array(
								'available' => '空きあり',
								'full'      => '満室',
							);
							$property_title      = get_field( 'property_title' ) ?: get_the_title();
							$list_image          = get_field( 'list_image' );
							$rent_min            = trim( (string) get_field( 'list_rent_min' ) );
							$rent_max            = trim( (string) get_field( 'list_rent_max' ) );
							$area_range          = $format_range(
								get_field( 'list_area_min' ),
								get_field( 'list_area_max' ),
								'㎡'
							);
							$tsubo_range         = $format_range(
								get_field( 'list_tsubo_min' ),
								get_field( 'list_tsubo_max' ),
								'坪'
							);
							?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<div class="photoBox">
										<div class="photo">
											<?php
											if ( $list_image ) {
												echo wp_get_attachment_image(
													(int) $list_image,
													'large',
													false,
													array( 'alt' => $property_title )
												);
											}
											?>
										</div>
										<div class="label">
											<p<?php echo 'full' === $availability ? ' class="black"' : ''; ?>><?php echo esc_html( $availability_labels[ $availability ] ?? '' ); ?></p>
										</div>
									</div>
									<div class="captionBox">
										<div class="ttl">
											<p><?php echo esc_html( get_field( 'list_comment' ) ); ?></p>
										</div>
										<dl>
											<dt>所在地：</dt>
											<dd><?php echo esc_html( get_field( 'address' ) ); ?></dd>
										</dl>
										<dl>
											<dt>賃料：</dt>
											<dd>
												<?php if ( '' !== $rent_min ) : ?>
													<em><?php echo esc_html( $rent_min ); ?></em><span>万円<?php echo $rent_min !== $rent_max ? '～' : ''; ?></span>
												<?php elseif ( '' !== $rent_max ) : ?>
													<span>～</span>
												<?php endif; ?>
												<?php if ( '' !== $rent_max && $rent_min !== $rent_max ) : ?>
													<em><?php echo esc_html( $rent_max ); ?></em><span>万円</span>
												<?php endif; ?>
											</dd>
										</dl>
									</div>
									<div class="infoBox">
										<div class="boxHorizontal">
											<dl>
												<dt>敷金：</dt>
												<dd><?php echo esc_html( get_field( 'deposit' ) ); ?></dd>
											</dl>
											<dl>
												<dt>補償金：</dt>
												<dd><?php echo esc_html( get_field( 'guarantee_deposit' ) ); ?></dd>
											</dl>
											<dl>
												<dt>礼金：</dt>
												<dd><?php echo esc_html( get_field( 'key_money' ) ); ?></dd>
											</dl>
										</div>
										<div class="description">
											<p><em><?php echo esc_html( $property_title ); ?></em></p>
											<?php if ( $area_range ) : ?>
												<p><span>使用部分面積：<?php echo esc_html( $area_range ); ?></span></p>
											<?php endif; ?>
										</div>
										<div class="boxVertical">
											<?php if ( $tsubo_range ) : ?>
												<dl>
													<dt>坪数：</dt>
													<dd><?php echo esc_html( $tsubo_range ); ?></dd>
												</dl>
											<?php endif; ?>
											<dl>
												<dt>築年月：</dt>
												<dd><?php echo esc_html( get_field( 'built_date' ) ); ?></dd>
											</dl>
										</div>
									</div>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
				<div class="list__pagination">
					<?php
					if ( function_exists( 'responsive_pagination' ) ) {
						responsive_pagination( $the_query->max_num_pages );
					}
					?>
				</div>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
