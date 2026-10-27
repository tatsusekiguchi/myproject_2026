/* Javascript */

/* 切り替え幅 */
var replaceWidth = 1025;

$(document).ready(function () {
  reseHeaderMenu();
  changeImg();
  dispObj();
  setAccord();
  pageScroll();
  setPageTop();
});

$(window).on("resize", function () {
  reseHeaderMenu();
  changeImg();
});

// PC・SP判定
function reseHeaderMenu() {
  var isPc = $(window).width() >= replaceWidth;
  $("body").toggleClass("pc", isPc).toggleClass("sp", !isPc);
  if (isPc) {
    $(".header .hamburger, .header .navBox").removeClass("is-open");
  }
}

// 画像切り替え
function changeImg() {
  var isPc = $(window).width() >= replaceWidth;
  $("img.switch").each(function () {
    var src = $(this).attr("src");
    if (!src) return;
    $(this).attr(
      "src",
      isPc ? src.replace("_sp", "_pc") : src.replace("_pc", "_sp"),
    );
  });
}

// スマホメニュー
function dispObj() {
  $(".header .hamburger").on("click", function () {
    $(this).toggleClass("is-open");
    $(".header .navBox").toggleClass("is-open");
  });
  $(".header .navBox a").on("click", function () {
    $(".header .hamburger, .header .navBox").removeClass("is-open");
  });
  $(document).on("keydown", function (event) {
    if (event.key === "Escape") {
      $(".header .hamburger, .header .navBox").removeClass("is-open");
    }
  });
}

// アコーディオン
function setAccord() {
  $(".accord .dt").on("click", function () {
    $(this).toggleClass("is-open");
    var duration = window.matchMedia("(prefers-reduced-motion: reduce)").matches
      ? 0
      : 200;
    $(this).next(".dd").stop(true, true).slideToggle(duration);
  });
}

// ページ内リンク
function pageScroll() {
  $(".linkList .li[data-target], .linkBtn[data-target]").on(
    "click",
    function (event) {
      var target = document.getElementsByClassName(
        $(this).attr("data-target"),
      )[0];
      if (!target) return;
      event.preventDefault();
      scrollToTarget(target);
    },
  );
  // 自動設定されたリンクを含め、hrefとIDの組み合わせで移動する。
  $(".main").on("click", "a[href^='#']", function (event) {
    var id = $(this).attr("href").slice(1);
    if (!id || $(this).attr("target") === "_blank") return;
    var target = document.getElementById(id);
    if (!target) return;
    event.preventDefault();
    scrollToTarget(target);
  });
}

function scrollToTarget(target) {
  var headerHeight =
    $(window).width() < replaceWidth ? $(".header").outerHeight() : 112;
  // JANの商品名が追従する列見出しに隠れない位置へ移動する。
  var janHead = $(target)
    .filter(".tbody")
    .closest(".janTable")
    .find(".thead")
    .first();
  if (janHead.length) {
    headerHeight += janHead.outerHeight() + 8;
  }
  var duration = window.matchMedia("(prefers-reduced-motion: reduce)").matches
    ? 0
    : 400;
  $("body,html")
    .stop()
    .animate(
      { scrollTop: Math.max(0, $(target).offset().top - headerHeight) },
      duration,
    );
}

// ページの先頭へ戻る
function setPageTop() {
  $(".pageTop a").on("click", function (event) {
    event.preventDefault();
    var duration = window.matchMedia("(prefers-reduced-motion: reduce)").matches
      ? 0
      : 400;
    $("body,html").stop().animate({ scrollTop: 0 }, duration);
  });
}
