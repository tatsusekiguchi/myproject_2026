// GSAP スクロールアニメーション
(function () {
  "use strict";

  function initGsapAnimation() {
    // ScrollTriggerとScrollToPluginを登録
    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

    // 背景の固定とピン留め
    const sectionBackContainer = document.querySelector(
      ".sectionBackContainer",
    );

    if (sectionBackContainer) {
      // .sectionBackContainerを固定
      ScrollTrigger.create({
        trigger: sectionBackContainer,
        start: "top top",
        end: "bottom bottom",
        pin: true,
        pinSpacing: false,
      });
    }

    // KVからコンセプトへの背景切り替え
    ScrollTrigger.create({
      trigger: "#section__concept",
      start: "top 70%",
      end: "bottom -50%",
      toggleClass: {
        targets: ".sectionBackContainer .bgCnt02",
        className: "on",
      },
    });

    // Featuresセクションへの背景切り替え
    ScrollTrigger.create({
      trigger: "#section__features",
      start: "top 70%",
      end: "bottom -50%",
      toggleClass: {
        targets: ".sectionBackContainer .bgCnt04",
        className: "on",
      },
    });

    ScrollTrigger.create({
      trigger: "#section__require",
      start: "top 70%",
      end: "bottom -50%",
      toggleClass: {
        targets: ".sectionBackContainer .bgCnt05",
        className: "on",
      },
    });
    ScrollTrigger.create({
      trigger: "#section__requirements",
      start: "top 70%",
      end: "bottom -50%",
      toggleClass: {
        targets: ".sectionBackContainer .bgCnt06",
        className: "on",
      },
    });

    // ページロード時のフェードイン（タイトルパネル）
    gsap.fromTo(
      ".titlePanel .titleBox",
      {
        opacity: 0,
        y: 30,
      },
      {
        opacity: 1,
        y: 0,
        duration: 1.5,
        delay: 0.5,
        ease: "power2.out",
      },
    );

    // 初期状態設定
    gsap.set(".fadeIn", { opacity: 0, y: 60 });
    gsap.set(".slideLeft", { opacity: 0, x: -100 });
    gsap.set(".slideRight", { opacity: 0, x: 100 });
    gsap.set(".scaleUp", { opacity: 0, scale: 0.8 });

    // フェードインアニメーション
    const fadeInElements = document.querySelectorAll(".fadeIn");
    fadeInElements.forEach(function (element) {
      ScrollTrigger.create({
        trigger: element,
        start: "top 90%",
        end: "bottom top",
        onEnter: () => {
          gsap.to(element, {
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: "power2.out",
          });
        },
      });
    });

    // 左からスライドイン
    const slideLeftElements = document.querySelectorAll(".slideLeft");
    slideLeftElements.forEach(function (element) {
      ScrollTrigger.create({
        trigger: element,
        start: "top 90%",
        end: "bottom top",
        onEnter: () => {
          gsap.to(element, {
            opacity: 1,
            x: 0,
            duration: 1.2,
            ease: "power3.out",
          });
        },
      });
    });

    // 右からスライドイン
    const slideRightElements = document.querySelectorAll(".slideRight");
    slideRightElements.forEach(function (element) {
      ScrollTrigger.create({
        trigger: element,
        start: "top 90%",
        end: "bottom top",
        onEnter: () => {
          gsap.to(element, {
            opacity: 1,
            x: 0,
            duration: 1.2,
            ease: "power3.out",
          });
        },
      });
    });

    // スケールアップアニメーション
    const scaleElements = document.querySelectorAll(".scaleUp");
    scaleElements.forEach(function (element) {
      ScrollTrigger.create({
        trigger: element,
        start: "top 90%",
        end: "bottom top",
        onEnter: () => {
          gsap.to(element, {
            opacity: 1,
            scale: 1,
            duration: 1.2,
            ease: "power2.out",
          });
        },
      });
    });

    // スムーズスクロール（アンカーリンク用）
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href");
        if (href !== "#" && href !== "") {
          e.preventDefault();
          const target = document.querySelector(href);
          if (target) {
            const offset =
              window.pageYOffset + target.getBoundingClientRect().top;
            window.scrollTo({
              top: offset,
              behavior: "smooth",
            });
          }
        }
      });
    });

    // Features パネルのスタッキングアニメーション
    const featuresPanels = document.querySelectorAll(".featuresBoardPanel");
    if (featuresPanels.length > 0) {
      const container = document.querySelector(".featuresBoardContainer");
      const breakpoint = 1040;

      featuresPanels.forEach(function (panel, index) {
        // PC/SP判定
        const isPC = window.innerWidth >= breakpoint;

        // 各パネルの設定
        let scaleValue, yValue, startPosition, endPosition, transformOrigin;

        if (isPC) {
          // PC時の設定
          if (index === 0) {
            scaleValue = 1 - 0.05; // 0.95
            yValue = -6;
          } else if (index === 1) {
            scaleValue = 1 - 0.03; // 0.97
            yValue = -4;
          } else {
            scaleValue = 1;
            yValue = 0;
          }
          startPosition = "center center";
          endPosition = "bottom bottom";
          transformOrigin = "50% 0%";
        } else {
          // SP時の設定
          scaleValue = 0.9;
          yValue = 0;
          startPosition = "bottom 50%";
          endPosition = "bottom 0%";
          transformOrigin = "50% -50%";
        }

        // 初期設定
        gsap.set(panel, {
          transformOrigin: transformOrigin,
          force3D: true,
          scale: 1,
          yPercent: 0,
          willChange: "transform, opacity",
        });

        // タイムライン作成
        const tl = gsap.timeline({ paused: true });
        tl.to(panel, {
          duration: 1,
          ease: isPC ? "linear" : "power1.inOut",
          scale: scaleValue,
          yPercent: yValue,
          force3D: true,
        });

        // ScrollTrigger設定
        const scrollTriggerConfig = {
          trigger: panel,
          endTrigger: isPC ? container : panel,
          start: startPosition,
          end: endPosition,
          scrub: isPC ? 0.5 : true,
          pin: true,
          pinSpacing: false,
          invalidateOnRefresh: true,
        };

        if (!isPC) {
          scrollTriggerConfig.pinType = "fixed";
        }

        // ScrollTrigger設定（PC時とSP時で分岐）
        if (isPC) {
          ScrollTrigger.create({
            ...scrollTriggerConfig,
            onUpdate: (self) => {
              const progress = self.progress;
              let adjustedProgress = 0;

              let start1, end1, start2, end2, start3, end3;

              if (index === 0) {
                start1 = 0.1;
                end1 = 0.3;
                start2 = 0.4;
                end2 = 0.6;
                start3 = 0.7;
                end3 = 0.9;
              } else if (index === 1) {
                start1 = 0.15;
                end1 = 0.42;
                start2 = 0.57;
                end2 = 0.848;
                start3 = 1;
                end3 = 1;
              } else {
                start1 = 1;
                end1 = 1;
                start2 = 1;
                end2 = 1;
                start3 = 1;
                end3 = 1;
              }

              const range1 = end1 - start1;
              const range2 = end2 - start2;
              const range3 = end3 - start3;

              if (progress <= start1) {
                adjustedProgress = 0;
              } else if (progress > start1 && progress < end1) {
                adjustedProgress = ((progress - start1) / range1) * range1;
              } else if (progress <= start2) {
                adjustedProgress = range1;
              } else if (progress > start2 && progress < end2) {
                adjustedProgress =
                  ((progress - start2) / range2) * range2 + range1;
              } else if (progress <= start3) {
                adjustedProgress = range1 + range2;
              } else if (progress > start3 && progress < end3) {
                adjustedProgress =
                  ((progress - start3) / range3) * range3 + range1 + range2;
              } else {
                adjustedProgress = range1 + range2 + range3;
              }

              tl.progress(adjustedProgress);
            },
          });
        } else {
          // SP時はシンプルなprogressベース
          ScrollTrigger.create({
            ...scrollTriggerConfig,
            onUpdate: (self) => {
              const progress = Math.min(self.progress, 1);
              tl.progress(progress);
            },
          });
        }
      });
    }
  }

  // DOMの読み込み完了後に実行
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initGsapAnimation);
  } else {
    initGsapAnimation();
  }
})();
