/* Javascript */

/* 切り替え幅 */
var replaceWidth = 1025;


//pc、sp判定
function reseHeaderMenu(){

    if(parseInt($(window).width()) >= replaceWidth) {

        $("body").removeClass("sp");
        $("body").addClass("pc");
        $("nav").attr("style","");

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
     
    if(_width >= 1025) {
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

    //スクロール位置に応じてナビ固定
    setHeaderFixed();

    //スマホメニュー
    dispObj();

    //telリンクをスマートフォン端末以外では無効にする
    setTelLink();

    //ページ内リンクのなめらかスクロール
    pageScroll("#pageLink a");
    
    //submit活性/非活性
    $('#contact form input[type="submit"]').attr('disabled',true);
    $('#contact #checkAgree').click(function() {
        if ( $(this).prop('checked') == false ) {
            $('#contact form input[type="submit"]').attr('disabled', 'disabled');
        } else {
            $('#contact form input[type="submit"]').removeAttr('disabled');
        }
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
    pcName = '_pc',
    spName = '_sp',
    replaceWidth = 1025;

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
// setHeaderFixed( )
// 機能  ：ページスクロール時の処理。ナビ固定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFixed() {
    var scroll,
        winTop;
        
    $(window).on('load resize',function(){

        //スクロールするたびに実行
        $(window).scroll(function () {
            scroll = $('header').offset().top + $('header').outerHeight();
            winTop = $(this).scrollTop();
            //スクロール位置がnavの位置より下だったらクラスfixedを追加
            if (winTop > scroll) {
                $('nav').addClass('fixed');
            }
            else if (winTop < scroll) {
                $('nav').removeClass('fixed');
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
    
    $('#menuBtn').click(function() {
        $(this).toggleClass('active');
        $('nav').toggleClass('active');
        $('nav').fadeToggle('middle');
        return false;
    });

    $(window).resize(function() {
        var windowWidth = parseInt($(window).width());
        if (windowWidth >= replaceWidth) {
            $('#menuBtn').removeClass('active');
            $('nav').removeClass('active');
            $('nav').removeAttr('style');
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
    var isMobile = /iphone/.test(ua)||/android(.+)?mobile/.test(ua);

    if (!isMobile) {
        $('a[href^="tel:"]').on('click', function(e) {
            e.preventDefault();
        });
    }
}

//======================================================================================================
// pageScroll( )
// 機能  ：ページ内リンクのスクロール速度設定
// 引数  ：target→対象リンクオブジェクト
// 戻り値：なし
//======================================================================================================
function pageScroll(target) {

    $(target).click(function(){

        var speed = 1000;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        if(href != "#") {
            position = position - 80;
        }
        
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;

    });
}



