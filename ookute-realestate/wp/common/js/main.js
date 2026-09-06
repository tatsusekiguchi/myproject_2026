
  $(window).on("load scroll",function (){
    $(".effect").each(function(){ 
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight/5){
        $(this).addClass("animated");
      }
    });
  });


$(function(){
  $('a[href^="#"]').click(function(){
    var speed = 1000;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });

  $(".sp_btn").on('click',function(){
        if($(this).hasClass("active")){
        $(".sp_btn").removeClass("active");
        $(".sp_btn").next("nav").removeClass("on");
		$("header").removeClass("on");
        }else{
        $(".sp_btn").addClass("active");
        $(this).next("nav").addClass("on");
		$("header").addClass("on");
        }
  });

	
  $(window).on('load scroll',function(){
      var thisOffset = $('.top_level').offset().top + $('.top_level').outerHeight();
      if( $(window).scrollTop() >= thisOffset){
          $("header").addClass("active");
      } else {
          $("header").removeClass("active");
      }
  });

});
