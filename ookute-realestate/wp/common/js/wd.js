function tgBrowserWidth()
{
    var checkWidth = function() {
        var browserWidth = $(window).width();

    if(browserWidth >= 1100){
 		$('.imgChange').each(function(){
			$(this).attr("src",$(this).attr("src").replace('_sp', '_pc'));
		});
        $('.telhref span').each(function(){
            $(this).unwrap();
        });
    }else{
 		$('.imgChange').each(function(){
			$(this).attr("src",$(this).attr("src").replace('_pc', '_sp'));
		});
		$(document).ready(function(){
			fit();
			$(window).resize(function(){
				fit();
			});
		function fit(){
			var h = $(window).height();
			$('.menu-inner').css("height",h);
		}
		});

    }

    };

    $(function(){
        checkWidth();
        $(window).resize(checkWidth);
		
    });
	
}

//スティッキーヘッダー
$(function () {
    var $window = $(window);
    var $content = $("#content");
    var $change = $("#change");

    if (!$content.length || !$change.length) {
        return;
    }

    var topContent = $content.offset().top;
    var sticky = false;

    $window.on("scroll", function () {
        if ($window.scrollTop() > topContent) {
            if (sticky === false) {
                $change.fadeIn();
                sticky = true;
            }
        } else if (sticky === true) {
            $change.fadeOut("fast");
            sticky = false;
        }
    });

    $window.trigger("scroll");
});
