/* Javascript */

window.onpageshow = function (event) {
  if (event.persisted) {
    window.location.reload();
  }
};

$(function () {
  // ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
  $(
    'a:not([href^="#"]):not([target]):not([href^="tel:"]):not([href^="mailto:"]):not(.disabled)'
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
  //keyvSlider();

  //スクロール位置に応じてナビ固定
  //setHeaderFixed();

  if ($(".topMain").length > 0) {
    var url = new URL(window.location.href);
    var searchParams = url.searchParams;

    if (!searchParams.has("wgsearch")) {
      searchParams.set("wgsearch", "property");
      url.search = searchParams.toString();
      window.location.href = url.toString();
    }
  }

  //文章を指定の文字数でカット
  if ($(".blogPanel--list").length > 0) {
    var count = 50;
    $(".webgene-item .txt").each(function () {
      var thisText = $(this).text();
      var textLength = thisText.length;
      if (textLength > count) {
        var showText = thisText.substring(0, count);
        var insertText = (showText += "…");
        $(this).html(insertText);
      }
    });
  }

  $(".webgene-pagination .prev a").addClass("js-hover-r");
  $(".webgene-pagination .next a").addClass("js-hover");
  $(".webgene-pagination .prev a").html('<div class="arrows"><</div>');
  $(".webgene-pagination .next a").html('<div class="arrows">></div>');

  if ($(".worksDetailPhotoList").length > 0) {
    $(".worksDetailPhotoList li").each(function (index, element) {
      if (!$(element).find(".webgene-item-main-image").length) {
        $(element).remove();
      }
    });
  }

  //photoBoxのスクロールアニメーション
  photoBoxScrollAnimation();

  //会社概要ページのphotoBoxスクロールアニメーション
  companyPhotoBoxAnimation();

  //beginnerページのballoonスクロールアニメーション
  beginnerBalloonAnimation();

  //beginnerページのphotoスクロールアニメーション
  beginnerPhotoAnimation();

  //イメージマップのレスポンシブ対応
  resizeImageMap();

  //ページ読み込み時のハッシュリンク処理
  scrollToHash();

  //works-categoryのカテゴリをpタグで分割
  formatWorksCategory();

  function initializeInfiniteSlide() {
    $(".worksSlidePanel .webgene-blog").infiniteslide({
      speed: 35, //速さ　単位はpx/秒です。
      pauseonhover: false, //マウスオーバーでストップ
      responsive: true, //子要素の幅を%で指定しているとき
      clone: 2, //子要素の複製回数
      // direction: "right",
    });
  }

  if ($(".worksSlidePanel").length > 0) {
    // document.readyの時点で初期化
    initializeInfiniteSlide();

    // window.loadの時点で再度初期化
    $(window).on("load", function () {
      initializeInfiniteSlide();
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
  $(".accord .dd").hide();
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
        1000
      );
    }
  );

  // ImageMapのareaクリック時のスムーズスクロール
  $('.serviceMain area[href^="#"]').on("click", function (e) {
    e.preventDefault();
    var headH = $(".header").innerHeight();
    var target = $(this).attr("href");
    if ($(target).length) {
      var pos = $(target).offset().top - headH;
      $("body,html").stop().animate(
        {
          scrollTop: pos,
        },
        1000
      );
    }
  });
}

//======================================================================================================
// scrollToHash( )
// 機能  ：ページ読み込み時のハッシュリンク処理（ページ遷移後に該当位置にスクロール）
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function scrollToHash() {
  // URLにハッシュが含まれている場合
  if (window.location.hash) {
    // ページ読み込み完了後に実行
    $(window).on("load", function () {
      var hash = window.location.hash;
      var target = $(hash);

      if (target.length) {
        // 一旦ページトップに移動（ブラウザのデフォルト動作を防ぐため）
        setTimeout(function () {
          var headH = $(".header").innerHeight();
          var pos = target.offset().top - headH;
          $("body,html").stop().animate(
            {
              scrollTop: pos,
            },
            1000
          );
        }, 100);
      }
    });
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
// photoBoxScrollAnimation( )
// 機能  ：photoBoxの画像をスクロール時にランダムな順番でアニメーション表示
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function photoBoxScrollAnimation() {
  if ($(".topMain .photoBox").length === 0) return;

  var isAnimated = false;
  var photos = $(".topMain .sec01 .photoBox")
    .find(".photo01, .photo02, .photo03")
    .toArray();

  // 配列をシャッフル（ランダムな順番に）
  function shuffleArray(array) {
    var currentIndex = array.length;
    var temporaryValue, randomIndex;
    while (currentIndex !== 0) {
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex--;
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }
    return array;
  }

  // ランダムな順番でアニメーション実行
  function animatePhotos() {
    var shuffledPhotos = shuffleArray(photos.slice());
    shuffledPhotos.forEach(function (photo, index) {
      setTimeout(function () {
        $(photo).addClass("show");
      }, index * 150); // 150msずつずらして表示
    });
  }

  // スクロール監視
  $(window).on("scroll", function () {
    if (isAnimated) return;

    var scrollTop = $(window).scrollTop();
    var windowHeight = $(window).height();
    var photoBoxTop = $(".photoBox").offset().top;

    // photoBoxが画面に入ったらアニメーション開始
    if (scrollTop + windowHeight > photoBoxTop + 100) {
      isAnimated = true;
      animatePhotos();
    }
  });

  // ページ読み込み時にすでに表示されている場合の処理
  $(window).trigger("scroll");
}

//======================================================================================================
// companyPhotoBoxAnimation( )
// 機能  ：会社概要ページのphotoBoxをスクロール時にボンッと表示
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function companyPhotoBoxAnimation() {
  if ($(".companyMain .photoBox").length === 0) return;

  var isAnimated = false;

  // スクロール監視
  $(window).on("scroll", function () {
    if (isAnimated) return;

    var scrollTop = $(window).scrollTop();
    var windowHeight = $(window).height();
    var photoBoxTop = $(".companyMain .photoBox").offset().top;

    // photoBoxが画面に入ったらアニメーション開始
    if (scrollTop + windowHeight > photoBoxTop + 150) {
      isAnimated = true;
      $(".companyMain .photoBox .photo").addClass("show");
    }
  });

  // ページ読み込み時にすでに表示されている場合の処理
  $(window).trigger("scroll");
}

//======================================================================================================
// beginnerBalloonAnimation( )
// 機能  ：beginnerページのballoonをスクロール時にランダムな順番でアニメーション表示
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function beginnerBalloonAnimation() {
  if ($(".beginnerMain .balloonPanel").length === 0) return;

  var isAnimated = false;
  var balloons = $(".beginnerMain .balloonPanel")
    .find(".balloon01, .balloon02, .balloon03, .balloon04")
    .toArray();

  // 配列をシャッフル（ランダムな順番に）
  function shuffleArray(array) {
    var currentIndex = array.length;
    var temporaryValue, randomIndex;
    while (currentIndex !== 0) {
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex--;
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }
    return array;
  }

  // ランダムな順番でアニメーション実行
  function animateBalloons() {
    var shuffledBalloons = shuffleArray(balloons.slice());
    shuffledBalloons.forEach(function (balloon, index) {
      setTimeout(function () {
        $(balloon).addClass("show");
      }, index * 250); // 250msずつずらして表示
    });
  }

  // スクロール監視
  $(window).on("scroll", function () {
    if (isAnimated) return;

    var scrollTop = $(window).scrollTop();
    var windowHeight = $(window).height();
    var balloonPanelTop = $(".beginnerMain .balloonPanel").offset().top;

    // balloonPanelが画面に入ったらアニメーション開始
    if (scrollTop + windowHeight > balloonPanelTop + 150) {
      isAnimated = true;
      animateBalloons();
    }
  });

  // ページ読み込み時にすでに表示されている場合の処理
  $(window).trigger("scroll");
}

//======================================================================================================
// beginnerPhotoAnimation( )
// 機能  ：beginnerページのphotoとphotoBoxをスクロール時にボンッと表示
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function beginnerPhotoAnimation() {
  if ($(".beginnerMain").length === 0) return;

  var sec01PhotoAnimated = false;
  var flowPhotoBoxes = $(".beginnerMain .flowContainer .photoBox").toArray();
  var flowAnimatedFlags = flowPhotoBoxes.map(function () {
    return false;
  });

  // スクロール監視
  $(window).on("scroll", function () {
    var scrollTop = $(window).scrollTop();
    var windowHeight = $(window).height();

    // .sec01 .photoのアニメーション
    if (!sec01PhotoAnimated && $(".beginnerMain .sec01 .photo").length > 0) {
      var photoTop = $(".beginnerMain .sec01 .photo").offset().top;
      if (scrollTop + windowHeight > photoTop + 150) {
        sec01PhotoAnimated = true;
        $(".beginnerMain .sec01 .photo").addClass("show");
      }
    }

    // .flowContainer .photoBoxのアニメーション
    flowPhotoBoxes.forEach(function (photoBox, index) {
      if (!flowAnimatedFlags[index]) {
        var photoBoxTop = $(photoBox).offset().top;
        if (scrollTop + windowHeight > photoBoxTop + 150) {
          flowAnimatedFlags[index] = true;
          $(photoBox).addClass("show");
        }
      }
    });
  });

  // ページ読み込み時にすでに表示されている場合の処理
  $(window).trigger("scroll");
}

//======================================================================================================
// resizeImageMap( )
// 機能  ：イメージマップの座標をレスポンシブ対応
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function resizeImageMap() {
  var imageMap = $("img[usemap]");
  if (imageMap.length === 0) return;

  var mapName = imageMap.attr("usemap").replace("#", "");
  var map = $('map[name="' + mapName + '"]');
  var areas = map.find("area");

  // 元の画像サイズを保存（最初の1回のみ）
  if (!imageMap.data("originalWidth")) {
    // 画像の読み込み完了を待つ
    imageMap.on("load", function () {
      imageMap.data("originalWidth", this.naturalWidth);
      imageMap.data("originalHeight", this.naturalHeight);

      // 各areaの元の座標を保存
      areas.each(function () {
        var coords = $(this).attr("coords");
        $(this).data("originalCoords", coords);
      });

      // 初回リサイズ実行
      adjustImageMapCoords();
    });

    // すでに画像が読み込まれている場合
    if (imageMap[0].complete) {
      imageMap.trigger("load");
    }
  }

  // 座標を調整する関数
  function adjustImageMapCoords() {
    var currentWidth = imageMap.width();
    var currentHeight = imageMap.height();
    var originalWidth = imageMap.data("originalWidth");
    var originalHeight = imageMap.data("originalHeight");

    if (!originalWidth || !originalHeight) return;

    var widthRatio = currentWidth / originalWidth;
    var heightRatio = currentHeight / originalHeight;

    areas.each(function () {
      var originalCoords = $(this).data("originalCoords");
      if (!originalCoords) return;

      var coordsArray = originalCoords.split(",");
      var newCoords = [];

      for (var i = 0; i < coordsArray.length; i++) {
        if (i % 2 === 0) {
          // x座標
          newCoords.push(Math.round(coordsArray[i] * widthRatio));
        } else {
          // y座標
          newCoords.push(Math.round(coordsArray[i] * heightRatio));
        }
      }

      $(this).attr("coords", newCoords.join(","));
    });
  }

  // ウィンドウリサイズ時に座標を再調整
  $(window).on("resize", function () {
    adjustImageMapCoords();
  });
}

//======================================================================================================
// formatWorksCategory( )
// 機能  ：works-categoryのカテゴリをカンマ区切りからpタグで分割
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function formatWorksCategory() {
  $(".works-category").each(function () {
    var $this = $(this);
    var html = "";

    // 各divを処理
    $this.children("div").each(function () {
      var text = $(this).text().trim();
      if (text) {
        // カンマと全角カンマで分割
        var categories = text.split(/[,、]/);
        var pTags = "";

        categories.forEach(function (category) {
          var trimmedCategory = category.trim();
          if (trimmedCategory) {
            pTags += "<p>" + trimmedCategory + "</p>";
          }
        });

        if (pTags) {
          html += "<div>" + pTags + "</div>";
        }
      }
    });

    if (html) {
      $this.html(html);
    }
  });
}
