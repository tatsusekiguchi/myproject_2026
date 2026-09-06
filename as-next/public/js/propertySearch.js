/**
 * propertySearch.js
 * 物件検索ページ用スクリプト
 */

$(function () {
  // .iconList内のspanに文字がない場合、親のli要素を削除
  $(".iconList li").each(function () {
    var $li = $(this);
    var $spans = $li.find("span");
    var hasEmptySpan = false;

    // span要素をチェック
    $spans.each(function () {
      var spanText = $(this).text().trim();
      if (spanText === "") {
        hasEmptySpan = true;
      }
    });

    // 空のspanがある場合、そのli要素を削除
    if (hasEmptySpan) {
      $li.remove();
    }
  });
});
