$(document).ready(function(){
    $('.button-collapse').sideNav();
    $('.slider').slider();
    $('select').material_select();
  });
  
function sliderPrev(){
    $('.slider').slider('pause');
    $('.slider').slider('prev');
}

function sliderNext(){
    $('.slider').slider('pause');
    $('.slider').slider('next');
}
