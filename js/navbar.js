$(function(){
 
//MENU
$(function(){
$(".mod_nav").each(function() {
  var panelbtn=$(this).find(".navtitle");
  var closebtn=$(this).find(".mod_nav_inner .closebtn");
  var panelinner=$(this).find(".mod_nav_inner");
    $(panelbtn).addClass("close");
     
//命令
  $(function(){
    $(panelbtn).click(function(){
      if($(panelinner).css("display")=="none"){
        $(panelinner).slideDown("fast").removeClass("close").addClass("open");
        $(this).removeClass("close").addClass("open");}else{
        $(panelinner).slideUp("fast").removeClass("open").addClass("close");
        $(this).removeClass("open").addClass("close");
      }
    });
    //close
    $(closebtn).click(function(){
        $(panelinner).slideUp("fast").removeClass("open").addClass("close");
                  $(panelbtn).removeClass("open").addClass("close");
    });
  });
});
});
 
 
//visible
$(function() {
    var windowWidth = $(window).width();
    $(window).resize(function(){
                    var ww = $(window).width();
                    if(windowWidth != ww) {
                    if($(".navtitle").css("display")=="none") {
                    $(".mod_nav_inner").css("display","block").removeClass("close").addClass("open");
                    } else {
                    $(".mod_nav_inner").css("display","none").removeClass("open").addClass("close");
                    }
                    windowWidth = ww;
                    }
    });
});
 
});
