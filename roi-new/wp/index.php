<?php
get_header();

$roi_page_id = 7;
$roi_template_url = get_bloginfo('template_url');

if (!function_exists('roi_template_image')) {
	function roi_template_image($path) {
		global $roi_template_url;
		return $roi_template_url . '/' . ltrim($path, '/');
	}
}

if (!function_exists('roi_acf_value')) {
	function roi_acf_value($selector, $default = '', $post_id = null) {
		if (function_exists('get_field')) {
			$value = get_field($selector, $post_id);
			if ($value !== null && $value !== false && $value !== '' && $value !== []) {
				return $value;
			}
		}
		return $default;
	}
}

if (!function_exists('roi_group_value')) {
	function roi_group_value($group, $key, $default = '') {
		if (is_array($group) && isset($group[$key]) && $group[$key] !== '' && $group[$key] !== []) {
			return $group[$key];
		}
		return $default;
	}
}

if (!function_exists('roi_html')) {
	function roi_html($value) {
		$allowed_html = wp_kses_allowed_html('post');
		$allowed_html['br'] = ['class' => true];
		return wp_kses(nl2br((string) $value, false), $allowed_html);
	}
}

if (!function_exists('roi_html_enabled')) {
	function roi_html_enabled($value) {
		return nl2br((string) $value, false);
	}
}

if (!function_exists('roi_html_without_br')) {
	function roi_html_without_br($value) {
		return preg_replace('/<br\s*\/?>/i', '', roi_html($value));
	}
}

if (!function_exists('roi_attr')) {
	function roi_attr($value) {
		return esc_attr(wp_strip_all_tags((string) $value));
	}
}

if (!function_exists('roi_image_url')) {
	function roi_image_url($image, $default = '') {
		if (is_array($image)) {
			if (!empty($image['url'])) {
				return $image['url'];
			}
			if (!empty($image['ID'])) {
				return wp_get_attachment_image_url($image['ID'], 'full');
			}
		}
		if (is_numeric($image)) {
			return wp_get_attachment_image_url($image, 'full');
		}
		if (is_string($image) && $image !== '') {
			return $image;
		}
		return $default;
	}
}

if (!function_exists('roi_rows_have_image')) {
	function roi_rows_have_image($rows, $key = 'image') {
		if (!is_array($rows)) {
			return false;
		}
		foreach ($rows as $row) {
			if (is_array($row) && !empty($row[$key])) {
				return true;
			}
		}
		return false;
	}
}

$mv_pc_defaults = [
	['image' => roi_template_image('image/top/top_kv_01_pc.webp')],
	['image' => roi_template_image('image/top/top_kv_02_pc.webp')],
	['image' => roi_template_image('image/top/top_kv_03_pc.webp')],
	['image' => roi_template_image('image/top/top_kv_04_pc.webp')],
	['image' => roi_template_image('image/top/top_kv_05_pc.webp')],
];
$mv_sp_defaults = [
	['image' => roi_template_image('image/top/top_kv_01_sp.webp')],
	['image' => roi_template_image('image/top/top_kv_02_sp.webp')],
	['image' => roi_template_image('image/top/top_kv_03_sp.webp')],
	['image' => roi_template_image('image/top/top_kv_04_sp.webp')],
];
$mv_pc = roi_acf_value('mv_pc', [], $roi_page_id);
$mv_sp = roi_acf_value('mv_sp', [], $roi_page_id);
if (!roi_rows_have_image($mv_pc)) {
	$mv_pc = $mv_pc_defaults;
}
if (!roi_rows_have_image($mv_sp)) {
	$mv_sp = $mv_sp_defaults;
}

$about_default = [
	'title' => '自分らしく<br class="spBreak">働ける女性へ',
	'text' => '<p>私たちは、結婚・出産・家庭・仕事<br>どれかを諦めるのではなく、<br>人生を一緒に歩める会社を目指しています。</p><p>ROIでの仕事を通じて、<br>「技術者としての自信」「経済的な安心」「プライベートの充実」<br>を手にいれ、未来を選び取れる女性を増やしていきたい。</p><p>そのためにROIは、一人ひとりの想いを大切にし、共に協力し、<br>応援し合えるチームであり続けます。</p><p>ただの職場ではなく、人生の可能性を広げる“ステージ”。<br>それがROIの目指すビジョンです。</p>',
	'photo' => roi_template_image('image/top/about_img_pc.png'),
];
$about = roi_acf_value('about', $about_default, $roi_page_id);

$works_default = [
	'heading' => '髪質改善という、武器をあなたに。',
	'text' => '<p>髪質改善という一つの技術を誠実に磨き、お客様の悩みに確実に応える美容師を育てる。<br>教育体制を整え、安心して成長できる環境で、<br class="pcBreak">自信と信頼を積み重ねながら美容師人生を歩んでいけます。</p>',
	'list' => [
		['title' => '他にないオリジナルサービス<br>高品質な髪質改善', 'text' => '髪質改善のプログラムや薬剤はオリジナリティが魅力で、一度の施術でも変化を感じることのできる、クオリティの高いサービスがお客様から支持をいただける大きな要因です。'],
		['title' => 'じっくり向き合う接客スタイル<br>完全予約制', 'text' => '顧客単価が1万円以上の高単価サロンであるため、一度に何人ものお客様を担当することはありません。一人ひとりと丁寧に向き合うことができるマンツーマンでの接客を採用しています。'],
		['title' => '全員が丁寧な施術を提供<br>マニュアル施術＋寄り添う施術', 'text' => 'スタッフ誰もが髪質改善のプロフェッショナルとしてレベルの高いサービスを提供できるように、マニュアルを作成しています。カウンセリングから髪質改善施術、アフターカウンセリングに至るまでマニュアルが味方になり自信を持って施術に入ることができます。'],
		['title' => '来店サイクルをつくるシステム<br>長期的な関係構築', 'text' => 'ROIの髪質改善は長期的な髪の管理を行うことを目的としています。一度の施術で変化があっても、一度切りでは維持することができません。そのため、美しい髪を育むために、お客様一人ひとりと長く関係を構築することができます'],
	],
];
$works = roi_acf_value('works', $works_default, $roi_page_id);
$works_list = roi_group_value($works, 'list', $works_default['list']);
$works_images = [
	roi_template_image('image/top/works_list_01_pc.png'),
	roi_template_image('image/top/works_list_02_pc.png'),
	roi_template_image('image/top/works_list_03_pc.png'),
	roi_template_image('image/top/works_list_04_pc.png'),
];

$entry_text = roi_acf_value('entry_text', 'ご応募前の見学や<br class="spBreak">カジュアルなご相談も歓迎しています。<br>公式LINEまたはInstagramのDMより<br class="spBreak">お待ちしております。', $roi_page_id);

$environment_default = [
	'heading' => '一人ひとりが豊かに働けるように環境を整えています。',
	'text' => '<p>働いてくれているスタッフを大切にできてこそ、サロンが発展するという思いから、<br>スタッフにとって居心地が良く、仕事に集中でき、成長できるサロンづくりを行っています。</p>',
	'panels' => [
		'panel_01' => ['title' => 'ヘアエステ施術への誇り', 'dt' => '自信を持って提案できる、<br class="spBreak">一生モノの武器を。', 'dd' => '国内最高品質の商材を使用した「髪質改善」に特化。自信を持って提供できる確かな施術があるから、お客様からの「ありがとう」の質が変わります。安売りではない、プロとしての誇りを取り戻せる環境です。'],
		'panel_02' => ['title' => 'マンツーマン接客のゆとり', 'dt' => '掛け持ちのバタバタは卒業。<br>一人のお客様に、集中できる環境を。', 'dd' => '完全予約制のマンツーマン施術。<br class="spBreak">半個室の落ち着いた空間で、1日2〜4名のお客様とじっくり向き合いお客様のヘアスタイルを作りあげます。時間に追われず、あなたのファンを一人ずつ丁寧に増やしていける贅沢な働き方です。'],
		'panel_03' => ['title' => '収入・将来の安心', 'dt' => '頑張り損はさせません。<br class="spBreak">安定とやりがいを両立。', 'dd' => '業界高水準の保証月給27万で生活を支えつつ、あなたの頑張りは高歩合でしっかり還元。<br>【指名売上40%還元】<br>「予約表に一喜一憂する日々」ではなく、安定した環境で納得のいく収入を手にしてください。'],
		'panel_04' => ['title' => 'ママの居場所', 'dt' => '美容師も、ママも、<br class="spBreak">どちらも欲張っていい。', 'dd' => 'ブランクがあっても大丈夫。同じ悩みを持つママスタイリストが活躍しているから、お互い様の気持ちで支え合えます。<br>ライフステージが変わっても、大好きな美容師を諦める必要はありません。'],
		'panel_05' => ['title' => '1日5時間の時短社員などの<br>選べる勤務スタイル', 'dt' => '「お帰り」を言える時間に、<br class="spBreak">笑顔で帰ろう。', 'dd' => '自由シフト制で土日休みもOK。15時〜18時退勤が可能で、残業も一切ありません。<br class="spBreak">夕食の準備や趣味の時間など、仕事の後の「自分の人生」を何よりも大切にできるサロンです。'],
		'panel_06' => ['title' => '成果が出せる。<br class="spBreak">成長への最短ルート', 'dt' => 'ブランクや経験不足を、<br>マニュアルが自信に変える。', 'dd' => '独自のオペレーションマニュアルが完備されているので、入社後すぐにトップスタイリスト級のカウンセリングと施術が可能に。「感覚」ではなく「論理」で学べるから、迷いなくお客様の前に立てるようになります。'],
	],
];
$environment = roi_acf_value('environment', $environment_default, $roi_page_id);
$environment_panels = roi_group_value($environment, 'panels', $environment_default['panels']);

$voices_default = [
	['name' => '六鹿 百合子', 'position' => 'スタイリスト（歴13年）', 'join_year' => '2019年入社', 'lead' => 'ROIの髪質改善・カウンセリング・リピートに対する取り組みで固定のお客様が増え、お客様に支持して頂けるようになり、自分の成長を感じています。'],
	['name' => '兵藤 ありさ', 'position' => 'スタイリスト（歴8年）', 'join_year' => '2025年入社', 'lead' => '育休明けて初めてのサロン営業で子育てと両立できるか不安でしたが、なんとか毎日子供も頑張ってくれているのでそれを見て私も頑張れています。'],
	['name' => '加藤 あやみ', 'position' => 'スタイリスト（歴9年）', 'join_year' => '2026年入社', 'lead' => '働くママへの理解があり、子育てと美容師としての仕事を無理なく両立できる環境に魅力を感じています。マンツーマン施術でお客様としっかり向き合えるところも良かったです。'],
];
$voice_comments_default = [
	[
		['question' => 'ROIのここがすごい！と思うことはどんなことですか?', 'answer' => 'お給料や社会保険、お休みなどの条件がしっかりしていて、家からも通いやすかったことが、最初に惹かれたポイントでした。お客様が終わり次第、18時頃に帰宅できることが多く、残業も少ないため、プライベートの時間を大切にしながら働けています。<br>また、マンツーマン施術でお客様一人ひとりと丁寧に向き合えることや、新しいものを積極的に取り入れているのも魅力です。働きながら自然と知識や技術が身につき、美容師として成長できる環境だと感じています。'],
		['question' => '髪質改善やヘアケアに力を入れているサロンですが、それについてどう思いますか？', 'answer' => '髪質改善やヘアケアに力を入れていることで、私たち自身も「髪をきれいにするプロ」としての意識が高まると感じています。<br>コンセプトが統一されているので、サロン全体で同じ方向を向いて取り組めるところも、とても働きやすいポイントだと思います。<br>今後は、より一人ひとりのお客様に合ったケアや提案ができるよう、知識や技術をさらに深めていきたいです。'],
		['question' => '美容師という道を選んでよかったと思ったこと、ROIを選んでよかったと思うことを教えてください。', 'answer' => 'マンツーマン施術なので、一人ひとりのお客様としっかり向き合いながらヘアスタイルを作れることに、日々楽しさを感じています。<br>入社当初は、リピートや売り上げが安定せず悩むこともありましたが、ROIの髪質改善・カウンセリング・リピートに対する取り組みで固定のお客様が増え、お客様に支持して頂けるようになり、自分の成長を感じています。<br>その中で少しずつ信頼関係が築けるようになり、「ユリコさんがいい」と言っていただけた時は、美容師を選んでよかったと心から思いました。<br>お客様と長く関われる環境があることが、ROIで働く一番のやりがいだと感じています。'],
		['question' => '今後、どのような美容師になりたいですか。', 'answer' => 'これからも、お客様の気持ちに寄り添える美容師でありたいと思っています。<br>年齢やライフスタイルの変化によって変わっていく髪の悩みにも向き合い、その時々に合った提案ができる存在になりたいです。<br>安心して任せてもらえる関係を大切にしながら、長く通っていただける美容師を目指しています。'],
	],
	[
		['question' => 'ROIのここがすごい！と思うことはどんなことですか?', 'answer' => '子供が居ながらでも安心して働ける環境を探していて、土日休み、時短営業ができる、マンツーマンで施術できるところがROIだったので応募しました。実際働いてみて、お客様の綺麗を鮮度よくお手伝いするためにトリートメントや薬剤も進化し続けているところも魅力だと感じました。'],
		['question' => '髪質改善やヘアケアに力を入れているサロンですが、それについてどう思いますか？', 'answer' => '自分自身、昔から髪質に悩みがあったのでお客様の気持ちに寄り添って施術の提案ができたり、何度もご来店していただくお客様の髪の毛の変化を見ることができて楽しいです。以前働いていたところも髪質改善に力を入れていたので、今までの知恵や技術が活かせるのでよかったです。'],
		['question' => '美容師という道を選んでよかったと思ったこと、ROIを選んでよかったと思うことを教えてください。', 'answer' => 'お店に来ていただくだけで、とてもありがたいことなのに、お客様の方から「綺麗になって嬉しい」や「ありがとう」と感謝の言葉を言っていただけると、美容師としてやりがいを感じます。<br>ROIはマンツーマンで施術するので1日の施術人数が限られてくるので仕事終わりの疲労感が大きすぎないです。育休明けて初めてのサロン営業で子育てと両立できるか不安でしたが、なんとか毎日子供も頑張ってくれているのでそれを見て私も頑張れています。'],
		['question' => '今後、どのような美容師になりたいですか。', 'answer' => '自分自身が出産をした時、産後のヘアケアは後回しになりやすく、綺麗を保つことが難しかったので、同じママさんに向けて少しでも日々のケアが楽になるようなヘアスタイルの提案や、お家でできるホームケアをお伝えしていける美容師になりたいです。'],
	],
	[
		['question' => 'ROIに入社した理由はなんですか?', 'answer' => '今後の子育てと仕事の両立を考え、働き方を見直したいと思ったことがきっかけでした。安定したお給料と無理がなく自分のライフスタイルに合った待遇や環境と思えたため、ROIに入社を決めました。'],
		['question' => 'ROIで働いてみてどんな印象を抱きましたか？', 'answer' => '働くママへの理解があり、子育てと美容師としての仕事を無理なく両立できる環境に魅力を感じています。マンツーマン施術でお客様としっかり向き合えるところも良かったです。'],
		['question' => 'ROIの魅力はどんなところですか？', 'answer' => 'マニュアルがしっかり整っていて仕事が明確なので業務に迷わずとても働きやすくなりました。それと一人ひとりのお客様としっかり向き合えるようになり、お客様へ時間に余裕を持って担当できて、丁寧に接客ができるところも魅力です。'],
		['question' => 'ROIで働いてみて驚いたことはありますか？', 'answer' => '子供の予定に合わせて自由にシフトを決めれることです。以前の職場よりも、リピーターのお客様やお給料も安定して、子供との時間もしっかり取ることができるようになり生活が整いました。'],
		['question' => 'やりがいや喜びを感じる時はどんな時ですか？', 'answer' => '「次回もぜひお願いします」と言っていただけた時や、お客様の髪が自分が担当することにより、どんどんきれいになっていく過程を一緒に共有できるときに、とてもやりがいを感じます。'],
		['question' => '今後の目標と、求職者の方に一言お願いします。', 'answer' => 'ROIの髪質改善を通してたくさんのお客様をきれいにしていきたいです。ROIの髪質改善技術はとっても楽しくて、成長している実感があるのでやりがいがあります！皆さんもROIで一緒に働きましょう＾＾'],
	],
];
$voices = roi_acf_value('voices', $voices_default, $roi_page_id);
if (!$voices) {
	$voices = $voices_default;
}
$voice_list_images = [
	roi_template_image('image/top/voice_photo_01.png'),
	roi_template_image('image/top/voice_photo_02.png'),
	roi_template_image('image/top/voice_photo_03.png'),
];
$voice_modal_images = [
	[roi_template_image('image/top/voice_modal_1_1.png'), roi_template_image('image/top/voice_modal_1_2.png'), roi_template_image('image/top/voice_modal_1_3.png')],
	[roi_template_image('image/top/voice_modal_2_1.png'), roi_template_image('image/top/voice_modal_2_2.png'), roi_template_image('image/top/voice_modal_2_3.png')],
	[roi_template_image('image/top/voice_modal_3_1.png'), roi_template_image('image/top/voice_modal_3_2.png'), roi_template_image('image/top/voice_modal_3_3.png')],
];

$message_default = [
	'text' => '<p>髪質改善を通してお客様の人生で<br class="spBreak">一番キレイな髪をつくり、<br>お客様の人生に寄り添うサロンです</p><p>髪を整え、心を整える。<br>髪を整えることは、心を整えること。<br>ROIは「私らしく、また前を向ける場所」<br class="spBreak">でありたいと考えています。</p><p>お客様にとって<br>「安心できる」「明日への活力が生まれる」<br>そんな小さなエネルギーチャージができる<br>“心の拠り所”のようなサロン。</p><p>そしてスタッフにとっては、<br>「最高の技術」「心地よい接客」「仲間と助け合える環境」を大切にしながら、<br>自分のライフスタイルも大切にできる職場。<br>髪質改善を通して、<br class="pcBreak">関わるすべての人が笑顔で長く輝けるサロンを目指しています。</p><p>オーナー　杉山 泰久</p>',
	'photo_01' => roi_template_image('image/top/message_img_01.png'),
	'photo_02' => roi_template_image('image/top/message_img_02_pc.png'),
	'massage_photo' => roi_template_image('image/top/message_bg.png'),
];
$message = roi_acf_value('message', $message_default, $roi_page_id);

$faq_default = [
	['question' => 'サロン見学や説明会などはありますか？', 'answer' => 'はい、サロン見学やカジュアル面談を行っています。<br>実際の雰囲気や働き方、スタッフの様子を見ていただき、ここなら大丈夫と思って頂けたのち、入社を検討していただいて大丈夫です。<br>まずは公式LINEまたはInstagramのDMより、お気軽にご連絡ください。'],
	['question' => '少人数のサロンだと人間関係が不安です。どのような雰囲気ですか？', 'answer' => '少人数だからこそ、お互いを尊重しながら協力し合う落ち着いた雰囲気です。<br>無理に距離を詰めるような関係ではなく、それぞれの働き方や家庭の事情にも理解を持ちながら支え合っています。<br>人間関係に不安がある方も、まずはサロン見学やカジュアル面談で実際の雰囲気をご確認いただけます。'],
	['question' => 'マンツーマンだと、ずっと接客し続けなければいけませんか？', 'answer' => 'ずっと接客し続けなければいけない、ということはありません。<br>ROIのマンツーマン施術は、掛け持ちでバタバタするのではなく、一人のお客様に落ち着いて向き合うための働き方です。<br>必要な説明やカウンセリングはマニュアルがあり、丁寧に行いますが、無理に会話を続ける必要はなく、お客様の雰囲気に合わせて自然な距離感で接客していただけます。<br>高単価メニューで完全予約制で1日の担当人数も限られているため、時間に追われすぎず、丁寧な施術に集中しやすい環境です。'],
	['question' => '子供の急な発熱などで、お休みをいただくことは可能でしょうか？', 'answer' => 'はい、もちろん可能です。<br>実際に家庭と両立しているスタッフもいますので、そういった状況には理解のある環境です。無理して出勤するよりも、安心してお休みしていただくことを大切にしています。'],
	['question' => '指名売上のノルマや、無理な店販（商品販売）の押し売りはありますか？', 'answer' => 'ノルマや押し売りはありません。<br>ROIでは「お客様にとって本当に必要かどうか」を大切にしています。その結果として自然にリピートや店販につながる仕組みになっているので、無理に売る必要はありません。'],
	['question' => '40代ですが応募は可能ですか？また、若手スタッフ中心の環境でしょうか？', 'answer' => 'もちろんご応募いただけます。<br>年齢よりも「これからどう働きたいか」を大切にしています。落ち着いたお客様層なので、これまでの経験も活かしやすい環境だと思いますよ。'],
	['question' => '以前、手荒れが原因で美容師を諦めたのですが、また働けますか？', 'answer' => '状況にもよりますが、ぜひ一度ご相談いただきたいです。<br>ROIでは薬剤の品質にもこだわっているので、負担が軽減されるケースもあります。同じ悩みを持っていたスタッフもいますので、無理のない働き方を一緒に考えていけたらと思います。'],
	['question' => '土日にお休みをいただくのは、やはり気が引けるのですが、本当に大丈夫ですか？', 'answer' => 'はい、大丈夫です。<br>事前に相談していただければ土日のお休みもスタッフ全員が取得しています。プライベートも大切にしながら働いてほしいと考えていますので、遠慮せずにご相談ください。'],
	['question' => '半個室での施術とのことですが、バックヤードや休憩時間はどうなっていますか？', 'answer' => 'しっかり休める環境は整えています。<br>施術は半個室で集中できますが、バックヤードではきちんとリラックスできるようにしています。メリハリをつけて働ける環境です。'],
	['question' => '3年以上のブランクがあります。最新のトレンド技術がわからないと難しいですか？', 'answer' => 'まったく問題ありません。<br>ROIではトレンドを追い続けるというより、「再現性のある施術」と「成果が出せる技術」を大切にしています。ブランクがある方でも、安心して戻ってこれる環境です。入社後はあなたの得意とする事と合わせて髪質改善の理論から丁寧にお教えします。スタッフがしっかりサポートするので焦らなくて大丈夫ですよ。'],
];
$faq = roi_acf_value('faq', $faq_default, $roi_page_id);

$guideline = function_exists('get_field') ? get_field('guideline', $roi_page_id) : [];
if (!is_array($guideline)) {
	$guideline = [];
}

$flow = roi_acf_value('flow', [
	['text' => 'インスタグラムDMにてご連絡ください'],
	['text' => 'サロン見学・カジュアル面談'],
	['text' => '面接・面談'],
	['text' => '採用内定'],
], $roi_page_id);

$profile_default = [
	'name' => '髪質改善ヘアエステサロンROI',
	'access' => "岐阜県各務原市那加日新町5-9\n名鉄各務原線\n新加納駅から徒歩10分",
	'tel' => '058-383-8823',
	'hours' => '9:00 - 18:00',
	'closed' => '不定休',
	'parking' => 'あり',
	'salon_link' => ['title' => 'サロンサイトはこちら', 'url' => 'https://www.colors-8.com/', 'target' => '_blank'],
	'photo' => roi_template_image('image/top/profile_photo_pc.png'),
];
$profile = roi_acf_value('profile', $profile_default, $roi_page_id);
?>
	<!-- ▽メイン▽-->
	<main class="main" id="top">
		<div class="topMvContainer">
			<div class="mvPanel mvPanel--pc">
				<?php foreach ($mv_pc as $row) : $image_url = roi_image_url(roi_group_value($row, 'image')); if (!$image_url) continue; ?>
					<div class="mvBox"><img src="<?php echo esc_url($image_url); ?>" alt=""></div>
				<?php endforeach; ?>
			</div>
			<div class="mvPanel mvPanel--sp">
				<?php foreach ($mv_sp as $row) : $image_url = roi_image_url(roi_group_value($row, 'image')); if (!$image_url) continue; ?>
					<div class="mvBox"><img src="<?php echo esc_url($image_url); ?>" alt=""></div>
				<?php endforeach; ?>
			</div>
			<div class="titlePanel01">
				<div class="titleBox">
					<div class="sub">
						<p>Beauty that accompanies life.</p>
					</div>
					<div class="title">
						<h1>
							<span>人生に寄り添う、<br class="spBreak">美しさを。</span>
							<em>岐阜・各務原の<br class="spBreak">美容師求人・採用<br>髪質改善ヘアエステROI</em>
						</h1>
					</div>
				</div>
			</div>
			<div class="titlePanel02"><img class="switch" src="<?php echo esc_url(roi_template_image('image/top/top_kv_message_pc.png')); ?>" alt=""></div>
			<div class="sideFollow">
				<p>FOLLOW US ｜</p>
				<ul>
					<li><a href="https://www.instagram.com/gifu.roi/" target="_blank" rel="noopener"><img src="<?php echo esc_url(roi_template_image('image/common/icon_insta_black.png')); ?>" alt=""></a></li>
					<li><a href="https://lin.ee/q4BNJkT" target="_blank" rel="noopener"><img src="<?php echo esc_url(roi_template_image('image/common/icon_line_black.png')); ?>" alt=""></a></li>
				</ul>
			</div>
		</div>
		<div id="section__about">
			<div class="secPanel">
				<div class="txtBox">
					<div class="secTtl">
						<h2><?php echo roi_html(roi_group_value($about, 'title', $about_default['title'])); ?></h2>
					</div>
					<div class="txt">
						<?php echo roi_html(roi_group_value($about, 'text', $about_default['text'])); ?>
					</div>
				</div>
				<div class="photo"><img src="<?php echo esc_url(roi_image_url(roi_group_value($about, 'photo'), $about_default['photo'])); ?>" alt=""></div>
			</div>
		</div>
		<div id="section__works">
			<div class="secContainer">
				<div class="secTtl">
					<div class="sub">
						<p>WORKS</p>
					</div>
					<div class="ttl">
						<h2><span>ROI</span>の働き方</h2>
					</div>
				</div>
				<div class="topBox">
					<h3><?php echo roi_html(roi_group_value($works, 'heading', $works_default['heading'])); ?></h3>
					<div class="txt">
						<?php echo roi_html(roi_group_value($works, 'text', $works_default['text'])); ?>
					</div>
				</div>
				<div class="listBox">
					<ul>
						<?php foreach ($works_list as $index => $item) : ?>
							<li>
								<div class="photo"><img src="<?php echo esc_url(roi_image_url(roi_group_value($item, 'photo'), $works_images[$index] ?? $works_images[0])); ?>" alt=""></div>
								<dl>
									<dt><?php echo roi_html(roi_group_value($item, 'title')); ?></dt>
									<dd><?php echo roi_html(roi_group_value($item, 'text')); ?></dd>
								</dl>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="sectionEntry">
			<div class="entryPanel">
				<h2>ENTRY</h2>
				<div class="txt">
					<p><?php echo roi_html($entry_text); ?></p>
				</div>
				<div class="snsList">
					<div class="lineBtn"><a href="https://lin.ee/q4BNJkT" target="_blank" rel="noopener">
							<p>LINE</p>
							<div class="icon"><img src="<?php echo esc_url(roi_template_image('image/common/icon_arrow_circle_white.png')); ?>" alt=""></div>
						</a></div>
					<div class="instaBtn"><a href="https://www.instagram.com/gifu.roi/" target="_blank" rel="noopener">
							<p>INSTAGRAM</p>
							<div class="icon"><img src="<?php echo esc_url(roi_template_image('image/common/icon_arrow_circle_white.png')); ?>" alt=""></div>
						</a></div>
				</div>
			</div>
		</div>
		<div class="fixedPhotoContainer">
			<div class="fixedPhoto"><img src="<?php echo esc_url(roi_template_image('image/top/fixed_green_bg.png')); ?>" alt=""></div>
		</div>
		<div id="section__environment">
			<div class="secContainer">
				<div class="secTtl">
					<div class="sub">
						<p>ENVIRONMENT</p>
					</div>
					<div class="ttl">
						<h2>働く環境</h2>
					</div>
				</div>
				<div class="topBox">
					<h3><?php echo roi_html(roi_group_value($environment, 'heading', $environment_default['heading'])); ?></h3>
					<div class="txt">
						<?php echo roi_html(roi_group_value($environment, 'text', $environment_default['text'])); ?>
					</div>
				</div>
				<div class="secPanelList">
					<?php for ($i = 1; $i <= 6; $i++) : $key = sprintf('panel_%02d', $i); $panel = roi_group_value($environment_panels, $key, $environment_default['panels'][$key]); ?>
						<div class="secPanel">
							<div class="secBox">
								<div class="ttlBox">
									<div class="num">
										<p><?php echo esc_html(sprintf('%02d', $i)); ?></p>
									</div>
									<div class="ttl">
										<h4><?php echo roi_html(roi_group_value($panel, 'title', $environment_default['panels'][$key]['title'])); ?></h4>
									</div>
								</div>
								<div class="imgBox imgBox<?php echo esc_attr(sprintf('%02d', $i)); ?>">
									<div class="img img<?php echo esc_attr(sprintf('%02d', $i)); ?>"><img src="<?php echo esc_url(roi_template_image(sprintf('image/top/environment_img_%02d.png', $i))); ?>" alt=""></div>
								</div>
								<dl>
									<dt><?php echo roi_html(roi_group_value($panel, 'dt', $environment_default['panels'][$key]['dt'])); ?></dt>
									<dd><?php echo roi_html(roi_group_value($panel, 'dd', $environment_default['panels'][$key]['dd'])); ?></dd>
								</dl>
							</div>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
		<div id="section__voices">
			<div class="secContainer">
				<div class="secTtl">
					<div class="sub">
						<p>STAFF VOICES</p>
					</div>
					<div class="ttl">
						<h2>スタッフボイス</h2>
					</div>
				</div>
				<div class="secPanelList">
					<?php foreach ($voices as $index => $voice) : $modal_id = 'modal' . ($index + 1); ?>
						<div class="secPanel">
							<div class="secBox">
								<div class="photo"><img src="<?php echo esc_url($voice_list_images[$index] ?? $voice_list_images[0]); ?>" alt=""></div>
								<div class="txtBox">
									<div class="nameBox">
										<div class="name01">
											<p><?php echo roi_html(roi_group_value($voice, 'name', roi_group_value($voices_default[$index] ?? [], 'name'))); ?></p>
										</div>
										<div class="name02">
											<p><?php echo roi_html(roi_group_value($voice, 'position', roi_group_value($voices_default[$index] ?? [], 'position'))); ?></p>
										</div>
									</div>
									<div class="txt">
										<p><?php echo roi_html(roi_group_value($voice, 'lead', roi_group_value($voices_default[$index] ?? [], 'lead'))); ?></p>
									</div>
									<div class="more voiceModalOpen" data-modal-id="<?php echo esc_attr($modal_id); ?>">
										<div class="inner">
											<div class="box">
												<div class="ttl">
													<p>VIEW MORE</p>
												</div>
												<div class="arrow">
													<p>→</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="voiceItemOverlay overlay">
				<div class="itemModalContainer">
					<?php foreach ($voices as $index => $voice) : $modal_id = 'modal' . ($index + 1); $modal_photos = roi_group_value($voice, 'modal_photos', []); $modal_comments = roi_group_value($voice, 'modal_comments', $voice_comments_default[$index] ?? []); ?>
						<div class="voiceItemModal itemModal" data-modal="<?php echo esc_attr($modal_id); ?>">
							<div class="modalCloseArea">
								<div class="modalClose"><img src="<?php echo esc_url(roi_template_image('image/common/btn_modal_close.png')); ?>" alt=""></div>
							</div>
							<div class="modalBox">
								<div class="modalBoxInner">
									<div class="leftCont">
										<div class="staffSlidePanel">
											<div class="staffSlideBox">
												<?php
												$has_modal_photo = roi_rows_have_image($modal_photos, 'photo');
												$photos_to_show = $has_modal_photo ? $modal_photos : ($voice_modal_images[$index] ?? []);
												foreach ($photos_to_show as $photo) :
													$photo_url = is_array($photo) ? roi_image_url(roi_group_value($photo, 'photo')) : $photo;
													if (!$photo_url) continue;
												?>
													<div class="photo"><img src="<?php echo esc_url($photo_url); ?>" alt=""></div>
												<?php endforeach; ?>
											</div>
										</div>
										<div class="nameBox">
											<div class="name01">
												<p><?php echo roi_html(roi_group_value($voice, 'name', roi_group_value($voices_default[$index] ?? [], 'name'))); ?></p>
											</div>
											<div class="name02">
												<p><?php echo roi_html(roi_group_value($voice, 'position', roi_group_value($voices_default[$index] ?? [], 'position'))); ?><br><?php echo roi_html(roi_group_value($voice, 'join_year', roi_group_value($voices_default[$index] ?? [], 'join_year'))); ?></p>
											</div>
										</div>
									</div>
									<div class="rightCnt">
										<div class="commentBox">
											<?php foreach ($modal_comments as $comment) : ?>
												<dl>
													<dt><?php echo roi_html(roi_group_value($comment, 'question')); ?></dt>
													<dd><?php echo roi_html(roi_group_value($comment, 'answer')); ?></dd>
												</dl>
											<?php endforeach; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="modalClose modalClose--sp"><img src="<?php echo esc_url(roi_template_image('image/common/btn_modal_close.png')); ?>" alt=""></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div id="section__message">
			<div class="secContainer">
				<div class="secPanel">
					<div class="txtBox">
						<div class="inner">
							<div class="secTtl">
								<div class="sub">
									<p>OWNER MESSAGE</p>
								</div>
								<div class="ttl">
									<h2>私たちが<br class="spBreak">大切にしている事</h2>
								</div>
							</div>
							<div class="txt">
								<?php echo roi_html(roi_group_value($message, 'text', $message_default['text'])); ?>
							</div>
						</div>
					</div>
					<div class="photoBox">
						<div class="photo01">
							<div class="photo">
								<img src="<?php echo esc_url(roi_image_url(roi_group_value($message, 'photo_01'), $message_default['photo_01'])); ?>" alt="">
							</div>
						</div>
						<div class="photo02">
							<img src="<?php echo esc_url(roi_image_url(roi_group_value($message, 'photo_02'), $message_default['photo_02'])); ?>" alt=""></div>
					</div>
				</div>
			</div>
			<div class="massagePhoto"><img src="<?php echo esc_url(roi_image_url(roi_group_value($message, 'massage_photo'), $message_default['massage_photo'])); ?>" alt=""></div>
		</div>
		<div class="sectionEntry">
			<div class="entryPanel">
				<h2>ENTRY</h2>
				<div class="txt">
					<p><?php echo roi_html($entry_text); ?></p>
				</div>
				<div class="snsList">
					<div class="lineBtn"><a href="https://lin.ee/q4BNJkT" target="_blank" rel="noopener">
							<p>LINE</p>
							<div class="icon"><img src="<?php echo esc_url(roi_template_image('image/common/icon_arrow_circle_white.png')); ?>" alt=""></div>
						</a></div>
					<div class="instaBtn"><a href="https://www.instagram.com/gifu.roi/" target="_blank" rel="noopener">
							<p>INSTAGRAM</p>
							<div class="icon"><img src="<?php echo esc_url(roi_template_image('image/common/icon_arrow_circle_white.png')); ?>" alt=""></div>
						</a></div>
				</div>
			</div>
		</div>
		<div id="section__faq">
			<div class="secContainer">
				<div class="secTtl">
					<div class="sub">
						<p>FAQ</p>
					</div>
					<div class="ttl">
						<h2>よくある質問</h2>
					</div>
				</div>
				<div class="secBoxList">
					<?php foreach ($faq as $item) : ?>
						<div class="secBox">
							<dl class="accord">
								<dt><span>Q.</span><em><?php echo roi_html(roi_group_value($item, 'question')); ?></em></dt>
								<dd><span>A.</span>
									<div class="txt"><?php echo roi_html(roi_group_value($item, 'answer')); ?></div>
								</dd>
							</dl>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div id="section__guideline">
			<div class="secContainer">
				<div class="secTtl">
					<div class="sub">
						<p>GUIDELINE</p>
					</div>
					<div class="ttl">
						<h2>募集要項</h2>
					</div>
				</div>
				<div class="infoBox">
					<?php foreach ($guideline as $item) : ?>
						<?php if (!is_array($item)) continue; ?>
						<dl>
							<dt><?php echo roi_html_enabled(roi_group_value($item, 'dt', roi_group_value($item, 'field_roi_guideline_dt'))); ?></dt>
							<dd><?php echo roi_html_enabled(roi_group_value($item, 'dd', roi_group_value($item, 'field_roi_guideline_dd'))); ?></dd>
						</dl>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div id="section__flow">
			<div class="secContainer">
				<div class="secTtl">
					<div class="sub">
						<p>FLOW</p>
					</div>
					<div class="ttl">
						<h2>採用フロー</h2>
					</div>
				</div>
				<div class="flowList">
					<ol>
						<?php foreach ($flow as $item) : ?>
							<li><?php echo roi_html(roi_group_value($item, 'text')); ?></li>
						<?php endforeach; ?>
					</ol>
				</div>
			</div>
		</div>
		<div class="sectionEntry">
			<div class="entryPanel">
				<h2>ENTRY</h2>
				<div class="txt">
					<p><?php echo roi_html($entry_text); ?></p>
				</div>
				<div class="snsList">
					<div class="lineBtn"><a href="https://lin.ee/q4BNJkT" target="_blank" rel="noopener">
							<p>LINE</p>
							<div class="icon"><img src="<?php echo esc_url(roi_template_image('image/common/icon_arrow_circle_white.png')); ?>" alt=""></div>
						</a></div>
					<div class="instaBtn"><a href="https://www.instagram.com/gifu.roi/" target="_blank" rel="noopener">
							<p>INSTAGRAM</p>
							<div class="icon"><img src="<?php echo esc_url(roi_template_image('image/common/icon_arrow_circle_white.png')); ?>" alt=""></div>
						</a></div>
				</div>
			</div>
		</div>
		<div id="section__profile">
			<div class="secContainer">
				<div class="secTtl">
					<div class="sub">
						<p>SALON PROFILE</p>
					</div>
					<div class="ttl">
						<h2>サロン情報</h2>
					</div>
				</div>
				<div class="secBox">
					<div class="photo"><img src="<?php echo esc_url(roi_image_url(roi_group_value($profile, 'photo'), $profile_default['photo'])); ?>" alt=""></div>
					<div class="txtBox">
						<dl>
							<dt><?php echo roi_html(roi_group_value($profile, 'name', $profile_default['name'])); ?></dt>
							<dd>
								<div class="txt">
									<p><?php echo roi_html(roi_group_value($profile, 'access', $profile_default['access'])); ?></p>
								</div>
								<div class="txt"><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', roi_group_value($profile, 'tel', $profile_default['tel']))); ?>">Tel <?php echo esc_html(roi_group_value($profile, 'tel', $profile_default['tel'])); ?></a>
									<p>Open <?php echo esc_html(roi_group_value($profile, 'hours', $profile_default['hours'])); ?></p>
									<p>Close <?php echo esc_html(roi_group_value($profile, 'closed', $profile_default['closed'])); ?></p>
									<p>駐車場 <?php echo esc_html(roi_group_value($profile, 'parking', $profile_default['parking'])); ?></p>
								</div>
								<?php $salon_link = roi_group_value($profile, 'salon_link', $profile_default['salon_link']); ?>
								<?php if (is_array($salon_link) && !empty($salon_link['url'])) : ?>
									<div class="salonLink"><a href="<?php echo esc_url($salon_link['url']); ?>" target="<?php echo esc_attr($salon_link['target'] ?? '_self'); ?>" rel="noopener"><span><?php echo esc_html($salon_link['title'] ?? 'サロンサイトはこちら'); ?></span>
											<div class="icon"><img src="<?php echo esc_url(roi_template_image('image/common/icon_arrow_circle_blue.png')); ?>" alt=""></div>
										</a></div>
								<?php endif; ?>
							</dd>
						</dl>
					</div>
				</div>
				<div class="mapPanel">
					<div class="mapBox"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3252.4449044843964!2d136.8181615!3d35.3942212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6003a9000750690f%3A0xc8396788b5e31d91!2z6auq6LOq5pS55ZaE44OY44Ki44Ko44K544OGIFJPSQ!5e0!3m2!1sja!2sjp!4v1781796321874!5m2!1sja!2sjp" allow="fullscreen"></iframe></div>
				</div>
			</div>
		</div>
		<div class="bottomEntry" id="section__entry">
			<div class="entryPanel">
				<h2>ENTRY</h2>
				<div class="txt">
					<p>ご応募前の見学や<br class="spBreak">カジュアルなご相談も歓迎しています。<br>まずはサロンの雰囲気を見てみたい、<br class="spBreak">働き方や給与について話を聞いてみたい、<br>という方もお気軽にご連絡ください。<br>公式LINEまたはInstagramのDMより<br class="spBreak">お待ちしております。</p>
				</div>
				<div class="snsList">
					<div class="lineBtn"><a href="https://lin.ee/q4BNJkT" target="_blank" rel="noopener">
							<p>LINE</p>
							<div class="icon"><img src="<?php echo esc_url(roi_template_image('image/common/icon_arrow_circle_white.png')); ?>" alt=""></div>
						</a></div>
					<div class="instaBtn"><a href="https://www.instagram.com/gifu.roi/" target="_blank" rel="noopener">
							<p>INSTAGRAM</p>
							<div class="icon"><img src="<?php echo esc_url(roi_template_image('image/common/icon_arrow_circle_white.png')); ?>" alt=""></div>
						</a></div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>
