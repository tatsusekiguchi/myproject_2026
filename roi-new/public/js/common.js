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
var replaceWidth = 1180;

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

  if (_width >= 1180) {
    //幅に応じて読み込む画像を変更する
    changeImg(".switch");
  } else {
    changeImg(".switch");
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

  //ページ内リンクのスクロールアニメーション
  scrollAnim(
    ".header .logo a,.header .btnEntry a, .navList a, .footNav a,.footEntry a",
  );

  //キービジュアルのスライダー設定
  //keyvSlider();

  //スクロール位置に応じてナビ固定
  //setHeaderFixed();

  //MVスライダー設定（左右に画像の端が残る）
  mvSlider();

  //Featuresスライダー設定（プログレスバー付き）
  flowSlider();

  //Staffスライダー設定
  staffSlider();

  //Cultureスライダー設定
  cultureSlider();

  //スクロール時のヘッダー切り替え
  // toggleHeaderWhite();
  // $(window).on("scroll", toggleHeaderWhite);

  $(".voiceModalOpen").on("click", function () {
    const modalId = $(this).data("modal-id");
    const targetModal = $(`.voiceItemModal[data-modal="${modalId}"]`);

    targetModal.css("display", "flex");

    setTimeout(() => {
      // モーダル内のスライダーを初期化または再配置
      targetModal.find(".staffSlideBox").each(function () {
        if ($(this).hasClass("slick-initialized")) {
          $(this).slick("setPosition");
        } else {
          $(this).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            dots: true,
            fade: true,
            speed: 800,
          });
        }
      });
    }, 100);

    $(".voiceItemOverlay").show();
  });

  $(".voiceItemModal .modalClose").on("click", function () {
    $(".voiceItemModal").hide();
    $(".voiceItemOverlay").hide();
  });
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
    replaceWidth = 1180;

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
    $(".header .navBox").toggleClass("active");
    return false;
  });

  $(".header .navBox .navList a").click(function () {
    $(".header .hamburger").removeClass("is-open");
    $(".header .navBox").removeClass("active");
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
  $(".accord dd").hide();
  $(".accord dt").click(function () {
    $(this).toggleClass("active");

    $(this).next("dd").slideToggle();
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
// scrollAnim( )
// 機能  ：ページ内リンクのスクロールアニメーション
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function scrollAnim(elem) {
  var speed = 1000;
  var NAV_ELEM = $(".header");

  $(elem).click(function () {
    var href = "";
    if ($(this).attr("href")) {
      href = $(this).attr("href");
    }
    var target = $("html");
    if (href == "") {
      target = $("article");
    } else if (href == "#") {
      target = $("html");
    } else {
      target = $(href);
    }
    var position = target.offset().top;

    // position - (ナビゲーション高さ)
    var navHeight = NAV_ELEM.innerHeight();
    // position = position - navHeight;

    $("html, body").stop().animate({ scrollTop: position }, speed, "swing");
    return false;
  });

  //URLのハッシュ値を取得
  var urlHash = location.hash;
  //ハッシュ値があればページ内スクロール
  if (urlHash) {
    //スクロールを0に戻す
    $("body,html").animate({ scrollTop: 0 }, 10);
    setTimeout(function () {
      //ロード時の処理を待ち、時間差でスクロール実行
      scrollToAnker(urlHash);
    }, 100);
  }

  // 指定したアンカー(#ID)へアニメーションでスクロール
  function scrollToAnker(hash) {
    var target = $(hash);
    var position = target.offset().top;
    // position - (ナビゲーション高さ)
    var navHeight = NAV_ELEM.innerHeight();
    position = position - navHeight;

    $("body,html").stop().animate({ scrollTop: position }, 1000);
  }
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
    scroll = $(".header").innerHeight();
    //scroll = window.innerHeight;
    winTop = $(this).scrollTop();
    //スクロール位置がnavの位置より下だったらクラスfixedを追加
    if (winTop > scroll) {
      $(".header").addClass("fixed");
    } else if (winTop < scroll) {
      $(".header").removeClass("fixed");
    }
  });
}

//======================================================================================================
// mvSlider( )
// 機能  ：MVパネルのフェードスライダー設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function mvSlider() {
  if ($(".mvPanel--pc").length) {
    $(".mvPanel--pc").slick({
      slidesToShow: 1,
      fade: true,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 800,
      dots: true,
      arrows: false,
      appendDots: ".titlePanel01",
      pauseOnHover: false,
      pauseOnFocus: false,
      responsive: [
        {
          breakpoint: 1180,
          settings: {
            dots: false,
          },
        },
      ],
    });
  }

  if ($(".mvPanel--sp").length) {
    $(".mvPanel--sp").slick({
      slidesToShow: 1,
      fade: true,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 800,
      dots: false,
      arrows: false,
      appendDots: ".titlePanel01",
      pauseOnHover: false,
      pauseOnFocus: false,
      responsive: [
        {
          breakpoint: 1180,
          settings: {
            dots: true,
          },
        },
      ],
    });
  }
}

//======================================================================================================
// flowSlider( )
// 機能  ：Featuresスライダー設定（プログレスバー付き）
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function flowSlider() {
  if ($(".flowSliderList").length) {
    var $slider = $(".flowSliderList");
    var $progressBar = $(".progressbar");
    var slideCount = 4; // 固定4項目

    // スライダー初期化（右側だけ見えるスタイル）
    $slider.slick({
      centerMode: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      arrows: true,
      dots: false,
      speed: 600,
      variableWidth: false,
      responsive: [
        {
          breakpoint: 1180,
          settings: {
            arrows: false,
          },
        },
      ],
    });

    // プログレスバーの初期化（一直線のバー）
    $progressBar.html('<span class="progress-fill"></span>');
    var $progressFill = $progressBar.find(".progress-fill");

    // 初期状態（1/4の進捗）
    $progressFill.css("width", (1 / slideCount) * 100 + "%");

    // スライド変更時にプログレスバーを更新（進捗表示）
    $slider.on("afterChange", function (event, slick, currentSlide) {
      // 進捗をパーセンテージで計算（currentSlide + 1 / slideCount）
      var progress = ((currentSlide + 1) / slideCount) * 100;
      $progressFill.css("width", progress + "%");
    });
  }
}

//======================================================================================================
// staffSlider( )
// 機能  ：Staffスライダー設定（複数対応）
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function staffSlider() {
  // ページロード時は非表示のモーダル内のスライダーは初期化しない
  // モーダルが開いた時に初期化される
}

//======================================================================================================
// cultureSlider( )
// 機能  ：Cultureスライダー設定（カスタムボタン付き）
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function cultureSlider() {
  if ($(".cultureSlideContainer").length) {
    var $slider = $(".cultureSlideContainer");

    // スライダー初期化
    $slider.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: false,
      arrows: false,
      dots: true,
      appendDots: "#section__culture .secTtl",
      fade: true,
      speed: 600,
    });

    // カスタムボタンのイベント設定
    $(".cultureSlideBox .buttonBox .prev").on("click", function () {
      $slider.slick("slickPrev");
    });

    $(".cultureSlideBox .buttonBox .next").on("click", function () {
      $slider.slick("slickNext");
    });
  }
}

//======================================================================================================
// toggleHeaderWhite( )
// 機能  ：スクロール時に.bgWhiteセクションでヘッダーの.whiteを外す
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function toggleHeaderWhite() {
  var scrollTop = $(window).scrollTop();
  var headerHeight = $(".header").outerHeight();
  var isInWhiteSection = false;

  $(".bgWhite").each(function () {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    // ヘッダーの位置が.bgWhite要素の範囲内にあるかチェック
    if (scrollTop + headerHeight >= elementTop && scrollTop <= elementBottom) {
      isInWhiteSection = true;
      return false; // eachループを抜ける
    }
  });

  if (isInWhiteSection) {
    $(".header, .sideFollow").removeClass("white");
  } else {
    $(".header, .sideFollow").addClass("white");
  }
}
