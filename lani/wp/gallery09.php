<?php
/*
Template Name: 乗せ放題
*/
?>
<?php get_header(); ?>

	<article id="gallery" class="page">

		<!--▽kv▽-->
		<div class="kv">
			<div class="kvWrap">
				<h1><img src="<?php echo get_template_directory_uri(); ?>/image/top/kv_ttl.png" alt=""></h1>
			</div>
		</div>
		<!--△kv△-->

		<!--▽galleryBox▽-->
		<section id="galleryBox">
			<h2 class="secTtl"><span><span>GALLERY</span></span></h2>
			<div class="contWrap">
				<div class="listPanel">
					<div class="listBox listBox01">
						<ul>
							<li>
								<a href="<?php echo home_url() ?>/gallery01/"
								><img src="<?php echo get_template_directory_uri(); ?>/image/top/gallery_bnr_01.png" alt="酵素風呂"
								/></a>
							</li>
							<li>
								<a href="<?php echo home_url() ?>/gallery02/"
								><img src="<?php echo get_template_directory_uri(); ?>/image/top/gallery_bnr_02.png" alt="よもぎ蒸し"
								/></a>
							</li>
							<li>
								<a href="<?php echo home_url() ?>/gallery03/"
								><img src="<?php echo get_template_directory_uri(); ?>/image/top/gallery_bnr_03.png" alt="コルギ"
								/></a>
							</li>
							<li>
								<a href="<?php echo home_url() ?>/gallery04/"
								><img src="<?php echo get_template_directory_uri(); ?>/image/top/gallery_bnr_04.png" alt="ネイル"
								/></a>
							</li>
						</ul>
					</div>
					<div class="listBox listBox02">
						<ul>
							<li>
								<a href="<?php echo home_url() ?>/gallery05/"
								><img src="<?php echo get_template_directory_uri(); ?>/image/top/gallery_bnr_05.png" alt="まつげ"
								/></a>
							</li>
							<li>
								<a href="<?php echo home_url() ?>/gallery06/"
								><img src="<?php echo get_template_directory_uri(); ?>/image/top/gallery_bnr_06.png" alt="ダイエット"
								/></a>
							</li>
							<li>
								<a href="<?php echo home_url() ?>/gallery07/"
								><img src="<?php echo get_template_directory_uri(); ?>/image/top/gallery_bnr_07.png" alt="ホワイトニング"
								/></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!--△galleryBox△-->

		<div class="galleryList">
			<div class="contWrap">
				<ul class="phtoList">
				    <?php
				    //グループ名を設定しループスタート
				    $repeat_group = SCF::get( 'img-group-01' );
				    foreach ( $repeat_group as $fields ) { ?>
				        <li>
				        	<?php
	                        $imageItem = wp_get_attachment_image_src($fields['cf-img'], '');
	                        ?>
				        	<a href="<?php echo $imageItem[0] ;?>" data-fancybox="group">
				        		<img src="<?php echo $imageItem[0] ;?>" alt="">
				        	</a>

				        </li>
				    <?php }  // ループ終了 ?>
				</ul>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('[data-fancybox]').fancybox();
			});
		</script>
	</article>

<?php get_footer(); ?>
