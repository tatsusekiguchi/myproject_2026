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
  scrollAnim(".header .logo a, .navList a, .footNav a");

  //タイトルアニメーション
  setTimeout(function () {
    $(".titleBlue h1.bg").addClass("is-animated");
  }, 500);

  //キービジュアルのスライダー設定
  //keyvSlider();

  //スクロール位置に応じてナビ固定
  //setHeaderFixed();

  // ピックアップSwiperの初期化
  if (document.querySelector(".pickupSwiper")) {
    new Swiper(".pickupSwiper", {
      slidesPerView: 1.5,
      spaceBetween: 20,
      centeredSlides: false,
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      speed: 600,
      threshold: 10,
      touchRatio: 1,
      touchAngle: 45,
      longSwipesRatio: 0.5,

      breakpoints: {
        280: {
          slidesPerView: 3,
          spaceBetween: 15,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 6,
          spaceBetween: 30,
        },
        1400: {
          slidesPerView: 6,
          spaceBetween: 30,
        },
        1500: {
          slidesPerView: 7,
          spaceBetween: 30,
        },
      },
    });
  }

  // お客様の声slickスライダーの初期化
  if ($(".voiceSlider").length) {
    $(".voiceSlider").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      arrows: true,
      prevArrow:
        '<button type="button" class="slick-prev"><span>&lt;</span></button>',
      nextArrow:
        '<button type="button" class="slick-next"><span>&gt;</span></button>',
      appendArrows: ".sliderControl",
      appendDots: ".sliderControl",
      infinite: true,
      autoplay: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: "40px",
          },
        },
      ],
    });
  }

  // サービス概要スライダー（SPのみ）とプログレスバー連動
  function initServiceSlider() {
    var $serviceSlider = $("#section__service .listBox ul");
    var $serviceSection = $("#section__service");
    var windowWidth = $(window).width();

    if (windowWidth < 768) {
      // SPのみslick有効化
      if (!$serviceSlider.hasClass("slick-initialized")) {
        $serviceSlider.slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
          arrows: false,
          infinite: false,
          centerMode: true,
          centerPadding: "30px",
          draggable: true,
          swipe: true,
          touchThreshold: 10,
          accessibility: false,
        });

        // プログレスバー更新
        function updateProgressBar(slideIndex) {
          var slickInstance = $serviceSlider.slick("getSlick");
          var totalSlides = slickInstance.slideCount;
          var progress = ((slideIndex + 1) / totalSlides) * 100;
          $(".progressbar .bar").css("width", progress + "%");
        }

        // 初期表示
        var slickInstance = $serviceSlider.slick("getSlick");
        var totalSlides = slickInstance.slideCount;
        updateProgressBar(0);

        var currentSlideIndex = 0;
        var isManualChange = false;

        // スライド切り替え時（常に有効）
        $serviceSlider.on("afterChange", function (event, slick, currentSlide) {
          currentSlideIndex = currentSlide;
          updateProgressBar(currentSlide);
        });

        // ========== 縦スクロール連動 一時無効化 ここから ==========
        /*
        // GSAPのScrollTriggerを登録
        if (
          typeof gsap !== "undefined" &&
          typeof ScrollTrigger !== "undefined"
        ) {
          gsap.registerPlugin(ScrollTrigger);

          // ScrollTriggerでセクションをピン留め
          var scrollTriggerInstance = ScrollTrigger.create({
            trigger: $serviceSection[0],
            start: "top top",
            end: "+=300%", // スライド数に応じた長さ（totalSlides * 100%）
            pin: true,
            pinSpacing: true,
            anticipatePin: 1,
            scrub: 1,
            fastScrollEnd: true,
            invalidateOnRefresh: true,
            onUpdate: function (self) {
              if (isManualChange) {
                return; // 手動操作中はスキップ
              }

              // スクロール進行度からスライド番号を計算
              var progress = self.progress;
              var targetSlide = Math.min(
                Math.floor(progress * totalSlides),
                totalSlides - 1,
              );

              // スライドが変わった場合のみ移動
              if (targetSlide !== currentSlideIndex && targetSlide >= 0) {
                currentSlideIndex = targetSlide;
                $serviceSlider.slick("slickGoTo", targetSlide, false);
                updateProgressBar(targetSlide);
              }
            },
          });

          // スライダーの手動操作（スワイプ）に対応
          $serviceSlider.on("swipe", function (event, slick, direction) {
            isManualChange = true;

            setTimeout(function () {
              // スライド変更後、ScrollTriggerの進行度を同期
              var targetProgress =
                currentSlideIndex / Math.max(totalSlides - 1, 1);

              // スクロール位置を計算
              var scrollStart = scrollTriggerInstance.start;
              var scrollEnd = scrollTriggerInstance.end;
              var targetScroll =
                scrollStart + (scrollEnd - scrollStart) * targetProgress;

              // スムーズにスクロール
              gsap.to(window, {
                scrollTo: targetScroll,
                duration: 0.5,
                ease: "power2.out",
                onComplete: function () {
                  isManualChange = false;
                },
              });
            }, 50);
          });

          // クリーンアップ用に保存
          $serviceSection.data("scrollTrigger", scrollTriggerInstance);
        } else {
          console.warn("GSAP or ScrollTrigger not loaded");
        }
        */
        // ========== 縦スクロール連動 一時無効化 ここまで ==========
      }
    } else {
      // PC/タブレットではslick破棄
      if ($serviceSlider.hasClass("slick-initialized")) {
        $serviceSlider.slick("unslick");
      }

      // ScrollTriggerのインスタンスがあれば削除
      var scrollTriggerInstance = $serviceSection.data("scrollTrigger");
      if (scrollTriggerInstance) {
        scrollTriggerInstance.kill();
        $serviceSection.removeData("scrollTrigger");
      }
    }
  }

  // 初回実行を遅延させる（DOM完全読み込み後）
  setTimeout(function () {
    initServiceSlider();
  }, 100);

  // リサイズ時に再初期化
  var resizeTimer;
  $(window).on("resize", function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      // 既存のScrollTriggerをすべて削除
      if (typeof ScrollTrigger !== "undefined") {
        ScrollTrigger.getAll().forEach(function (trigger) {
          if (trigger.vars.trigger === $("#section__service")[0]) {
            trigger.kill();
          }
        });
      }

      // slickを一旦破棄
      var $serviceSlider = $("#section__service .listBox ul");
      if ($serviceSlider.hasClass("slick-initialized")) {
        $serviceSlider.slick("unslick");
      }

      initServiceSlider();
    }, 300);
  });

  function togglePriceNoScroll() {
    var isPc = $(window).width() >= 1025;

    $("#section__price").each(function () {
      var sectionTop = $(this).offset().top;
      var sectionBottom = sectionTop + $(this).outerHeight();
      var scrollTop = $(window).scrollTop();
      var headerHeight = $(".header").innerHeight() || 0;
      var lockStart = sectionTop;
      var isInSection = scrollTop >= lockStart && scrollTop < sectionBottom;

      if (isPc && isInSection) {
        $("body").addClass("no-scroll");
      } else {
        $("body").removeClass("no-scroll");
      }
    });
  }

  function releaseNoScrollAtFlow() {
    var isPc = $(window).width() >= 1025;

    if (!isPc || !$("#section__flow").length) {
      return;
    }

    var scrollTop = $(window).scrollTop();
    var headerHeight = $(".header").innerHeight() || 0;
    var flowTop = $("#section__flow").offset().top - headerHeight;

    if (scrollTop >= flowTop) {
      $("body").removeClass("no-scroll");
      priceBottomOverscroll = 0;
      priceTopOverscroll = 0;
    }
  }

  var priceBottomOverscroll = 0;
  var priceTopOverscroll = 0;
  var priceOverscrollThreshold = 160;

  function syncPricePanelScroll(deltaY) {
    var isPc = $(window).width() >= 1025;
    var $priceSection = $("#section__price");
    var $rightPanel = $priceSection.find(".rightPanel");

    if (!isPc || !$priceSection.length || !$rightPanel.length) {
      return false;
    }

    if (!$("body").hasClass("no-scroll")) {
      return false;
    }

    var rightPanelElement = $rightPanel.get(0);
    var maxScroll =
      rightPanelElement.scrollHeight - rightPanelElement.clientHeight;
    var currentScroll = rightPanelElement.scrollTop;
    var headerHeight = $(".header").innerHeight() || 0;
    var sectionTop = $priceSection.offset().top;
    var sectionBottom = sectionTop + $priceSection.outerHeight();
    var flowSectionTop = $("#section__flow").length
      ? $("#section__flow").offset().top
      : sectionBottom + 1;

    if (maxScroll <= 0) {
      $("body").removeClass("no-scroll");
      priceBottomOverscroll = 0;
      priceTopOverscroll = 0;
      return false;
    }

    rightPanelElement.scrollTop = Math.max(
      0,
      Math.min(currentScroll + deltaY, maxScroll),
    );

    var isAtBottom = rightPanelElement.scrollTop >= maxScroll - 1;
    var isAtTop = rightPanelElement.scrollTop <= 1;

    if (deltaY > 0 && isAtBottom) {
      priceBottomOverscroll += deltaY;
      priceTopOverscroll = 0;

      if (priceBottomOverscroll >= priceOverscrollThreshold) {
        $("body").removeClass("no-scroll");
        priceBottomOverscroll = 0;
        $("html, body")
          .stop(true)
          .animate({ scrollTop: flowSectionTop }, 450, "linear");
      }
    } else if (deltaY < 0 && isAtTop) {
      priceTopOverscroll += Math.abs(deltaY);
      priceBottomOverscroll = 0;

      if (priceTopOverscroll >= priceOverscrollThreshold) {
        $("body").removeClass("no-scroll");
        priceTopOverscroll = 0;
        $("html, body")
          .stop(true)
          .animate(
            { scrollTop: Math.max(sectionTop - headerHeight - 1, 0) },
            450,
            "linear",
          );
      }
    } else {
      priceBottomOverscroll = 0;
      priceTopOverscroll = 0;
    }

    return true;
  }

  $(window).on("load scroll resize", function () {
    // togglePriceNoScroll();
    // releaseNoScrollAtFlow();
  });

  $(window).on("wheel", function (e) {
    // if (syncPricePanelScroll(e.originalEvent.deltaY)) {
    //   e.preventDefault();
    // }
  });

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

  // SP時、ナビゲーションリンククリックでメニューを閉じる
  $(".header .navBox .navList a").click(function () {
    if (parseInt($(window).width()) < replaceWidth) {
      $(".header .hamburger").removeClass("is-open");
      $(".header .navBox").removeClass("active");
    }
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
  $(".accord .ttlHead").click(function () {
    $(this).toggleClass("active");

    $(this).next(".cntBody").slideToggle();
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
