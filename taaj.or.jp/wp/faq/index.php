<?php
/*
Template Name: よくあるご質問
*/
?>
<?php get_header(); ?>
<main class="main" id="faq">
	<div class="pageTitleContainer">
		<div class="pageTitleBox">
			<h1>よくあるご質問</h1>
			<p>FAQ</p>
		</div>
	</div>
	<div class="topContainer">
		<div class="secWrap01">
			<div class="pageLinkList linkList">
				<ul>
					<li data-target="sec01">大会や研修の参加について</li>
					<li data-target="sec02">入会と情報について</li>
					<li data-target="sec03">トレーニングと資格取得について</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="sectionContainer">
		<?php if (have_rows('faq_section_01')): ?>
		<div class="sec01 section">
			<div class="secWrap01">
				<div class="subSecTtl">
					<h2>大会や研修の参加について</h2>
				</div>
				<?php while (have_rows('faq_section_01')): the_row(); ?>
				<div class="faqContainer">
					<dl class="accord">
						<dt><span>Q.</span><em><?php echo esc_html(get_sub_field('faq_01_question')); ?></em></dt>
						<dd>
							<p><?php echo nl2br(esc_html(get_sub_field('faq_01_answer'))); ?></p>
						</dd>
					</dl>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if (have_rows('faq_section_02')): ?>
		<div class="sec02 section">
			<div class="secWrap01">
				<div class="subSecTtl">
					<h2>入会と情報について</h2>
				</div>
				<?php while (have_rows('faq_section_02')): the_row(); ?>
				<div class="faqContainer">
					<dl class="accord">
						<dt><span>Q.</span><em><?php echo esc_html(get_sub_field('faq_02_question')); ?></em></dt>
						<dd>
							<p><?php echo nl2br(esc_html(get_sub_field('faq_02_answer'))); ?></p>
						</dd>
					</dl>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if (have_rows('faq_section_03')): ?>
		<div class="sec03 section">
			<div class="secWrap01">
				<div class="subSecTtl">
					<h2>トレーニングと資格取得について</h2>
				</div>
				<?php while (have_rows('faq_section_03')): the_row(); ?>
				<div class="faqContainer">
					<dl class="accord">
						<dt><span>Q.</span><em><?php echo esc_html(get_sub_field('faq_03_question')); ?></em></dt>
						<dd>
							<p><?php echo nl2br(esc_html(get_sub_field('faq_03_answer'))); ?></p>
						</dd>
					</dl>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>