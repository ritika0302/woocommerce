jQuery(document).ready(function(){

var select_number_of_slide = upsell_object.select_number_of_slide;
var select_autoplay_on = upsell_object.select_autoplay_on;
var select_navigation_on = upsell_object.select_navigation_on;
var select_autoplay_time = upsell_object.select_autoplay_time;
var select_autoplay_hover = upsell_object.select_autoplay_hover;
var select_style_of_slide = upsell_object.select_style_of_slide;



if(select_autoplay_hover = 'on'){

    var final_autoHover = true;
}
else{
     var final_autoHover = false;
}
if(select_navigation_on = 'on'){

    var final_navigation = true;

}
else{
     var final_navigation = false;
}


jQuery('.owl-carousel').owlCarousel({
    items:select_number_of_slide,
    loop:true,
    margin:10,
    autoplay:select_autoplay_on,
    autoplayTimeout:select_autoplay_time,
    autoplayHoverPause:final_autoHover,
    nav:true,
    dots:false,
    navText: ['<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-left fa-stack-1x fa-inverse"></i></span>','<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-right fa-stack-1x fa-inverse"></i></span>'],

});





});
