<?php
/*
Template Name: 実績・保護者の声
Template Post Type: page
*/
get_header();

$voice_default_image = aichi_koushikai_asset_url( 'image/voice/voice_img_01.png' );
$achievement_groups = array(
	'national' => array(
		'label' => '国立大学',
		'field' => 'achievement_national',
	),
	'public' => array(
		'label' => '公立大学',
		'field' => 'achievement_public',
	),
	'private' => array(
		'label' => '私立大学',
		'field' => 'achievement_private',
	),
);
?>

	<main class="voiceMain" id="voice">
		<div class="pageKvContainer">
			<div class="pageKvPanel">
				<div class="pageKvTitle">
					<p>VOICE & RESULT</p>
					<h1>生徒・保護者の声と実績</h1>
				</div>
				<div class="topicPath">
					<ol>
						<li><a href="<?php echo esc_url( aichi_koushikai_page_url() ); ?>">HOME</a></li>
						<li>生徒・保護者の声と実績</li>
					</ol>
				</div>
			</div>
		</div>

		<section class="sectionVoice">
			<div class="secWrap">
				<div class="secContainer">
					<div class="containerWrap">
						<div class="pageSecTtl">
							<h2>生徒・保護者の声</h2>
						</div>
						<div class="listBox">
							<ul>
								<?php if ( function_exists( 'have_rows' ) && have_rows( 'voice_items' ) ) : ?>
									<?php while ( have_rows( 'voice_items' ) ) : the_row(); ?>
										<?php
										$voice_category = get_sub_field( 'voice_category' );
										$voice_image    = get_sub_field( 'voice_image' );
										$voice_name     = get_sub_field( 'voice_name' );
										$voice_comment  = get_sub_field( 'voice_comment' );
										$voice_label    = 'parent' === $voice_category ? '保護者の声' : '生徒の声';
										$voice_image_url = $voice_default_image;

										if ( is_array( $voice_image ) && ! empty( $voice_image['url'] ) ) {
											$voice_image_url = $voice_image['url'];
										} elseif ( is_numeric( $voice_image ) ) {
											$voice_image_url = wp_get_attachment_image_url( (int) $voice_image, 'full' ) ?: $voice_default_image;
										}
										?>
										<li>
											<div class="cate <?php echo esc_attr( 'parent' === $voice_category ? 'parent' : 'student' ); ?>">
												<p><?php echo esc_html( $voice_label ); ?></p>
											</div>
											<div class="img"><img src="<?php echo esc_url( $voice_image_url ); ?>" alt="" loading="lazy"></div>
											<div class="ttl">
												<p><?php echo esc_html( $voice_name ); ?></p>
											</div>
											<div class="txt">
												<p><?php echo wp_kses_post( $voice_comment ); ?></p>
											</div>
										</li>
									<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="sectionAchievements">
			<div class="secWrap">
				<div class="secContainer">
					<div class="containerWrap">
						<div class="pageSecTtl">
							<h2>合格実績</h2>
						</div>
						<div class="list">
							<ul>
								<?php foreach ( $achievement_groups as $achievement_key => $achievement_group ) : ?>
									<li data-target="achievement<?php echo esc_attr( ucfirst( $achievement_key ) ); ?>"><?php echo esc_html( $achievement_group['label'] ); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="secPanel">
							<?php foreach ( $achievement_groups as $achievement_key => $achievement_group ) : ?>
								<?php
								$category_items = function_exists( 'get_field' ) ? get_field( $achievement_group['field'] ) : array();
								$category_items = is_array( $category_items ) ? $category_items : array();
								?>
								<div class="secBox achievement<?php echo esc_attr( ucfirst( $achievement_key ) ); ?>">
									<h3><?php echo esc_html( $achievement_group['label'] ); ?></h3>
									<div class="achievementList">
										<ul>
										<?php foreach ( array_values( $category_items ) as $achievement ) : ?>
											<li>
												<div class="achievementItem">
													<span><?php echo esc_html( isset( $achievement['achievement_university'] ) ? $achievement['achievement_university'] : '' ); ?></span>
													<span><?php echo esc_html( isset( $achievement['achievement_faculty'] ) ? $achievement['achievement_faculty'] : '' ); ?></span>
													<span><?php echo esc_html( isset( $achievement['achievement_count'] ) ? $achievement['achievement_count'] : '' ); ?></span>
												</div>
											</li>
										<?php endforeach; ?>
										</ul>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>
