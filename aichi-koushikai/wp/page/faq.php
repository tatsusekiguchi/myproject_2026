<?php
/*
Template Name: よくあるご質問
Template Post Type: page
*/
get_header();

$faq_sections = array(
	array(
		'key'   => 'faq_category01',
		'class' => 'faqCategory01',
		'title' => '愛知講師会の個別指導について',
	),
	array(
		'key'   => 'faq_category02',
		'class' => 'faqCategory02',
		'title' => '授業料・入会金について',
	),
	array(
		'key'   => 'faq_category03',
		'class' => 'faqCategory03',
		'title' => '時間割・授業回数について',
	),
	array(
		'key'   => 'faq_category04',
		'class' => 'faqCategory04',
		'title' => 'その他',
	),
);
?>

	<main class="faqMain" id="faq">
		<div class="pageKvContainer">
			<div class="pageKvPanel">
				<div class="pageKvTitle">
					<p>FAQ</p>
					<h1>よくあるご質問</h1>
				</div>
				<div class="topicPath">
					<ol>
						<li><a href="<?php echo esc_url( aichi_koushikai_page_url() ); ?>">HOME</a></li>
						<li>よくあるご質問</li>
					</ol>
				</div>
			</div>
		</div>

		<section class="sectionFaq">
			<div class="secWrap">
				<div class="linkList">
					<ul>
						<?php foreach ( $faq_sections as $faq_section ) : ?>
							<li class="li" data-target="<?php echo esc_attr( $faq_section['class'] ); ?>"><?php echo esc_html( $faq_section['title'] ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="faqPanel">
					<?php foreach ( $faq_sections as $faq_section ) : ?>
						<?php
						$faq_items = function_exists( 'get_field' ) ? get_field( $faq_section['key'] ) : array();
						$faq_items = is_array( $faq_items ) ? $faq_items : array();
						?>
						<div class="faqCategory <?php echo esc_attr( $faq_section['class'] ); ?>">
							<h2><?php echo esc_html( $faq_section['title'] ); ?></h2>
							<?php foreach ( $faq_items as $faq_item ) : ?>
								<dl class="accord">
									<dt>
										<div class="qBox">
											<p>Q</p>
										</div>
										<div class="txtBox">
											<p><?php echo esc_html( isset( $faq_item['faq_question'] ) ? $faq_item['faq_question'] : '' ); ?></p>
										</div>
									</dt>
									<dd>
										<div class="qBox">
											<p>A</p>
										</div>
										<div class="txtBox">
											<p><?php echo wp_kses_post( isset( $faq_item['faq_answer'] ) ? $faq_item['faq_answer'] : '' ); ?></p>
										</div>
									</dd>
								</dl>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	</main>

<?php get_footer(); ?>
