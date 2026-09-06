// JavaScript Document


window.onload = function () {

  const logo = document.getElementById("logo");
  const messages = [
    document.getElementById("msg1"),
    document.getElementById("msg2"),
    document.getElementById("msg3")
  ];
  const finalMsg = document.getElementById("msg4");
  const mainSite = document.getElementById("main-site");

  let delay = 0;

  // ロゴ表示
  setTimeout(() => {
    logo.style.opacity = 1;
  }, delay);

  delay += 3000;

  setTimeout(() => {
    logo.style.opacity = 0;
  }, delay);

  delay += 2500;

  // コピー1〜3
  messages.forEach((msg) => {

    setTimeout(() => {
      msg.style.opacity = 1;
    }, delay);

    delay += 4000;

    setTimeout(() => {
      msg.style.opacity = 0;
    }, delay);

    delay += 3000;

  });

  // 最終コピー
  setTimeout(() => {
    finalMsg.style.opacity = 1;
  }, delay);

  delay += 4000;

  // 背景サイトを下からスライドイン
  setTimeout(() => {
    mainSite.style.top = "0";
    document.body.style.overflow = "auto";
  }, delay);

};