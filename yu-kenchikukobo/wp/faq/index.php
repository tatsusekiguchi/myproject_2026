<?php
/*
Template Name: よくあるご質問
*/
?>
<?php get_header(); ?>
<!-- ▽メイン▽-->
<main class="main" id="faq">
	<div class="pageKvPanel">
		<div class="kvTitle">
			<h1>よくあるご質問</h1>
		</div>
		<div class="pageKv"><img src="<?php bloginfo('template_url'); ?>/image/faq/top_kv.png" alt=""></div>
	</div>
	<div class="sec01">
		<div class="secWrap01">
			<div class="pageSecTtlBox center">
				<div class="sub">
					<p>FAQ</p>
				</div>
				<div class="pageSecTtl">
					<h2>よくあるご質問</h2>
				</div>
			</div>
			<div class="pagingList">
				<ul>
					<li>
						<div class="btnMore"><a href="#sec01">遊建築工房について</a></div>
					</li>
					<li>
						<div class="btnMore"><a href="#sec02">料金・保障について</a></div>
					</li>
					<li>
						<div class="btnMore"><a href="#sec03">工事について</a></div>
					</li>
				</ul>
			</div>
		</div>
		<div class="secContainer">
			<div class="section" id="sec01">
				<div class="secWrap01">
					<div class="pageSecSubTtlBox">
						<div class="pageSecSubTtl">
							<h3>遊建築工房について</h3>
						</div>
					</div>
					<div class="secPanelList">
						<?php if (have_rows('faq_section_01')): ?>
							<?php while (have_rows('faq_section_01')): the_row(); ?>
								<?php
								$question = get_sub_field('faq_01_question');
								$answer = get_sub_field('faq_01_answer');
								$image = get_sub_field('faq_01_image');
								?>
								<div class="secPanel accord">
									<div class="pHead">
										<h3><em>Q.</em><span><?php echo esc_html($question); ?></span></h3>
									</div>
									<div class="pBody">
										<?php if ($image): ?>
											<div class="secBox">
												<div class="photo"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></div>
												<div class="txt">
													<?php echo nl2br(esc_html($answer)); ?>
												</div>
											</div>
										<?php else: ?>
											<div class="txtBox">
												<div class="txt">
													<p><?php echo nl2br(esc_html($answer)); ?></p>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="section" id="sec02">
				<div class="secWrap01">
					<div class="pageSecSubTtlBox">
						<div class="pageSecSubTtl">
							<h3>料金・保障について</h3>
						</div>
					</div>
					<div class="secPanelList">
						<?php if (have_rows('faq_section_02')): ?>
							<?php while (have_rows('faq_section_02')): the_row(); ?>
								<?php
								$question = get_sub_field('faq_02_question');
								$answer = get_sub_field('faq_02_answer');
								$image = get_sub_field('faq_02_image');
								?>
								<div class="secPanel accord">
									<div class="pHead">
										<h3><em>Q.</em><span><?php echo esc_html($question); ?></span></h3>
									</div>
									<div class="pBody">
										<?php if ($image): ?>
											<div class="secBox">
												<div class="photo"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></div>
												<div class="txt">
													<?php echo nl2br(esc_html($answer)); ?>
												</div>
											</div>
										<?php else: ?>
											<div class="txtBox">
												<div class="txt">
													<p><?php echo nl2br(esc_html($answer)); ?></p>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="section" id="sec03">
				<div class="secWrap01">
					<div class="pageSecSubTtlBox">
						<div class="pageSecSubTtl">
							<h3>工事について</h3>
						</div>
					</div>
					<div class="secPanelList">
						<?php if (have_rows('faq_section_03')): ?>
							<?php while (have_rows('faq_section_03')): the_row(); ?>
								<?php
								$question = get_sub_field('faq_03_question');
								$answer = get_sub_field('faq_03_answer');
								$image = get_sub_field('faq_03_image');
								?>
								<div class="secPanel accord">
									<div class="pHead">
										<h3><em>Q.</em><span><?php echo esc_html($question); ?></span></h3>
									</div>
									<div class="pBody">
										<?php if ($image): ?>
											<div class="secBox">
												<div class="photo"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></div>
												<div class="txt">
													<?php echo nl2br(esc_html($answer)); ?>
												</div>
											</div>
										<?php else: ?>
											<div class="txtBox">
												<div class="txt">
													<p><?php echo nl2br(esc_html($answer)); ?></p>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<!-- △メイン△-->
<?php get_footer(); ?>