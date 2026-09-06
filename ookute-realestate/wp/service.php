<?php
/*
Template Name: 事業内容
*/
?>
<?php get_header(); ?>
<main class="next service">
  <article class="title_box top_level">
    <div class="inner">
      <h2 data-title="SERVICE">事業内容</h2>
    </div>
  </article>
  <div class="pankuzu">
    <ul>
      <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
      <li>事業内容</li>
    </ul>
  </div>
  <div class="contents_box">
    <section class="service_box">
      <!--<h3>自分らしく、あなたらしい、<br>
        価値を提供します。</h3>-->
      <div class="text_box">
        <p>株式会社三代目大久手不動産では不動産の賃貸・管理を中心に様々な事業を行っています。<br class="pc">
          地域の特性やニーズに配慮し、お客様のお悩みに合わせてご提案いたします。</p>
      </div>
      <div class="list_box">
        <section id="service01">
          <div class="text_box">
            <h4><span data-title="01">SERVICE</span><strong>不動産の売買・賃貸・仲介</strong></h4>
            <div class="text">
              <p>土地、建物の不動産売買や、賃貸・仲介等を行っています。</p>
            </div>
          </div>
          <div class="image_box">
            <p><img src="<?php bloginfo('template_url'); ?>/common/image/service/service_01.png" alt="不動産の売買・賃貸・仲介"></p>
          </div>
        </section>
        <section id="service02">
          <div class="text_box">
            <h4><span data-title="02">SERVICE</span><strong>土地建物の総合管理</strong></h4>
            <div class="text">
              <p>建物設備等、環境に配慮した快適な環境を提供しています。<br>また、防犯体制の強化を行い事故・犯罪の未然防止に努めています。</p>
            </div>
          </div>
          <div class="image_box">
            <p><img src="<?php bloginfo('template_url'); ?>/common/image/service/service_02.png" alt="土地建物の総合管理"></p>
          </div>
        </section>
        <section id="service03">
          <div class="text_box">
            <h4><span data-title="03">SERVICE</span><strong>店舗の経営・賃貸</strong></h4>
            <div class="text">
              <p>店舗・テナント物件の経営や賃貸を行っています。</p>
            </div>
          </div>
          <div class="image_box">
            <p><img src="<?php bloginfo('template_url'); ?>/common/image/service/service_03.png" alt="店舗の経営・賃貸"></p>
          </div>
        </section>


      </div>
    </section>
  </div>
</main>
<?php get_footer(); ?>