"use strict";

$(function () {
  //aqui vai todo nosso código de javascript 
  $('nav.mobile').click(function () {
    //o que vai acontecer quando clicarmos na nav mobile 
    var listaMenu = $('nav.mobile ul');
    /*if(listaMenu.is(':hidden')== true)
    
    listaMenu.fadeIn();
    
    else
    
    listaMenu.fadeOut();*/

    if (listaMenu.is(':hidden') == true) {
      //<i class="fas fa-times"></i>
      var icone = $('.botao-menu-mobile').find('i');
      icone.removeClass('fa-bars');
      icone.addClass('fa-times');
      listaMenu.fadeIn();
    } else {
      var icone = $('.botao-menu-mobile').find('i');
      icone.removeClass('fa-times');
      icone.addClass('fa-bars');
      listaMenu.fadeOut();
    }

    ;
  });

  if ($('target').length > 0) {
    // O elemento existe, precisamos dar o scrool
    var elemento = '#' + $('target').attr('target');
    var divScroll = $(elemento).offset().top;
    $('html,body').animate({
      'scrollTop': divScroll
    }, 1000);
  }
});