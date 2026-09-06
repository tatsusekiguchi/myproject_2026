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
  keyvSlider();

  //動画クリック再生
  videoClickPlay();

  //「その他」選択時のtextarea表示切替
  toggleOtherTextarea();

  //スクロール位置に応じてナビ固定
  //setHeaderFixed();

  //送信ボタンを押した時のみバリデーションメッセージ表示
  $(".wpcf7-submit").on("click", function () {
    $(".wpcf7-form-control-wrap").addClass("is-show");
  });
});

// ページ完全読み込み後にInstagramスライダーを初期化
$(window).on("load", function () {
  //Instagramスライダー初期化
  // initInstaSlider();
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
    $(".header .navBox").toggleClass("active");
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
  // 初期状態で開いた状態にする
  $(".accordHead").addClass("active");
  $(".accordBody").show();

  $(".accordHead").click(function () {
    $(this).toggleClass("active");

    $(this).next(".accordBody").slideToggle();
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
  var FADE_SPEED = 2500;
  var SWITCH_DELAY = 8000;

  // .topKvのスライダー設定
  if ($(".topKv").length) {
    var topKeyBox = ".topKv .kvBox";
    var kvTitle = ".kvTitle";

    // 初期状態の設定
    $(topKeyBox + " .kvBg").css({ opacity: "0" });
    $(topKeyBox + " .kvBg:first")
      .stop()
      .animate({ opacity: "1" }, FADE_SPEED);

    // 初期表示の要素がwhiteクラスを持つかチェック
    if ($(topKeyBox + " .kvBg:first").hasClass("white")) {
      $(kvTitle).addClass("white");
    } else {
      $(kvTitle).removeClass("white");
    }

    setInterval(function () {
      var nextBg = $(topKeyBox + " .kvBg:first").nextAll(".kvBg:first");

      // アニメーション開始前に次の要素がwhiteクラスを持つかチェック
      if (nextBg.hasClass("white")) {
        $(kvTitle).addClass("white");
      } else {
        $(kvTitle).removeClass("white");
      }

      $(topKeyBox + " .kvBg:first")
        .animate({ opacity: "0" }, FADE_SPEED)
        .nextAll(".kvBg:first")
        .animate({ opacity: "1" }, FADE_SPEED)
        .end()
        .appendTo(topKeyBox);
    }, SWITCH_DELAY);
  }

  // .contactKvのスライダー設定
  if ($(".contactKv").length) {
    var contactKeyBox = ".contactKv .kvBox";

    // 初期状態の設定
    $(contactKeyBox + " .kvBg").css({ opacity: "0" });
    $(contactKeyBox + " .kvBg:first")
      .stop()
      .animate({ opacity: "1" }, FADE_SPEED);

    setInterval(function () {
      $(contactKeyBox + " .kvBg:first")
        .animate({ opacity: "0" }, FADE_SPEED)
        .nextAll(".kvBg:first")
        .animate({ opacity: "1" }, FADE_SPEED)
        .end()
        .appendTo(contactKeyBox);
    }, SWITCH_DELAY);
  }
}

//======================================================================================================
// videoClickPlay( )
// 機能  ：動画クリックで再生/一時停止
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function videoClickPlay() {
  $(".videoBox video").one("click", function (e) {
    e.preventDefault();
    var video = this;
    if (video.paused) {
      var playPromise = video.play();
      if (playPromise !== undefined) {
        playPromise
          .then(function () {
            $(video).attr("controls", "controls");
          })
          .catch(function (error) {
            console.log("Play error:", error);
          });
      }
    }
  });
}

//======================================================================================================
// toggleOtherTextarea( )
// 機能  ：「その他」チェック時のtextarea表示切替
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function toggleOtherTextarea() {
  // 初期状態で全てのtextareaを非表示
  $(
    ".field-consultation .inputBox, .field-theme .inputBox, .field-status .inputBox, .field-method .inputBox, .field-concern .inputBox",
  ).hide();

  // チェックボックスの変更を監視
  $(".checkList input[type='checkbox']").on("change", function () {
    var $checkbox = $(this);
    var $checkList = $checkbox.closest(".checkList");
    var $inputBox = $checkList.next(".inputBox");
    var labelText = $checkbox.next(".wpcf7-list-item-label").text();

    // 「その他」かどうかチェック
    if (labelText === "その他") {
      if ($checkbox.prop("checked")) {
        $inputBox.slideDown();
      } else {
        $inputBox.slideUp();
        // テキストエリアの内容をクリア
        $inputBox.find("textarea").val("");
      }
    }
  });
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
// Instagram Slick Slider
// 機能  ：Instagram画像のスライダー初期化
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function initInstaSlider() {
  if ($("#sbi_images").length && typeof $.fn.slick !== "undefined") {
    $("#sbi_images").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      infinite: true,
      arrows: false,
      dots: false,
      autoplay: true,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }
}
