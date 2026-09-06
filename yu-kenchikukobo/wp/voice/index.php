<?php
/*
Template Name: お客様の声
*/
?>
<?php get_header(); ?>
<!-- ▽メイン▽-->
<main class="main" id="voice">
	<div class="pageKvPanel">
		<div class="kvTitle">
			<h1>お客さまの声</h1>
		</div>
		<div class="pageKv"><img src="<?php bloginfo('template_url'); ?>/image/voice/top_kv.png" alt=""></div>
	</div>
	<div class="sec01">
		<div class="secWrap01">
			<div class="pageSecTtlBox center">
				<div class="sub">
					<p>VOICE</p>
				</div>
				<div class="pageSecTtl">
					<h2>お客さまの声</h2>
				</div>
			</div>
			<div class="topTxt txt">
				<p>遊 建築工房でリフォームをされたお客さまから、実際にいただいた声をご紹介します。</p>
			</div>
			<?php if (have_rows('customer_voices')): ?>
				<?php while (have_rows('customer_voices')): the_row(); ?>
					<?php
					$title = get_sub_field('voice_title');
					$stamp = get_sub_field('voice_stamp');
					$image = get_sub_field('voice_image');
					$content = get_sub_field('voice_content');
					?>
					<div class="section">
						<div class="pageSecSubTtlBox">
							<div class="pageSecSubTtl">
								<h3><?php echo esc_html($title ?: 'お客様の声'); ?></h3>
							</div>
						</div>
						<div class="secBox">
							<div class="imgBox">
								<div class="voiceImg">
									<?php if ($image): ?>
										<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $title); ?>">
									<?php else: ?>
										<img src="<?php bloginfo('template_url'); ?>/image/voice/voice_img_01.png" alt="">
									<?php endif; ?>
								</div>
								<?php if ($stamp): ?>
									<div class="stamp"><img src="<?php bloginfo('template_url'); ?>/image/voice/voice_stamp.png" alt=""></div>
								<?php endif; ?>
							</div>
							<div class="txtBox">
								<?php if ($content): ?>
									<div class="txt">
										<?php echo nl2br(esc_html($content)); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<?php if (have_rows('voice_supplement_images')): ?>
							<div class="listBox">
								<ul>
									<?php while (have_rows('voice_supplement_images')): the_row(); ?>
										<?php $supplement_image = get_sub_field('supplement_image'); ?>
										<?php if ($supplement_image): ?>
											<li><img src="<?php echo esc_url($supplement_image['url']); ?>" alt="<?php echo esc_attr($supplement_image['alt']); ?>"></li>
										<?php endif; ?>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</main>
<!-- △メイン△-->
<?php get_footer(); ?>