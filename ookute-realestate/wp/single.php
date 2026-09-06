<?php
get_header();

while ( have_posts() ) :
	the_post();

	$property_title  = get_field( 'property_title' );
	$building_images = array_filter(
		array(
			get_field( 'building_image_1' ),
			get_field( 'building_image_2' ),
			get_field( 'building_image_3' ),
			get_field( 'building_image_4' ),
			get_field( 'building_image_5' ),
		)
	);
	$floor_entries = get_field( 'floor_entries' );
	$floor_entries = is_array( $floor_entries ) ? $floor_entries : array();
	$available_floor_entries = array_values(
		array_filter(
			$floor_entries,
			static function ( $floor ) {
				$contract_status = $floor['contract_status'] ?? '';
				$detail_status   = $floor['status'] ?? '';

				return 'sold' !== $contract_status && 'contracted' !== $detail_status;
			}
		)
	);

	$get_attachment_url = static function ( $attachment ) {
		if ( is_array( $attachment ) ) {
			return $attachment['url'] ?? '';
		}

		if ( is_numeric( $attachment ) ) {
			return wp_get_attachment_url( (int) $attachment );
		}

		return is_string( $attachment ) ? $attachment : '';
	};

	$get_image_html = static function ( $image, $alt = '' ) use ( $get_attachment_url ) {
		if ( is_numeric( $image ) ) {
			return wp_get_attachment_image(
				(int) $image,
				'full',
				false,
				array( 'alt' => $alt )
			);
		}

		$url = $get_attachment_url( $image );
		return $url ? sprintf( '<img src="%s" alt="%s">', esc_url( $url ), esc_attr( $alt ) ) : '';
	};

	$render_detail = static function ( $label, $value, $unit = '', $class = '', $preserve_line_breaks = false ) {
		if ( '' === trim( wp_strip_all_tags( (string) $value ) ) ) {
			return;
		}

		$display_value = wp_kses_post( $value );
		if ( $preserve_line_breaks ) {
			$display_value = wpautop( $display_value );
		}
		?>
		<dl<?php echo $class ? ' class="' . esc_attr( $class ) . '"' : ''; ?>>
			<dt><?php echo esc_html( $label ); ?></dt>
			<dd><?php echo $display_value; ?><?php echo esc_html( $unit ); ?></dd>
		</dl>
		<?php
	};
	?>
	<main class="next propertyDetailMain">
		<article class="title_box top_level">
			<div class="inner">
				<h2 data-title="PROPERTY">物件情報</h2>
			</div>
		</article>
		<div class="pankuzu">
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
				<li>物件情報</li>
			</ul>
		</div>
		<div class="propertyDetail_container">
			<div class="contents_box">
				<div class="topTitle">
					<h3>物件情報</h3>
				</div>
				<div class="detailTopPanel">
					<div class="detailTopBox">
						<div class="ttl01">
							<p>賃貸</p>
						</div>
						<div class="ttl02">
							<p><?php echo esc_html( $property_title ?: get_the_title() ); ?></p>
						</div>
					</div>
				</div>

				<?php if ( $building_images ) : ?>
					<div class="caseSliderPanel caseSliderPanel--pc">
						<div class="caseSliderContainer">
							<div class="caseSlider">
								<?php foreach ( $building_images as $building_image ) : ?>
									<div class="slider">
										<?php echo $get_image_html( $building_image, $property_title ?: get_the_title() ); ?>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<div class="detailMainContainer">
					<?php if ( $building_images ) : ?>
						<div class="caseSliderPanel caseSliderPanel--sp">
							<div class="caseSliderContainer">
								<div class="caseSlider">
									<?php foreach ( $building_images as $building_image ) : ?>
										<div class="slider">
											<?php echo $get_image_html( $building_image, $property_title ?: get_the_title() ); ?>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php if ( get_field( 'pickup_comment' ) ) : ?>
						<div class="pickupPanel">
							<div class="ttl">PICK UP!</div>
							<div class="pickupBox">
								<?php echo wpautop( wp_kses_post( get_field( 'pickup_comment' ) ) ); ?>
							</div>
						</div>
					<?php endif; ?>

					<div class="detailPanelTop">
						<?php
						$render_detail( '所在地', esc_html( get_field( 'address' ) ) );
						$render_detail( '種目', esc_html( get_field( 'property_type' ) ) );
						$render_detail( '築年月', esc_html( get_field( 'built_date' ) ) );
						$render_detail( '設備・サービス', esc_html( get_field( 'facilities' ) ) );
						$render_detail( '交通', get_field( 'transportation' ), '', '', true );
						$render_detail( '階建／階', get_field( 'floors' ), '', '', true );
						$render_detail( '出店可能業種', get_field( 'available_businesses' ), '', 'remarks', true );
						?>
					</div>

					<?php if ( $available_floor_entries ) : ?>
						<div class="floorInfoPanel">
							<div class="pTtl">各フロア空き情報</div>
							<div class="floorInfoList">
								<?php foreach ( $available_floor_entries as $index => $floor ) : ?>
									<?php
									$contract_status = $floor['contract_status'] ?? '';
									$status_labels   = array(
										'negotiating' => '商談中',
										'sold'        => '契約済',
									);
									$status_text = 'price' === $contract_status
										? ( $floor['contract_price'] ?? '' ) . ' 万円'
										: ( $status_labels[ $contract_status ] ?? '' );
									$status_class = 'sold' === $contract_status ? 'black' : 'brown';
									?>
									<div class="floorInfo">
										<div class="floorBox01">
											<div class="floorTtl01">
												<p><?php echo esc_html( $floor['hierarchy_name'] ?? '' ); ?></p>
											</div>
											<div class="floorTtl02">
												<p>
													<?php
													if ( ! empty( $floor['summary_tsubo'] ) ) {
														echo esc_html( $floor['summary_tsubo']);
													}
													?>
												</p>
											</div>
											<?php if ( $status_text ) : ?>
												<div class="floorStatus">
													<p class="<?php echo esc_attr( $status_class ); ?>"><?php echo esc_html( $status_text ); ?></p>
												</div>
											<?php endif; ?>
										</div>
										<div class="floorBox02">
											<ul>
												<?php for ( $document_number = 1; $document_number <= 4; $document_number++ ) : ?>
													<?php
													$document_name = $floor[ 'document_name_' . $document_number ] ?? '';
													$document_url  = $get_attachment_url( $floor[ 'document_file_' . $document_number ] ?? '' );
													?>
													<?php if ( $document_name && $document_url ) : ?>
														<li>
															<a href="<?php echo esc_url( $document_url ); ?>" target="_blank" rel="noopener">
																<?php echo esc_html( $document_name ); ?>
															</a>
														</li>
													<?php endif; ?>
												<?php endfor; ?>
											</ul>
										</div>
										<div class="floorBox03">
											<button
												class="detailBtn<?php echo 0 === $index ? ' is-active' : ''; ?>"
												type="button"
												data-floor-index="<?php echo esc_attr( $index ); ?>"
												aria-controls="floor-detail-<?php echo esc_attr( $index + 1 ); ?>"
												aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
											>詳細を見る</button>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>

						<div class="storeInfoPanel">
							<?php foreach ( $available_floor_entries as $index => $floor ) : ?>
								<?php
								$detail_status = $floor['status'] ?? '';
								$detail_status_labels = array(
									'available'  => '空',
									'contracted' => '契約済',
								);
								$floor_images  = isset( $floor['floor_images'] ) && is_array( $floor['floor_images'] )
									? $floor['floor_images']
									: array();
								?>
								<div
									class="tabItem"
									id="floor-detail-<?php echo esc_attr( $index + 1 ); ?>"
									<?php echo 0 === $index ? '' : ' hidden'; ?>
								>
									<div class="titleBox">
										<div class="ttl01">
											<p<?php echo 'contracted' === $detail_status ? ' class="black"' : ''; ?>><?php echo esc_html( $detail_status_labels[ $detail_status ] ?? '' ); ?></p>
										</div>
										<div class="ttl02">
											<p><?php echo esc_html( $floor['floor_name'] ?? '' ); ?></p>
										</div>
									</div>

									<?php if ( $floor_images ) : ?>
										<div class="storeSlider">
											<?php foreach ( $floor_images as $floor_image ) : ?>
												<?php $image = $floor_image['image'] ?? ''; ?>
												<?php if ( $image ) : ?>
													<div class="slider">
														<?php echo $get_image_html( $image, $floor['floor_name'] ?? '' ); ?>
													</div>
												<?php endif; ?>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>

									<div class="storeDetail">
										<?php
										$render_detail( '賃料', esc_html( $floor['rent'] ?? '' ), '万円' );
										$render_detail( '管理費等', esc_html( $floor['management_fee'] ?? '' ), '円' );
										$render_detail( '坪単価', esc_html( $floor['tsubo_price'] ?? '' ), '万円' );
										$render_detail( '敷金', esc_html( $floor['deposit'] ?? '' ) );
										$render_detail( '補償金', esc_html( $floor['guarantee_deposit'] ?? '' ) );
										$render_detail( '礼金', esc_html( $floor['key_money'] ?? '' ) );
										$render_detail( '補償金償却', $floor['deposit_amortization'] ?? '', '', '', true );
										$render_detail( '維持管理等', $floor['maintenance'] ?? '', '', '', true );
										$render_detail( '状態', esc_html( $floor['condition'] ?? '' ) );
										$render_detail( '使用部分面積', esc_html( $floor['area'] ?? '' ), '㎡' );
										$render_detail( '坪数', esc_html( $floor['tsubo'] ?? '' ), '坪' );
										$render_detail( '建物構造・工法', esc_html( $floor['structure'] ?? '' ) );
										$render_detail( '契約期間', esc_html( $floor['contract_period'] ?? '' ) );
										$render_detail( '現況', esc_html( $floor['current_status'] ?? '' ) );
										$render_detail( '取引態様', esc_html( $floor['transaction_type'] ?? '' ) );
										$render_detail( '適格請求書発行', esc_html( $floor['qualified_invoice'] ?? '' ) );
										$render_detail( '引渡し可能時期', esc_html( $floor['delivery_date'] ?? '' ) );
										$render_detail( '物件番号', esc_html( $floor['property_number'] ?? '' ) );
										$render_detail( '備考', $floor['notes'] ?? '', '', 'remarks', true );
										?>
									</div>

									<?php if ( ! empty( $floor['google_map'] ) ) : ?>
										<div class="mapBox">
											<iframe src="<?php echo esc_url( $floor['google_map'] ); ?>" allowfullscreen loading="lazy"></iframe>
										</div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</main>
	<?php
endwhile;

get_footer();
