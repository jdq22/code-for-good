jQuery(document).ready(function($){
  $('.flickr-photo-gallery-slideshow').scrollface({
    next   : $('#flickr-gallery-next'),
    prev   : $('#flickr-gallery-prev'),
    pager  : $('#flickr-gallery-pager'),
    speed  : 400,
    interval: 3000,
    easing : 'linear',
    transition: 'fade',
    pager_builder : function (pager, index, slide) {
      return $('a', pager).eq(index); 
    },
    before : function (old_slide, new_slide) {
      new_slide.slide.css({'display':'block','opacity':0});
    },
  });
});