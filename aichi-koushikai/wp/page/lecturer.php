<?php
/*
Template Name: 講師紹介
Template Post Type: page
*/
get_header();
?>

	<main class="lecturerMain" id="lecturer">
		<div class="pageKvContainer">
			<div class="pageKvPanel">
				<div class="pageKvTitle">
					<p>LECTURER</p>
					<h1>講師紹介</h1>
				</div>
				<div class="topicPath">
					<ol>
						<li><a href="<?php echo esc_url( aichi_koushikai_page_url() ); ?>">HOME</a></li>
						<li>講師紹介</li>
					</ol>
				</div>
			</div>
		</div>
		<section class="sectionLecturer">
			<div class="secWrap01">
				<div class="lecturerList">
					<div class="lecturerItem">
						<div class="lecturerHead">
							<p class="role">塾長</p>
							<p class="name">篠崎 紗穂</p>
						</div>
						<div class="lecturerWrap">
							<div class="lecturerPhoto"><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/lecturer/lecturer_photo_01.png' ) ); ?>" alt="" width="1000" height="420" loading="lazy"></div>
							<div class="lecturerBody">
								<div class="lecturerBlock"><span class="lecturerLabel">プロフィール</span>
									<p>ここにプロフィール文が入ります。ここにはプロフィール文が入ります。ここにプロフィール文が入ります。ここにはプロフィール文が入ります。</p>
								</div>
								<div class="lecturerBlock"><span class="lecturerLabel">メッセージ</span>
									<p>ここはメッセージが入ります。ここには生徒、親御さんに向けたメッセージが入ります。ここはメッセージが入ります。ここには生徒、親御さんに向けたメッセージが入ります。ここはメッセージが入ります。ここには生徒、親御さんに向けたメッセージが入ります。</p>
								</div>
							</div>
						</div>
					</div>
					<div class="lecturerItem">
						<div class="lecturerHead">
							<p class="role">講師</p>
							<p class="name">○○　○○</p>
						</div>
						<div class="lecturerWrap">
							<div class="lecturerPhoto"><img src="<?php echo esc_url( aichi_koushikai_asset_url( 'image/lecturer/lecturer_photo_02.png' ) ); ?>" alt="" width="1000" height="420" loading="lazy"></div>
							<div class="lecturerBody">
								<div class="lecturerBlock"><span class="lecturerLabel">プロフィール</span>
									<p>ここにプロフィール文が入ります。ここにはプロフィール文が入ります。ここにプロフィール文が入ります。ここにはプロフィール文が入ります。</p>
								</div>
								<div class="lecturerBlock"><span class="lecturerLabel">メッセージ</span>
									<p>ここはメッセージが入ります。ここには生徒、親御さんに向けたメッセージが入ります。ここはメッセージが入ります。ここには生徒、親御さんに向けたメッセージが入ります。ここはメッセージが入ります。ここには生徒、親御さんに向けたメッセージが入ります。</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>


<?php get_footer(); ?>

