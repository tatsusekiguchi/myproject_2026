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

  //ページ内リンクのスクロールアニメーション
  scrollAnim(".navList a");

  //キービジュアルのスライダー設定
  //keyvSlider();

  //スクロール位置に応じてナビ固定
  //setHeaderFixed();

  setTimeout(function () {
    $(".popupInfo").fadeIn();
  }, 1000);
  $(".popupClose").on("click", function () {
    $(".popupInfo").fadeOut();
  });

  if ($("#top").length > 0) {
    $(".header").addClass("topHeader");
  } else {
    $(".header").addClass("pageHeader");
  }

  // ▼ Flowセクション slick + pager制御（topPager + spPager対応）▼
  const $flowSlider = $("#section__flow .flowSliderList");
  const $flowPrev = $(
    "#section__flow .topPager .prev, #section__flow .spPager .prev",
  );
  const $flowNext = $(
    "#section__flow .topPager .next, #section__flow .spPager .next",
  );
  const $flowCurrentTop = $("#section__flow .topPager .count").eq(0);
  const $flowTotalTop = $("#section__flow .topPager .count").eq(1);
  const $flowCurrentSp = $("#section__flow .spPager .count").eq(0);
  const $flowTotalSp = $("#section__flow .spPager .count").eq(1);
  const flowBreakpoint = replaceWidth;
  const flowSlideCount = $("#section__flow .flowSliderBox").length;

  // 2桁ゼロ埋め表示
  function pad(num) {
    return ("0" + num).slice(-2);
  }

  // 現在のインデックスを正規化（無限スライド対策）
  function getRealIndex(current, total) {
    return ((current % total) + total) % total;
  }

  // インデックス更新関数
  function updateFlowCount(realIndex) {
    const displayIndex = pad(realIndex + 1);
    $flowCurrentTop.text(displayIndex);
    $flowCurrentSp.text(displayIndex);
  }

  // スライダー初期化
  function initFlowSlider() {
    if (!$flowSlider.hasClass("slick-initialized")) {
      const flowSlideCount = $("#section__flow .flowSliderBox").length;
      $flowSlider.slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        // variableWidth: true,
        // centerMode: true,
        // centerPadding: "2%",
        arrows: false,
        responsive: [
          {
            breakpoint: flowBreakpoint,
            settings: {
              slidesToShow: 1,
            },
          },
        ],
      });

      const totalText = pad(flowSlideCount);
      $flowTotalTop.text(totalText);
      $flowTotalSp.text(totalText);
      updateFlowCount(0);

      $flowSlider.on("afterChange", function (event, slick, currentSlide) {
        const realIndex = getRealIndex(currentSlide, flowSlideCount);
        updateFlowCount(realIndex);
        unifyFlowBoxHeight();
      });

      $flowPrev.on("click", function () {
        $flowSlider.slick("slickPrev");
      });
      $flowNext.on("click", function () {
        $flowSlider.slick("slickNext");
      });
    }
  }

  function unifyFlowBoxHeight() {
    const $boxes = $(".flowSliderBox");
    $boxes.css("height", "auto");

    const $images = $boxes.find("img");
    let loadedCount = 0;
    const totalImages = $images.length;

    if (totalImages === 0) {
      applyHeight(); // 画像がない場合は即時処理
      return;
    }

    $images.each(function () {
      // 新たに Image を生成して確実に load イベントを取る
      const img = new Image();
      img.onload = img.onerror = function () {
        loadedCount++;
        if (loadedCount === totalImages) {
          applyHeight();
        }
      };
      img.src = $(this).attr("src");
    });

    function applyHeight() {
      let maxHeight = 0;
      $boxes.each(function () {
        const h = $(this).outerHeight();
        if (h > maxHeight) maxHeight = h;
      });
      $boxes.css("height", maxHeight + "px");
    }
  }

  // 初期化 + リサイズ対応
  initFlowSlider();
  unifyFlowBoxHeight();
  $(window).on("resize orientationchange", function () {
    if (!$flowSlider.hasClass("slick-initialized")) {
      initFlowSlider();
    }
    unifyFlowBoxHeight();
  });

  function initializeInfiniteSlide() {
    $(".slideBox ul").infiniteslide({
      speed: 35, //速さ　単位はpx/秒です。
      pauseonhover: false, //マウスオーバーでストップ
      responsive: true, //子要素の幅を%で指定しているとき
      clone: 2, //子要素の複製回数
      // direction: "right",
    });
  }

  function initializeReverseInfiniteSlide() {
    $(".slideBoxReverse ul").infiniteslide({
      speed: 35,
      pauseonhover: false,
      responsive: true,
      clone: 2,
      direction: "right", // ←逆方向にスライドさせる
    });
  }

  if ($(".slidePanel").length > 0) {
    // document.readyの時点で初期化
    initializeInfiniteSlide();
    initializeReverseInfiniteSlide();

    // window.loadの時点で再度初期化
    $(window).on("load", function () {
      initializeInfiniteSlide();
      initializeReverseInfiniteSlide();
    });
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
  $(".accord dt").click(function () {
    $(this).toggleClass("active");

    $(this).next("dd").slideToggle();
  });
  $(".accord .icon").click(function () {
    $(this).parent().parent("dd").slideToggle();
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
