<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
<main class="next contact">
  <article class="title_box top_level">
    <div class="inner">
      <h2 data-title="CONTACT">お問い合わせ</h2>
    </div>
  </article>
  <div class="pankuzu">
    <ul>
      <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
      <li>お問い合わせ</li>
    </ul>
  </div>
  <div class="contents_box">
    <div class="contact_box">
      <h3>弊社へのお問い合わせ</h3>
      <div class="text_box">
        <p> 弊社へのお問い合わせは下記電話番号までご連絡くださいませ。</p>
      </div>
      <section class="contact_tel">
        <h4>お電話でのお問い合わせ</h4>
        <strong>TEL.<span>052-325-3140</span></strong>
        <p>(受付時間：平日10：00～17：00）</p>
      </section>
      <!--<section class="contact_mail">
        <h4>メールでのお問い合わせ</h4>
        <p> お問い合わせは下記フォームにご入力のうえ送信ください。折り返し担当者よりご連絡させていただきます。<br>
          万が一3日以内に返信がない場合はメールが送信出来ていない可能性がございます。<br>
          その際はお手数ですが、お電話にてお問い合わせください。<br>
          尚、お客様からいただいた個人情報は、慎重に取り扱い、お客様のご同意なしに第三者に提供または開示することはありません。 </p>
      </section>-->
      <!--<div class="contact_box">
        <form id="mailformpro" action="mailformpro/mailformpro.cgi" method="POST">
          <div class="entry">
            <div class="title">
              <div class="titles">
                <p>会社名</p>
              </div>
              <div class="must_on"></div>
            </div>
            <div class="input">
              <ul>
                <li>
                  <div class="w200">
                    <input type="text" name="会社名" size="50">
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="entry">
            <div class="title">
              <div class="titles">
                <p>お名前</p>
              </div>
              <div class="must_on"><span class="must">必須</span></div>
            </div>
            <div class="input">
              <ul>
                <li>
                  <div class="w200">
                    <input type="text" name="お名前" size="40" data-kana="フリガナ"
										required="required">
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="entry">
            <div class="title">
              <div class="titles">
                <p>メールアドレス</p>
              </div>
              <div class="must_on"><span class="must">必須</span></div>
            </div>
            <div class="input">
              <ul>
                <li>
                  <div class="w400">
                    <input type="email" data-type="email" size="50" name="email"
												required="required">
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="entry">
            <div class="title">
              <div class="titles">
                <p>住所</p>
              </div>
            </div>
            <div class="input">
              <ul>
                <li class="mb10">
                  <div class="text inline postal">
                    <p>〒</p>
                  </div>
                  <div class="w400 inline postal">
                    <input type="number" size="30" data-type="postal" name="postal1">
                  </div>
                  <div class="text inline postal">
                    <p>-</p>
                  </div>
                  <div class="w400 inline postal">
                    <input type="number" size="30" data-type="postal" name="postal2">
                  </div>
                </li>
                <li class="mb10">
                  <div class="text">
                    <p>都道府県</p>
                  </div>
                  <div class="w200 select">
                    <select name="都道府県">
                      <option value="0" selected="selected">---</option>
                      <option value="1">北海道</option>
                      <option value="2">青森県</option>
                      <option value="3">岩手県</option>
                      <option value="4">宮城県</option>
                      <option value="5">秋田県</option>
                      <option value="6">山形県</option>
                      <option value="7">福島県</option>
                      <option value="8">茨城県</option>
                      <option value="9">栃木県</option>
                      <option value="10">群馬県</option>
                      <option value="11">埼玉県</option>
                      <option value="12">千葉県</option>
                      <option value="13">東京都</option>
                      <option value="14">神奈川県</option>
                      <option value="15">新潟県</option>
                      <option value="16">富山県</option>
                      <option value="17">石川県</option>
                      <option value="18">福井県</option>
                      <option value="19">山梨県</option>
                      <option value="20">長野県</option>
                      <option value="21">岐阜県</option>
                      <option value="22">静岡県</option>
                      <option value="23">愛知県</option>
                      <option value="24">三重県</option>
                      <option value="25">滋賀県</option>
                      <option value="26">京都府</option>
                      <option value="27">大阪府</option>
                      <option value="28">兵庫県</option>
                      <option value="29">奈良県</option>
                      <option value="30">和歌山県</option>
                      <option value="31">鳥取県</option>
                      <option value="32">島根県</option>
                      <option value="33">岡山県</option>
                      <option value="34">広島県</option>
                      <option value="35">山口県</option>
                      <option value="36">徳島県</option>
                      <option value="37">香川県</option>
                      <option value="38">愛媛県</option>
                      <option value="39">高知県</option>
                      <option value="40">福岡県</option>
                      <option value="41">佐賀県</option>
                      <option value="42">長崎県</option>
                      <option value="43">熊本県</option>
                      <option value="44">大分県</option>
                      <option value="45">宮崎県</option>
                      <option value="46">鹿児島県</option>
                      <option value="47">沖縄県</option>
                    </select>
                  </div>
                </li>
                <li class="mb10">
                  <div class="text">
                    <p>市区町村・番地</p>
                  </div>
                  <div class="w400 inline">
                    <input type="text" size="70" name="市区町村・番地">
                  </div>
                </li>
                <li class="mb10">
                  <div class="text">
                    <p>マンション・ビル名</p>
                  </div>
                  <div class="w400 inline">
                    <input type="text" size="70" name="マンション・ビル名">
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="entry">
            <div class="title">
              <div class="titles">
                <p>電話番号</p>
              </div>
            </div>
            <div class="input">
              <ul>
                <li>
                  <div class="w200">
                    <input type="tel" data-type="tel" name="電話番号"
														data-min="9">
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="entry">
            <div class="title">
              <div class="titles">
                <p>お問い合わせ内容</p>
              </div>
              <div class="must_on"><span class="must">必須</span></div>
            </div>
            <div class="input">
              <ul>
                <li>
                  <div class="w200"> <span class="radio radio radio inline">
                    <label for="お問い合わせ">
                      <input class="radio_buttons required m_right10"
												required="required" type="radio" value="お問い合わせ"
												name="お問い合わせ内容">
                      お問い合わせ</label>
                    </span><br>
                    <span class="radio radio radio inline">
                    <label for="採用エントリー">
                      <input class="radio_buttons required m_right10"
												required="required" type="radio" value="採用エントリー"
												 name="お問い合わせ内容">
                      採用エントリー</label>
                    </span><br>
                    <span class="radio radio radio inline">
										<label for="インターンシップ申込">
											<input class="radio_buttons required m_right10"
												required="required" type="radio" value="インターンシップ申込"
												name="お問い合わせ内容"> インターンシップ申込</label>
									</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="entry">
            <div class="title">
              <div class="titles">
                <p>お問い合わせ内容詳細</p>
              </div>
              <div class="must_on"><span class="must">必須</span></div>
            </div>
            <div class="input">
              <ul>
                <li>
                  <div>
                    <textarea name="お問い合わせ内容詳細"></textarea>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <p class="entry_p">個人情報の利用については<a href="policy.html">｢個人情報保護方針｣</a>をご確認ください｡</p>
          <div class="mfp_buttons">
            <button type="submit">送信する</button>
          </div>
        </form>
        <script type="text/javascript" id="mfpjs" src="mailformpro/mailformpro.cgi"
										charset="UTF-8"></script>
      </div>-->
    </div>
  </div>
</main>
<?php get_footer(); ?>