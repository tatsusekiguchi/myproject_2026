/* Javascript */

/* 切り替え幅 */
const replaceWidth = 769;

//pc、sp判定
function reseHeaderMenu(){

    if(parseInt($(window).width()) >= replaceWidth) {

        $("body").removeClass("sp");
        $("body").addClass("pc");

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

    if(_width >= replaceWidth) {
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

    //スクロール位置に応じてヘッダー固定
    setHeaderFixed();

    //Clickでページ内スクロール
    linkScroll();

    //アコーディオン
    btnAccrd();

    //telリンクをスマートフォン端末以外では無効にする
    setTelLink();

});

//======================================================================================================
// changeImg( )
// 機能  ：幅に応じて読み込む画像を変更する
// 引数  ：target→image
// 戻り値：なし
//======================================================================================================
function changeImg(target) {

    var $setElem = $(target),
    pcName = '/pc/',
    spName = '/sp/',
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
// setHeaderFixed( )
// 機能  ：ページスクロール時の処理。ヘッダー固定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFixed() {

    var navMenu    = $('nav'),
    offset = navMenu.offset();
    $(window).scroll(function () {
        if($(window).scrollTop() > offset.top) {
            navMenu.addClass('fixed');
        } else {
            navMenu.removeClass('fixed');
        }
    });

}

//======================================================================================================
// linkScroll( )
// 機能  ：Clickでページ内スクロール
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function linkScroll() {

    $('a[href^="#"]').on('click', function () {
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var pcPosition = target.offset().top-80;
        var spPosition = target.offset().top;
        if($('body').hasClass('pc')){
            $('body,html').animate({scrollTop:pcPosition}, 500, 'swing');
        }
        else {
            $('body,html').animate({scrollTop:spPosition}, 500, 'swing');
        }
        return false;
    });

}

//======================================================================================================
// btnAccrd( )
// 機能  ：アコーディオン
// 引数  ：なし
// 戻り値：なし
//======================================================================================================

function btnAccrd() {

    $("#faqSec dl dt").on("click", function() {
        $(this).next().slideToggle();
        $(this).toggleClass("active");
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

$(function(){
	$("a:not(.moreBtn a)").hover(function(){
		$(this).stop().animate({"opacity":"0.7"});
	},function(){
		$(this).stop().animate({"opacity":"1"});
	});
});


//■page topボタン
$(function() {

	var pagetop = '<p id="pageTop"><a href="#"><i class="fa fa-chevron-up"></i></a></p>';
	$('footer').append(pagetop);

	var topBtn=$('#pageTop');
	topBtn.hide();

 	//◇ボタンの表示設定
	$(window).scroll(function(){
		if($(this).scrollTop()>80){

			//---- 画面を80pxスクロールしたら、ボタンを表示する
			topBtn.fadeIn();

		}else{
			//---- 画面が80pxより上なら、ボタンを表示しない
			topBtn.fadeOut();

		}
	});

	// ◇ボタンをクリックしたら、スクロールして上に戻る
	topBtn.click(function(){
		$('body,html').animate({
		scrollTop: 0},500);
		return false;

	});


});

$(function() {
	  var $nav   = $('#navArea');
	  var $btn   = $('.toggle_btn');
	  var $mask  = $('#mask');
	  var open   = 'open'; // class
	  // menu open close
	  $btn.on( 'click', function() {

	    if ( ! $nav.hasClass( open ) ) {
	      $nav.addClass( open );
	    } else {
	      $nav.removeClass( open );
	    }
	  });
	  // mask close
	  $mask.on('click', function() {
	    $nav.removeClass( open );
	  });
});

$(function() {
	$('.toggle_btn').on('click',function() {
		console.log('click');
	});
});
$(function(){
	$('.nav-button').on('click',function(){
		var dir = '';
		if(document.URL.match(/contact/)) {
			dir = '../';
		}
		if( $(this).hasClass('active') ){
			$(this).removeClass('active');
			$(this).find('img').attr('src', dir+'image/sp/common/header_menu_open.png');
			$('.nav-wrap').addClass('close').removeClass('open');
		}else {
			$(this).addClass('active');
			$('.nav-wrap').addClass('open').removeClass('close');
			$(this).find('img').attr('src', dir+'image/sp/common/header_menu_close.png');
		}
	});
});

$(function(){
	$('table.table-list tr:even').addClass('tr-even');
	$('table.table-list tr:odd').addClass('tr-odd');
});
