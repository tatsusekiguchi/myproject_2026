/* Javascript */

/* 切り替え幅 */
var replaceWidth = 769;

//pc、sp判定
function reseHeaderMenu(){

    if(parseInt($(window).width()) >= replaceWidth) {

        $("body").removeClass("sp");
        $("body").addClass("pc");
        $("header .menuBtn").removeClass("open");
        $("header nav").attr("style","");

    } else {

        $("body").removeClass("pc");
        $("body").addClass("sp");

    }

}

//幅変更時pc、sp判定
$(window).resize(function(){reseHeaderMenu();});

//リサイズもしくはロードされた時にReLayout呼び出し
$(window).on("load resize", ReLayout);

function ReLayout() {
    var _width = $(window).width(); //画面サイズ取得
     
    if(_width >= 769) {
        //幅に応じて読み込む画像を変更する
        changeImg('.switch');
    }
     
    else {
        changeImg('.switch');
    }

}

$(document).ready(function(){
    
    //pc、sp判定
    reseHeaderMenu();

    //キービジュアルのスライダー設定
    keyvSlider();

    //スクロール位置に応じてヘッダー固定
    setHeaderFixed();

    //スマホメニュー、カレンダーの表示
    dispObj();

    //アコーディオン
    setAccord();

    //telリンクをスマートフォン端末以外では無効にする
    setTelLink();

    //ページネーション表示制御
    setPagenationDisp();

    //ページトップへなめらかスクロール
    setPageTop();

    //追従ボタン
    setScrollFix();

});

//======================================================================================================
// changeImg( )
// 機能  ：幅に応じて読み込む画像を変更する
// 引数  ：target→image
// 戻り値：なし
//======================================================================================================
function changeImg(target) {

    var $setElem = $(target),
    pcName = '/pc',
    spName = '/sp',
    replaceWidth = 769;

    $setElem.each(function(){
        var $this = $(this);
        function imgSize(){
            var windowWidth = parseInt($(window).width());
            if(windowWidth >= replaceWidth) {
                $this.attr('src',$this.attr('src').replace(spName,pcName));
            } else if(windowWidth < replaceWidth) {
               $this.attr('src',$this.attr('src').replace(pcName,spName));
            }
        }
        $(window).resize(function(){imgSize();});
        imgSize();
    });
}

//======================================================================================================
// keyvSlider( )
// 機能  ：キービジュアルのスライダー設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function keyvSlider(){
    if($(".kvWrap").length){

    var HEADER_ELEM = $('.kvWrap');
    var FADE_SPEED = 1500;
    var SWITCH_DELAY = 4000;

    // 要素作成
    if(!HEADER_ELEM.children().hasClass('kvBox')){
        var keyBoxElem = '';
        keyBoxElem += '<div class="kvBox">';
        keyBoxElem += '<div class="kvBg kv01"></div>';
        keyBoxElem += '<div class="kvBg kv02"></div>';
        keyBoxElem += '<div class="kvBg kv03"></div>';
        keyBoxElem += '</div>';
        HEADER_ELEM.append(keyBoxElem);
    }

    var keyBox = '.kvBox';
    $(keyBox + ' .kvBg').css({opacity:'0'});
    $(keyBox + ' .kvBg:first').stop().animate({opacity: '1'}, FADE_SPEED);
    setInterval(function(){
        $(keyBox + ' .kvBg:first').animate({opacity: '0'}, FADE_SPEED).nextAll('.kvBg:first').animate({opacity: '1'}, FADE_SPEED).end().appendTo(keyBox);
    }, SWITCH_DELAY);
    }
}

//======================================================================================================
// setHeaderFixed( )
// 機能  ：ページスクロール時の処理。ヘッダー固定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFixed() {
    
    var scroll,
        winTop;

    $(window).on('load resize',function(){

        //スクロールするたびに実行
        $(window).scroll(function () {
            // scroll = $('#kv,.kv').offset().top + $('#kv,.kv').outerHeight();
            scroll = $('header').outerHeight();
            winTop = $(this).scrollTop();
            //スクロール位置がnavの位置より下だったらクラスfixedを追加
            if (winTop > scroll) {
                $('header').addClass('fixed');
            }
            else if (winTop < scroll) {
                $('header').removeClass('fixed');
            }
        });
    
    });
    
}

//======================================================================================================
// dispObj( )
// 機能  ：スマホメニュー
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function dispObj(){
    
    $("#spMenuBtn").click(function(){
        $("#gNav").animate({top:"0",left: "0"},{duration: 400});
    });
    $("#navClose").click(function(){
        $("#gNav").animate({top:"0",left: "-80%"},{duration: 400});
    });

}

//======================================================================================================
// setAccord( )
// 機能  ：アコーディオン
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setAccord(){
    
    $('.accord dt').click(function(){

        $(this).toggleClass('active');

        $(this).next('dd').slideToggle();

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
    var isMobile = /iphone/.test(ua)||/android(.+)?mobile/.test(ua);

    if (!isMobile) {
        $('a[href^="tel:"]').on('click', function(e) {
            e.preventDefault();
        });
    }
}

//======================================================================================================
// setPagenationDisp( )
// 機能  ：ページネーション表示制御
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setPagenationDisp() {

    var index = $('.pagination li').index($('.current'));  
   
    if(index == 2){
         
         $('.pagination li:nth-child(-n+2)').hide();

    }

}

//======================================================================================================
// setPageTop( )
// 機能  ：ページトップへの動作設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setPageTop() {

    var topBtn = $('#pagetop');
    topBtn.hide();

    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });

    //クリックしたらスクロールしてページトップへ
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

}


//======================================================================================================
// setScrollFix( )
// 機能  ：追従ボタン
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setScrollFix() {

    $("body").wrapInner('<div />');
    $("body > div").attr("id","bodyWrap");

    $( '#sideBtn' ).scrollFollow();

}

