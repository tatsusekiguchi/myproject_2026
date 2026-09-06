/* Javascript */

$(document).ready(function () {
  //幅に応じて読み込む画像を変更する
  switchWindow();

  //スクロール位置に応じてヘッダー固定
  setHeaderFixed();

  //ページ上部からメニューがにゅっと出る(スマホ)
  slideNavToggle();

  //ページトップへなめらかスクロール
  setPageTop();

  //ページ内リンクでスムーススクロール
  smoothScroll();

  //telリンクをスマートフォン端末以外では無効にする
  setTelLink();
});

//======================================================================================================
// switchWindow( )
// 機能  ：画像の表示切り替え
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function switchWindow() {
  $(window).on("load resize", function () {
    var w = $(window).width();
    var x = 1024; //画像を差し替えを実行するウィンドウサイズ
    var body = $("body"); //クラスを付加するオブジェクト
    var bodyPc = "pc";
    var bodySmt = "smt";
    if (w <= x) {
      var before = "_pc",
        after = "_sp";
      replaceImg();
      body.addClass(bodySmt);
      body.removeClass(bodyPc);
    } else {
      var before = "_sp",
        after = "_pc";
      replaceImg();
      body.addClass(bodyPc);
      body.removeClass(bodySmt);
    }

    function replaceImg() {
      $("img[src*=_pc],img[src*=_sp]").each(function () {
        var img = $(this).attr("src").replace(before, after);
        if ($(this).attr("src").match(before)) {
          $(this).attr("src", img);
        }
      });
    }
  });
}

//======================================================================================================
// setHeaderFixed( )
// 機能  ：ページスクロール時の処理。ヘッダー固定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFixed() {
  var navTop = 149;
  var winTop = $(window).scrollTop();
  //スクロールするたびに実行
  $(window).scroll(function () {
    winTop = $(this).scrollTop();
    //スクロール位置がnavの位置より下だったらクラスfixedを追加
    if (winTop > navTop) {
      $("nav").addClass("fixed");
    } else if (winTop < navTop) {
      $("nav").removeClass("fixed");
    }
  });
}

//======================================================================================================
// slideNavToggle( )
// 機能  ：ページ上部からメニューがにゅっと出る(スマホのみ)
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function slideNavToggle() {
  /* 切り替え幅 */
  var replaceWidth = 1024;

  $("#slideBtn").click(function () {
    $(this).toggleClass("open");
    $("nav").slideToggle(200);
  });

  //幅変更時
  function reseNav() {
    if (parseInt($(window).width()) >= replaceWidth) {
      $("#slideBtn").removeClass("open");
      $("nav").removeAttr("style");
    }
  }

  $(window).resize(function () {
    reseNav();
  });

  reseNav();
}

//======================================================================================================
// setPageTop( )
// 機能  ：ページトップへの動作設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setPageTop() {
  var topBtn = $("#pagetop");
  topBtn.hide();

  //スクロールが100に達したらボタン表示
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      topBtn.fadeIn();
    } else {
      topBtn.fadeOut();
    }
  });

  //クリックしたらスクロールしてページトップへ
  topBtn.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      500,
    );
    return false;
  });
}

//======================================================================================================
// smoothScroll()
// 機能  ページ内リンクでスムーススクロール
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function smoothScroll() {
  $('.tabMenu a[href^="#"]').click(function () {
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var posPc = target.offset().top - 69;
    var posSmt = target.offset().top;

    if ($("body").hasClass("pc")) {
      $("html, body").animate({ scrollTop: posPc }, speed, "swing");
    } else {
      $("html, body").animate({ scrollTop: posSmt }, speed, "swing");
    }

    return false;
  });
}

//======================================================================================================
// setTelLink( )
// 機能  ：telリンクをスマートフォン端末以外では無効にする
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setTelLink() {
  var ua = navigator.userAgent.toLowerCase();
  var isMobile = /iphone/.test(ua) || /android(.+)?mobile/.test(ua);

  if (!isMobile) {
    $('a[href^="tel:"]').on("click", function (e) {
      e.preventDefault();
    });
  }
}
