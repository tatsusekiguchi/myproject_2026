/* Javascript */

$(window).on("load", function () {
  if ($(".serviceMain").length > 0) {
    var url = new URL(window.location.href);
    var searchParams = url.searchParams;

    if (!searchParams.has("wgsearch")) {
      searchParams.set("wgsearch", "property");
      url.search = searchParams.toString();
      window.location.href = url.toString();
      return; // リロード後に処理を実行
    }
  }

  // wgsearchパラメータが付与された後、またはパラメータが不要な場合にスクロール処理を実行
  setTimeout(function () {
    // URLパラメータを解析
    var url = new URL(window.location.href);
    var searchParams = url.searchParams;
    var targetParam = null;

    // wgsearch以外のパラメータを探す（sec01, sec02など）
    for (var [key, value] of searchParams.entries()) {
      if (key !== "wgsearch") {
        targetParam = key;
        break;
      }
    }

    // スクロール対象のパラメータがある場合
    if (targetParam) {
      var headH = $(".header").innerHeight();
      var cls = "." + targetParam;
      var $target = $(cls);

      if ($target.length > 0) {
        var pos = $target.offset().top - headH;
        $("body,html").stop().animate(
          {
            scrollTop: pos,
          },
          100,
        );
      }
    }
  }, 100);
});
