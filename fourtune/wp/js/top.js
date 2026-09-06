/* Javascript */

$(document).ready(function () {
  //スライダー設定
  slickSlider();
});

//======================================================================================================
// slickSlider( )
// 機能  ：スライダー設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function slickSlider() {
  $("#photoSlide").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    responsive: [
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
}
