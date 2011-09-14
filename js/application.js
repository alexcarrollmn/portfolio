$(document).ready(function(){
  if($('#projectNav').length !=0){
    $('#nav').css('background', '#ffffff');
    $(window).scroll(function(){ 
      if ( $(window).scrollTop() >= $("#nav").offset().top ){
          $("#nav").css({
            position : "fixed",
            top : "0"
          });
    
          $("#pushDiv").css("height",$("#nav").height()+10);
      } 
      if ( $(window).scrollTop() <= $("#pushDiv").offset().top ){
          $("#nav").css({
            position : "inherit",
            top : "0"
          });
          $("#pushDiv").css("height","0");
      }
      if ( $(window).scrollTop() + $("#nav").height() + 115 > $('#diablomode').offset().top && $(window).scrollTop() + $("#nav").height() + 115 < ($('#diablomode').offset().top + $('#diablomode').height()) ){
        $(".dmLink").css("color","#F16522");
      }else {
        $(".dmLink").css("color","#000000");
      } 
      if ( $(window).scrollTop() + $("#nav").height() + 115 > $('#andrewschroeder').offset().top && $(window).scrollTop() + $("#nav").height() + 115 < ($('#andrewschroeder').offset().top + $('#andrewschroeder').height()) ){
        $(".asLink").css("color","#F16522");
      }else {
        $(".asLink").css("color","#000000");
      }
      if ( $(window).scrollTop() + $("#nav").height() + 115 > $('#twenty20').offset().top && $(window).scrollTop() + $("#nav").height() + 115 < ($('#twenty20').offset().top + $('#twenty20').height()) ){
        $(".twentyLink").css("color","#F16522");
      }else {
        $(".twentyLink").css("color","#000000");
      }
      if ( $(window).scrollTop() + $("#nav").height() + 115 > $('#slurp').offset().top && $(window).scrollTop() + $("#nav").height() + 115 < ($('#slurp').offset().top + $('#slurp').height()) ){
        $(".slurpLink").css("color","#F16522");
      }else {
        $(".slurpLink").css("color","#000000");
      }
      if ( $(window).scrollTop() + $("#nav").height() + 115 > $('#learningwco').offset().top && $(window).scrollTop() + $("#nav").height() + 115 < ($('#learningwco').offset().top + $('#learningwco').height()) ){
        $(".wcoLink").css("color","#F16522");
      }else {
        $(".wcoLink").css("color","#000000");
      } 
    });
    function goToByScroll(id){
      $('html,body').animate({scrollTop: $(id).offset().top - 97},'slow');
    }
    $("#nav a").click(function(event){
      event.preventDefault();
      var href = $(event.target).attr('href');
      goToByScroll(href);
    });
  }
  if($('.message').length != 0){
    goToByScroll($('.message'));
  }
  
  //
  if ($("link[rel='stylesheet']").attr("href") == "/css/style.css"){
    var imageset = [],
      i=0,
      images;
    
    $.each($('.code-images'), function(iter, el) {
      images = [];
      for(i=0; i < $(el).find('img').length; i++) {
        images.push($($(el).find('img')[i]).attr('src'));
      }
      imageset.push(images);
    })
    
    $(".slider-controls").css("display","block");
    $(".code-images a img").click(function(e) {
      goToByScroll($(this).closest("article"));
      $(this).closest('article').find(".projectImage").attr('src', $(this).attr('src'));
    
      return false;
    });
    
    var match_against, current, next;
    
    function previous(current, images) {
      if(current == 0) {
        next = images.length - 1;
      } else {
        next = current - 1;
      }
      
      return images[next];
    }
    
    function next_img(current, images) {
      if(current == images.length - 1) {
        next = 0;
      } else {
        next = current + 1;
      }
      
      return images[next];
    }
    
    function offset(state, position, current_el) {
      match_against = imageset[position];
      current = $.inArray($(current_el).attr('src'), match_against);
      
      if(state == 'prev') {
        new_el = previous(current, match_against);
      } else {
        new_el = next_img(current, match_against);
      }
      function getPosition(arrayName,arrayItem)
      {
        for(var i=0;i<arrayName.length;i++){ 
         if(arrayName[i]==arrayItem)
        return i;
        }
      }
    }
    $('.prev, .next').click(function() {
      offset($(this).attr('class'), $(this).parents('article').index(), $(this).parent().next('img'));
      $(this).parent().parent().find('.projectImage').attr('src', new_el);
      return false;
    })
  }

  
});
