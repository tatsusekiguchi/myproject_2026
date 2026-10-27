/* 製品ページ共通（02〜05）：商品リンク・JAN表・画像切り替え */

$(document).ready(function () {
  var page = $(".productsMain");
  if (!page.length) return;

  var list = page.find(".productNav .linkList ul");
  var brandLinks = list.children(".brandNav").clone();

  function productName(text) {
    return text.replace(/^\s*■\s*/, "").replace(/\s+/g, "");
  }

  function setProductLinks() {
    var groups = page.find(".janTable .table > .tbody");
    groups.each(function (index) {
      $(this).attr("id", "product-jan-" + (index + 1));
    });

    list.empty();
    page.find(".productsContainer > .productBlock").each(function (index) {
      var product = $(this);
      var id = "product-item-" + (index + 1);
      var title = $.trim(product.find(".productTitle h2, .productTitle h3").first().text());
      product.attr("id", id);

      if (!product.closest(".odiamSection").length) {
        var link = $("<li>");
        var anchor = $("<a>").attr("href", "#" + id);
        var text = $("<div>").addClass("linkText");
        text.append($("<p>").text(title));
        anchor.append(text);
        link.append(anchor);
        list.append(link);
      }

      var group = groups
        .filter(function () {
          return (
            productName($(this).find(".janGroup .janText").first().text()) ===
            productName(title)
          );
        })
        .first();
      product
        .find(".btnJan a")
        .attr("href", group.length ? "#" + group.attr("id") : "#jan-code");
    });
    list.append(brandLinks.clone());
  }

  function setDiscontinued() {
    page.find(".janTable .tbody > .tr").each(function () {
      var row = $(this);
      row.toggleClass(
        "is-discontinued",
        row.find(".janNote").text().indexOf("廃番") !== -1,
      );
    });
  }

  // PC・SPとも横スクロールを維持し、画面内に残るヘッダーの下へ追従させる。
  function setJanHead() {
    var header = $(".header")[0];
    var headerHeight = header
      ? Math.max(0, header.getBoundingClientRect().bottom)
      : 0;
    page.find(".janTable").each(function () {
      var table = $(this);
      var head = table.find(".thead").first();
      if (!head.length) return;
      var limit = Math.max(0, table.outerHeight() - head.outerHeight());
      var offset = Math.max(
        0,
        Math.min(headerHeight - this.getBoundingClientRect().top, limit),
      );
      head.css("transform", "translateY(" + offset + "px)");
    });
  }

  // ノーコード画面で複製されたSlickの表示用ラッパーを元の構造へ戻す。
  function resetGallery(slider, selector) {
    if (!slider.hasClass("slick-initialized")) return;
    var slides = slider.find(selector).not(".slick-cloned").detach();
    slides
      .removeClass("slick-slide slick-active slick-current slick-center")
      .removeAttr("style data-slick-index aria-hidden tabindex role id");
    slider
      .empty()
      .append(slides)
      .removeClass("slick-initialized slick-slider slick-dotted")
      .removeAttr("style");
  }

  function setGallery() {
    if (!$.fn.slick) return;
    page.find(".productGallery").each(function () {
      var gallery = $(this);
      var main = gallery.find(".galleryMain");
      var thumbs = gallery.find(".galleryThumbs");
      if (!main.length || !thumbs.length) return;
      if (main.hasClass("slick-initialized") && main[0].slick) return;

      resetGallery(main, ".gallerySlide");
      resetGallery(thumbs, ".thumbItem");
      main.off(".productGallery");
      thumbs.off(".productGallery");

      // ライブラリが付ける任意属性も、このページの指定に合わせて除去する。
      main.on(
        "init.productGallery reInit.productGallery afterChange.productGallery setPosition.productGallery",
        function () {
          $(this)
            .find(".slick-slide, .slick-list, .slick-track")
            .removeAttr(
              "aria-hidden aria-describedby aria-label role tabindex",
            );
        },
      );
      main.on(
        "init.productGallery afterChange.productGallery",
        function (event, slider) {
          var index = slider.currentSlide;
          thumbs
            .children(".thumbItem")
            .removeClass("is-selected")
            .eq(index)
            .addClass("is-selected");
        },
      );
      thumbs.on("click.productGallery", "a", function (event) {
        event.preventDefault();
        var index = $(this).closest(".thumbItem").index();
        main.slick("slickGoTo", index);
      });
      main.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        dots: false,
        autoplay: false,
        accessibility: false,
      });
      gallery.find(".galleryPrev, .galleryNext").removeClass("is-disabled");
      gallery
        .find(".galleryPrev a")
        .off(".productGallery")
        .on("click.productGallery", function (event) {
          event.preventDefault();
          main.slick("slickPrev");
        });
      gallery
        .find(".galleryNext a")
        .off(".productGallery")
        .on("click.productGallery", function (event) {
          event.preventDefault();
          main.slick("slickNext");
        });
    });
  }

  function setShowcase() {
    if (!$.fn.infiniteslide) return;
    page.find(".showcaseSlider").each(function () {
      var slider = $(this);
      // 商品・JANの再設定時に同じスライダーを重複初期化しない。
      if (slider.data("showcaseInitialized")) return;
      slider.data("showcaseInitialized", true);
      slider.infiniteslide({
        speed: 35,
        direction: "left",
        pauseonhover: false,
        responsive: true,
        clone: 2,
      });
    });
  }

  function refreshProducts() {
    setProductLinks();
    setDiscontinued();
    setGallery();
    setShowcase();
    setJanHead();
  }

  refreshProducts();
  $(window).on("scroll.products resize.products load.products", setJanHead);

  // 商品・JANの複製や原稿変更を反映する。自動生成中のDOM変更は監視しない。
  if ("MutationObserver" in window) {
    var options = { childList: true, subtree: true, characterData: true };
    var observer = new MutationObserver(function (changes) {
      for (var index = 0; index < changes.length; index++) {
        var target = changes[index].target;
        if (target.nodeType === 3) target = target.parentNode;
        if (
          $(target).closest(".productsSection, .janTable, .productShowcase")
            .length
        ) {
          observer.disconnect();
          refreshProducts();
          observer.observe(page[0], options);
          break;
        }
      }
    });
    observer.observe(page[0], options);
  }
});
