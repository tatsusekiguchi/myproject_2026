<?php
/*
Template Name: よくあるご質問
*/
?>
<?php get_header(); ?>
	<?php
	if(!function_exists('actyou_render_faq_questions')):
		function actyou_render_faq_questions($field_name) {
			if(!function_exists('get_field')) {
				return;
			}

			$faq_questions = get_field($field_name);

			if(!$faq_questions) {
				return;
			}

			foreach($faq_questions as $faq_question):
				$question = isset($faq_question['question']) ? trim($faq_question['question']) : '';
				$answer = isset($faq_question['answer']) ? trim($faq_question['answer']) : '';

				if(!$question || !$answer):
					continue;
				endif;
				?>
						<div class="faqBox">
							<dl class="accord">
								<dt><span>Q.</span><em><?php echo esc_html($question); ?></em></dt>
								<dd>
									<div class="txt">
										<p><?php echo wp_kses_post($answer); ?></p>
									</div>
								</dd>
							</dl>
						</div>
				<?php
			endforeach;
		}
	endif;
	?>
	<main class="main" id="faq">
		<div class="pageKvContainer">
			<div class="pageKv">
				<div class="kvTitle">
					<h1>よくあるご質問</h1>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="pageSecTtlBox">
					<h2>よくあるご質問</h2>
					<p>FAQ</p>
				</div>
				<div class="linkList">
					<ul>
						<li data-target="faq01">ご予約について</li>
						<li data-target="faq02">ご予約の取消・変更について</li>
						<li data-target="faq03">お支払いについて</li>
						<li data-target="faq04">旅行中のイレギュラーに関すること</li>
						<li data-target="faq05">海外旅行に関すること</li>
						<li data-target="faq06">その他</li>
					</ul>
				</div>
				<div class="section faq01">
					<div class="secTtl">
						<h3>ご予約について</h3>
					</div>
					<div class="faqPanel">
						<div class="faqBox">
							<dl class="accord">
								<dt><span>Q.</span><em>ツアーを予約するには、どのような方法がありますか？</em></dt>
								<dd>
									<div class="txt">
										<p>まずは、お電話、もしくはメールフォームにてお問合せください。<br>２～３日営業日を目安に担当者からご連絡いたします。</p>
									</div>
									<div class="itemList">
										<div class="itemBox">
											<dl>
												<dt>個人・法人のお客様</dt>
												<dd>
													<div class="telBox">
														<div class="tel01"><a href="tel:0529613369">052-961-3369</a></div>
													</div>
												</dd>
											</dl>
										</div>
										<div class="itemBox">
											<dl>
												<dt>学校・教育関連のお客様</dt>
												<dd>
													<div class="telBox">
														<div class="tel01"><a href="tel:0529515510">052-951-5510</a></div>
													</div>
												</dd>
											</dl>
										</div>
										<div class="itemBox">
											<dl>
												<dt>旅行会社のお客様</dt>
												<dd>
													<div class="telBox">
														<div class="tel01"><a href="tel:0529613360">052-961-3360</a></div>
													</div>
												</dd>
											</dl>
										</div>
										<div class="itemBox">
											<div class="mailBox"><a href=""><span>MAILFORM</span></a></div>
										</div>
									</div>
								</dd>
							</dl>
						</div>
						<?php actyou_render_faq_questions('faq_reservation_questions'); ?>
					</div>
				</div>
				<div class="section faq02">
					<div class="secTtl">
						<h3>ご予約の取消・変更について</h3>
					</div>
					<div class="faqPanel">
						<div class="faqBox">
							<dl class="accord">
								<dt><span>Q.</span><em>予約内容を変更、または取消したい場合はどうしたらいいですか？</em></dt>
								<dd>
									<div class="txt">
										<p>予約変更・お取消しについてはお電話・メールにて承ります。<br>変更手数料・お取消料が発する場合は、担当者からお伝えいたします。</p>
									</div>
									<div class="itemList">
										<div class="itemBox">
											<dl>
												<dt>個人・法人のお客様</dt>
												<dd>
													<div class="telBox">
														<div class="tel01"><a href="tel:0529613369">052-961-3369</a></div>
													</div>
												</dd>
											</dl>
										</div>
										<div class="itemBox">
											<dl>
												<dt>学校・教育関連のお客様</dt>
												<dd>
													<div class="telBox">
														<div class="tel01"><a href="tel:0529515510">052-951-5510</a></div>
													</div>
												</dd>
											</dl>
										</div>
										<div class="itemBox">
											<dl>
												<dt>旅行会社のお客様</dt>
												<dd>
													<div class="telBox">
														<div class="tel01"><a href="tel:0529613360">052-961-3360</a></div>
													</div>
												</dd>
											</dl>
										</div>
										<div class="itemBox">
											<div class="mailBox"><a href=""><span>MAILFORM</span></a></div>
										</div>
									</div>
								</dd>
							</dl>
						</div>
						<?php actyou_render_faq_questions('faq_cancel_questions'); ?>
					</div>
				</div>
				<div class="section faq03">
					<div class="secTtl">
						<h3>お支払いについて</h3>
					</div>
					<div class="faqPanel">
						<?php actyou_render_faq_questions('faq_payment_questions'); ?>
					</div>
				</div>
				<div class="section faq04">
					<div class="secTtl">
						<h3>旅行中のイレギュラーに関すること</h3>
					</div>
					<div class="faqPanel">
						<?php actyou_render_faq_questions('faq_irregular_questions'); ?>
					</div>
				</div>
				<div class="section faq05">
					<div class="secTtl">
						<h3>海外旅行に関すること</h3>
					</div>
					<div class="faqPanel">
						<?php actyou_render_faq_questions('faq_overseas_questions'); ?>
					</div>
				</div>
				<div class="section faq06">
					<div class="secTtl">
						<h3>その他</h3>
					</div>
					<div class="faqPanel">
						<div class="faqBox">
							<dl class="accord">
								<dt><span>Q.</span><em>旅行会社様用専用ページのID・PWを忘れてしまいました。</em></dt>
								<dd>
									<div class="txt">
										<p>お電話にてお問合せください。</p>
									</div>
									<div class="itemList">
										<div class="itemBox">
											<dl>
												<dt>旅行会社のお客様</dt>
												<dd>
													<div class="telBox">
														<div class="tel01"><a href="tel:0529613360">052-961-3360</a></div>
													</div>
												</dd>
											</dl>
										</div>
									</div>
								</dd>
							</dl>
						</div>
						<?php actyou_render_faq_questions('faq_other_questions'); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
