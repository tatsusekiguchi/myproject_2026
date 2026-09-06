/* Javascript */

window.onpageshow = function (event) {
  if (event.persisted) {
    window.location.reload();
  }
};

$(function () {
  // ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
  $(
    'a:not([href^="#"]):not([target]):not([href^="tel:"]):not([href^="mailto:"]):not(.disabled)',
  ).on("click", function (e) {
    e.preventDefault(); // ナビゲートをキャンセル
    url = $(this).attr("href"); // 遷移先のURLを取得
    if (url !== "") {
      $("body").addClass("fadeout"); // bodyに class="fadeout"を挿入
      setTimeout(function () {
        window.location = url; // 0.8秒後に取得したURLに遷移
      }, 800);
    }
    return false;
  });
});

/* 切り替え幅 */
var replaceWidth = 1025;

//pc、sp判定
function reseHeaderMenu() {
  if (parseInt($(window).width()) >= replaceWidth) {
    $("body").removeClass("sp");
    $("body").addClass("pc");
    $("nav").attr("style", "");
  } else {
    $("body").removeClass("pc");
    $("body").addClass("sp");
  }
}

//幅変更時pc、sp判定
$(window).resize(function () {
  reseHeaderMenu();
});

//リサイズもしくはロードされた時にReLayout呼び出し
$(window).on("load resize", ReLayout);

function ReLayout() {
  var _width = $(window).width(); //画面サイズ取得

  if (_width >= 1025) {
    //幅に応じて読み込む画像を変更する
    changeImg(".switch");
  } else {
    changeImg(".switch");
  }

  // vegas.jsをレスポンシブ対応で再初期化
  if (typeof initializeVegas === "function") {
    initializeVegas();
  }
}

//キービジュアルのスライダー設定
function initializeVegas() {
  if ($(".topMain").length > 0) {
    var _width = $(window).width();
    var images;

    if (_width >= replaceWidth) {
      // PC用画像
      images = [
        {
          src: "https://kawachiku.jp/system_panel/uploads/images/top_kv_01.png",
        },
        {
          src: "https://kawachiku.jp/system_panel/uploads/images/top_kv_02.png",
        },
        {
          src: "https://kawachiku.jp/system_panel/uploads/images/top_kv_03.png",
        },
      ];
    } else {
      // SP用画像
      images = [
        {
          src: "https://kawachiku.jp/system_panel/uploads/images/top_kv_01_sp.jpg",
        },
        {
          src: "https://kawachiku.jp/system_panel/uploads/images/top_kv_02_sp.jpg",
        },
        {
          src: "https://kawachiku.jp/system_panel/uploads/images/top_kv_03_sp.jpg",
        },
      ];
    }

    // 既存のvegasインスタンスが存在する場合のみ破棄
    if ($(".topKv").data("vegas")) {
      $(".topKv").vegas("destroy");
    }

    // vegasを初期化
    $(".topKv").vegas({
      overlay: false,
      transition: "fade", //切り替わりのアニメーション。http://vegas.jaysalvat.com/documentation/transitions/参照。fade、fade2、slideLeft、slideLeft2、slideRight、slideRight2、slideUp、slideUp2、slideDown、slideDown2、zoomIn、zoomIn2、zoomOut、zoomOut2、swirlLeft、swirlLeft2、swirlRight、swirlRight2、burnburn2、blurblur2、flash、flash2が設定可能。
      transitionDuration: 4000, //切り替わりのアニメーション時間をミリ秒単位で設定
      delay: 10000, //スライド間の遅延をミリ秒単位で。
      animationDuration: 20000, //スライドアニメーション時間をミリ秒単位で設定
      animation: "kenburnsLeft", //スライドアニメーションの種類。http://vegas.jaysalvat.com/documentation/transitions/参照。kenburns、kenburnsUp、kenburnsDown、kenburnsRight、kenburnsLeft、kenburnsUpLeft、kenburnsUpRight、kenburnsDownLeft、kenburnsDownRight、randomが設定可能。
      slides: images, //画像設定を読む
      timer: false,
    });
  }
}

$(document).ready(function () {
  //pc、sp判定
  reseHeaderMenu();

  //スマホメニュー
  dispObj();

  //telリンクをスマートフォン端末以外では無効にする
  setTelLink();

  //アコーディオン
  setAccord();

  //ページ内リンクのなめらかスクロール
  pageScroll();

  //キービジュアルのスライダー設定
  //keyvSlider();

  if ($(".topMain").length > 0) {
    $(".header").addClass("topHeader");
    //スクロール位置に応じてナビ固定
    setHeaderFixed();
  } else {
    $(".header").addClass("pageHeader");
  }

  initializeVegas();

  function initializeTopInfiniteSlide() {
    $(".slideBox:nth-child(1) .ul").infiniteslide({
      speed: 35,
      pauseonhover: false,
      responsive: true,
      clone: 2,
      direction: "up",
    });

    $(".slideBox:nth-child(2) .ul").infiniteslide({
      speed: 45,
      pauseonhover: false,
      responsive: true,
      clone: 2,
      direction: "up",
    });

    $(".slideBox:nth-child(3) .ul").infiniteslide({
      speed: 40,
      pauseonhover: false,
      responsive: true,
      clone: 2,
      direction: "up",
    });

    $(".slideBox:nth-child(4) .ul").infiniteslide({
      speed: 50,
      pauseonhover: false,
      responsive: true,
      clone: 2,
      direction: "up",
    });
  }

  if ($(".topMain .slidePanel").length > 0) {
    // document.readyの時点で初期化
    initializeTopInfiniteSlide();

    // window.loadの時点で再度初期化
    $(window).on("load", function () {
      initializeTopInfiniteSlide();
    });
  }

  if ($(".secPhotoDisplay").length > 0) {
    // 初期状態: photo02 と photo03 を非表示
    $(".secPhotoDisplay .photoBox .photo").hide();
    $(".secPhotoDisplay .photo01").show();

    // liにマウスオーバーイベントを設定
    $(".secPhotoDisplay .li").on("mouseenter", function () {
      // 全ての.photoを非表示
      $(".secPhotoDisplay .photoBox .photo").hide();

      // マウスオーバーされた.liのdata-target属性に対応する.photoを表示
      const target = $(this).data("target");
      $(target).fadeIn();
    });

    // liからマウスが離れたとき（必要に応じて）
    $(".secPhotoDisplay .li").on("mouseleave", function () {
      // ここで特に処理をしない場合、現在の.photoの表示を維持
    });
  }

  function initializeInfiniteSlide() {
    $(".oct268Main .slideBox .ul").infiniteslide({
      speed: 35, //速さ　単位はpx/秒です。
      pauseonhover: false, //マウスオーバーでストップ
      responsive: true, //子要素の幅を%で指定しているとき
      clone: 2, //子要素の複製回数
      direction: "right",
    });
  }

  if ($(".oct268Main .slidePanel").length > 0) {
    // document.readyの時点で初期化
    initializeInfiniteSlide();

    // window.loadの時点で再度初期化
    $(window).on("load", function () {
      initializeInfiniteSlide();
    });
  }

  $(".webgene-pagination .prev a").addClass("js-hover-r");
  $(".webgene-pagination .next a").addClass("js-hover");
  $(".webgene-pagination .prev a").html('<div class="arrows"><</div>');
  $(".webgene-pagination .next a").html('<div class="arrows">></div>');
});

//======================================================================================================
// openingAnimation( )
// 機能  ：トップページのオープニングアニメーション
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
$(window).on("load", function () {
  // トップページのみで実行
  if ($("#opening").length > 0) {
    const logo = $("#opening .logo");
    const messages = [$("#msg1"), $("#msg2"), $("#msg3")];
    const finalMsg = $("#msg4");
    const mainSite = $(".topKvContainer");

    let delay = 0;
    let timeouts = []; // タイムアウトIDを保存する配列

    // オープニング終了処理
    function endOpening() {
      // 全てのタイムアウトをクリア
      timeouts.forEach((id) => clearTimeout(id));
      timeouts = [];

      // オープニングを非表示
      $("#opening").fadeOut();
      $("body").css("overflow", "auto");
    }

    // SKIPボタンのクリックイベント
    $(".skip").on("click", function () {
      endOpening();
    });

    // ロゴ表示
    timeouts.push(
      setTimeout(() => {
        logo.css("opacity", 1);
      }, delay),
    );

    delay += 3000;

    timeouts.push(
      setTimeout(() => {
        logo.css("opacity", 0);
      }, delay),
    );

    delay += 2500;

    // コピー1〜3
    messages.forEach((msg) => {
      timeouts.push(
        setTimeout(() => {
          msg.css("opacity", 1);
        }, delay),
      );

      delay += 4000;

      timeouts.push(
        setTimeout(() => {
          msg.css("opacity", 0);
        }, delay),
      );

      delay += 3000;
    });

    // 最終コピー
    timeouts.push(
      setTimeout(() => {
        finalMsg.css("opacity", 1);
      }, delay),
    );

    delay += 4000;

    // オープニング終了後の処理
    timeouts.push(
      setTimeout(() => {
        endOpening();
      }, delay),
    );
  }
});

//======================================================================================================
// changeImg( )
// 機能  ：幅に応じて読み込む画像を変更する
// 引数  ：target→image
// 戻り値：なし
//======================================================================================================
function changeImg(target) {
  var $setElem = $(target),
    pcName = "_pc",
    spName = "_sp",
    replaceWidth = 1025;

  $setElem.each(function () {
    var $this = $(this);
    function imgSize() {
      var windowWidth = parseInt($(window).width());
      if (windowWidth >= replaceWidth) {
        $this.attr("src", $this.attr("src").replace(spName, pcName));
      } else if (windowWidth < replaceWidth) {
        $this.attr("src", $this.attr("src").replace(pcName, spName));
      }
    }
    $(window).resize(function () {
      imgSize();
    });
    imgSize();
  });
}

//======================================================================================================
// dispObj( )
// 機能  ：スマホメニュー
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function dispObj() {
  $(".header .hamburger").click(function () {
    $(this).toggleClass("is-open");
    $(".header .navBox").fadeToggle();
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

//======================================================================================================
// setAccord( )
// 機能  ：アコーディオン
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setAccord() {
  $(".accord .dt").click(function () {
    $(this).toggleClass("active");

    $(this).next(".dd").slideToggle();
  });
}

//======================================================================================================
// pageScroll( )
// 機能  ：ページ内リンクのスクロール設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function pageScroll() {
  $(".linkList .li[data-target],.linkBtn[data-target]").on(
    "click",
    function (e) {
      e.preventDefault();
      var headH = $(".header").innerHeight();
      var cls = "." + $(this).data("target");
      var pos = $(cls).offset().top - headH;
      $("body,html").stop().animate(
        {
          scrollTop: pos,
        },
        1000,
      );
    },
  );
}

//======================================================================================================
// keyvSlider( )
// 機能  ：キービジュアルのスライダー設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function keyvSlider() {
  if ($(".topKv").length) {
    var HEADER_ELEM = $(".topKv");
    var FADE_SPEED = 2500;
    var SWITCH_DELAY = 8000;

    // 要素作成
    if (!HEADER_ELEM.children().hasClass("kvBox")) {
      var keyBoxElem = "";
      keyBoxElem += '<div class="kvBox">';
      keyBoxElem += '<div class="kvBg kv01"></div>';
      keyBoxElem += '<div class="kvBg kv02"></div>';
      keyBoxElem += '<div class="kvBg kv03"></div>';
      keyBoxElem += "</div>";
      HEADER_ELEM.append(keyBoxElem);
    }

    var keyBox = ".kvBox";
    $(keyBox + " .kvBg").css({ opacity: "0" });
    $(keyBox + " .kvBg:first")
      .stop()
      .animate({ opacity: "1" }, FADE_SPEED);
    setInterval(function () {
      $(keyBox + " .kvBg:first")
        .animate({ opacity: "0" }, FADE_SPEED)
        .nextAll(".kvBg:first")
        .animate({ opacity: "1" }, FADE_SPEED)
        .end()
        .appendTo(keyBox);
    }, SWITCH_DELAY);
  }
}

//======================================================================================================
// setHeaderFixed( )
// 機能  ：ページスクロール時の処理。ナビ固定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFixed() {
  var scroll, winTop;

  //スクロールするたびに実行
  $(window).scroll(function () {
    // scroll = $('.pageTtl').offset().top;
    scroll = $(".sec01").offset().top;
    //scroll = window.innerHeight;
    winTop = $(this).scrollTop();
    //スクロール位置が.sec01の位置より下だったらクラスfixedを追加
    if (winTop > scroll) {
      $(".header").addClass("fixed");
    } else if (winTop < scroll) {
      $(".header").removeClass("fixed");
    }
  });
}
