// KVスライドショー - ランダムタイミングで画像を切り替え
(function () {
  "use strict";

  // 各ulに対してスライドショーを初期化
  function initKvSlideshow() {
    const kvContainer = document.getElementById("kvPanelList");
    if (!kvContainer) return;

    const ulElements = kvContainer.querySelectorAll("ul");

    ulElements.forEach(function (ul) {
      const liElements = ul.querySelectorAll("li");
      if (liElements.length === 0) return;

      // 最初の画像を表示
      let currentIndex = 0;
      liElements[currentIndex].classList.add("active");

      // ランダムな間隔で切り替え（3秒〜7秒の間）
      function startSlideshow() {
        const randomInterval = Math.random() * 4000 + 3000; // 3000ms〜7000ms

        setTimeout(function () {
          // 現在の画像をフェードアウト
          liElements[currentIndex].classList.remove("active");

          // 次の画像インデックスを計算
          currentIndex = (currentIndex + 1) % liElements.length;

          // 次の画像をフェードイン
          liElements[currentIndex].classList.add("active");

          // 次の切り替えをスケジュール
          startSlideshow();
        }, randomInterval);
      }

      // スライドショー開始
      startSlideshow();
    });
  }

  // DOMの読み込み完了後に実行
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initKvSlideshow);
  } else {
    initKvSlideshow();
  }
})();
