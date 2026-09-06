<?php
/*
Template Name: 先生紹介
*/
?>

<?php get_header(); ?>

	<!--▽.cntnt▽-->
	<div id="teacher" class="course">

		<!--▽.kv▽-->
		<div class="kv">
			<div>
				<h2><img src="<?php echo get_template_directory_uri(); ?>/image/teacher/kv_ttl_pc.png" alt="先生紹介"></h2>
			</div>
		</div>
		<!--△.kv△-->

		<section id="sec01">
			<div class="contWrap">
				<h3 class="ttlBorder"><span><img src="<?php echo get_template_directory_uri(); ?>/image/teacher/sec_ttl_01.png" alt="先生紹介"></span></h3>
				<p>フォーチューンの英会話講師は、<br/>全員が経験豊富なネイティブ外国人講師、<br/>または、５年～１０年以上の海外経験のあるバイリンガル講師ばかりです。</p>
				
				<?php
			    $repeat_group = SCF::get( 'cf-teacher' );
			    foreach ( $repeat_group as $fields ) {
			 
			    $size = "full"; // (thumbnail, medium, large, full or custom size)
			    $image = wp_get_attachment_image_src( $fields['teacher-image'], $size );
			    $alt = get_post_meta($fields['teacher-image'], '_wp_attachment_image_alt', true);
			    $image_title = $fields['teacher-image']->post_title;
				?>
				<dl>
					<dt><span><?php echo esc_html( $fields['teacher-name'] );?></span></dt>
					<dd>
						<p><img src="<?php echo $image[0]; ?>" alt="" /></p>
						<div>
							<?php echo esc_html( $fields['teacher-text'] );?>
						</div>
					</dd>
				</dl>
				<?php } ?>

			</div>
		</section>

		<section id="sec02">
			<div class="contWrap">
				<h3 class="ttlBorder"><span><img src="<?php echo get_template_directory_uri(); ?>/image/teacher/sec_ttl_02.png" alt="スタッフ紹介"></span></h3>
				<p>フォーチューン英会話をサポートしてくれる<br />スタッフのみなさんを紹介いたします。</p>
				
				<?php
				$field_group = SCF::get( 'cf-staff' );
				foreach ( $field_group as $fields ) {
				 ?>

				 <dl>
					<dt><span><?php echo esc_html( $fields['staff-name'] );?></span></dt>
					<dd><?php echo esc_html( $fields['staff-text'] );?></dd>
				</dl>

				<?php } ?>

			</div>
		</section>
	
	</div>
	<!--△.cntnt△-->

<?php get_footer(); ?>