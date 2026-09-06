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
var replaceWidth = 1140;

//pc、sp判定
function reseHeaderMenu() {
  if (parseInt($(window).width()) >= replaceWidth) {
    $("body").removeClass("sp");
    $("body").addClass("pc");
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

  //ページ内リンクのスクロールアニメーション
  scrollAnim(".navList a,.footNav a");

  //スクロールでフッター到達時にヘッダーにクラス付与
  setHeaderFooterReached();

  //キービジュアルのスライダー設定
  //keyvSlider();

  //スクロール位置に応じてナビ固定
  //setHeaderFixed();

  function initializeInfiniteSlide() {
    $(".infoSlideBox").infiniteslide({
      speed: 35, //速さ　単位はpx/秒です。
      pauseonhover: false, //マウスオーバーでストップ
      responsive: true, //子要素の幅を%で指定しているとき
      clone: 2, //子要素の複製回数
      // direction: "right",
    });
  }

  if ($(".infoSlidePanel").length > 0) {
    // document.readyの時点で初期化
    initializeInfiniteSlide();

    // window.loadの時点で再度初期化
    $(window).on("load", function () {
      initializeInfiniteSlide();
    });
  }

  //コメントスライドの初期化
  function initializeCommentSlide() {
    $(".commentSlidePanel ul").infiniteslide({
      speed: 35, //速さ　単位はpx/秒です。
      pauseonhover: false, //マウスオーバーでストップ
      responsive: true, //子要素の幅を%で指定しているとき
      clone: 2, //子要素の複製回数
      // direction: "right",
    });
  }

  if ($(".commentSlidePanel").length > 0) {
    // document.readyの時点で初期化
    initializeCommentSlide();

    // window.loadの時点で再度初期化
    $(window).on("load", function () {
      initializeCommentSlide();
    });
  }

  //ページネーション
  initNewsPagination();

  //サロン情報のスライダー
  initSalonInfoSlider();
});

//======================================================================================================
// initSalonInfoSlider( )
// 機能  ：サロン情報の写真スライダー
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function initSalonInfoSlider() {
  if ($("#section__info .photoBox").length > 0) {
    $("#section__info .photoBox").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 800,
      fade: true,
      cssEase: "ease-in-out",
      pauseOnHover: true,
      pauseOnFocus: true,
    });
  }
}

//======================================================================================================
// initNewsPagination( )
// 機能  ：ニュース一覧のページネーション
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function initNewsPagination() {
  var itemsPerPage = 3;
  var subItems = $("#section__news .subItem");
  var prevBtn = $(".pagingBox .prev");
  var nextBtn = $(".pagingBox .next");
  var counterText = $(".pagingBox .counter p");

  if (
    subItems.length === 0 ||
    prevBtn.length === 0 ||
    nextBtn.length === 0 ||
    counterText.length === 0
  ) {
    return;
  }

  var totalItems = subItems.length;
  var totalPages = Math.ceil(totalItems / itemsPerPage);
  var currentPage = 1;

  // ページを表示
  function showPage(page) {
    currentPage = page;

    // 全アイテムを非表示
    subItems.hide();

    // 現在のページのアイテムを表示
    var start = (page - 1) * itemsPerPage;
    var end = start + itemsPerPage;

    for (var i = start; i < end && i < totalItems; i++) {
      subItems.eq(i).show();
    }

    // カウンター更新
    var pageNum = String(page).padStart(2, "0");
    var totalNum = String(totalPages).padStart(2, "0");
    counterText.html(
      "<em>" + pageNum + "</em><span> ／</span><em>" + totalNum + "</em>",
    );

    // ボタンの状態更新
    if (page === 1) {
      prevBtn.css({ opacity: "0.3", cursor: "default" });
    } else {
      prevBtn.css({ opacity: "1", cursor: "pointer" });
    }

    if (page === totalPages) {
      nextBtn.css({ opacity: "0.3", cursor: "default" });
    } else {
      nextBtn.css({ opacity: "1", cursor: "pointer" });
    }
  }

  // 前へボタン
  prevBtn.on("click", function () {
    if (currentPage > 1) {
      showPage(currentPage - 1);
    }
  });

  // 次へボタン
  nextBtn.on("click", function () {
    if (currentPage < totalPages) {
      showPage(currentPage + 1);
    }
  });

  // 初期表示
  showPage(1);
}

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

    $(".header .navBox").fadeToggle(400);

    return false;
  });

  // navBox内のクリックイベントの伝播を防ぐ
  $(".header .navBox").on("click", function (e) {
    e.stopPropagation();
  });

  // TOPページのみ、ナビリンククリックでメニューを閉じる
  if ($("#top").length > 0) {
    $(".header").addClass("topHeader");
    $(".navList a").on("click", function () {
      $(".header .hamburger").removeClass("is-open");
      $(".header .navBox").fadeOut(400);
    });
  } else {
    $(".header").addClass("pageHeader");
  }
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
    position = position - navHeight;

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

$(function () {
  const $form = $("#contact");
  const $submit = $form.find("input[type=submit]");
  const $checkbox = $form.find(".agreeCheck input");
  const storageKey = "agreeChecked";

  // 保存されたチェック状態を反映
  const saved = localStorage.getItem(storageKey);
  if (saved === "true") {
    $checkbox.prop("checked", true);
    $submit.prop("disabled", false);
  } else {
    $checkbox.prop("checked", false);
    $submit.prop("disabled", true);
  }

  // チェックボックス変更時の挙動
  $checkbox.on("change", function () {
    const isChecked = $(this).prop("checked");
    $submit.prop("disabled", !isChecked);
    localStorage.setItem(storageKey, isChecked); // 状態を保存
  });

  // フォーム送信時、チェック状態をクリア
  $('.formConfirm input[name="mwform_submitButton"]').on("click", function () {
    localStorage.removeItem(storageKey);
  });
});

//======================================================================================================
// setHeaderFooterReached( )
// 機能  ：スクロールでフッターに到達したらヘッダーにクラス付与
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFooterReached() {
  var $header = $(".header");
  var $footer = $(".footer");

  if ($footer.length === 0) {
    return;
  }

  $(window).on("scroll", function () {
    var scrollTop = $(window).scrollTop();
    var footerTop = $footer.offset().top - 50;

    // 画面上部（スクロール位置）がフッターの上端位置に到達したら
    if (scrollTop >= footerTop) {
      $header.addClass("is-footer-reached");
    } else {
      $header.removeClass("is-footer-reached");
    }
  });
}
