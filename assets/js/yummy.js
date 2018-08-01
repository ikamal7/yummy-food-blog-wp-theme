(function($){
    'use strict';
    $(document).ready(function () {
       $('.post-content blockquote').addClass('yummy-blockquote mt-30 mb-30');
       $('.post-content ul').addClass('mt-30 mb-30');
       $('.post-content img').addClass('br-30 mb-30');
       $('ul#yummy-nav li a, #yummy-footer-nav li a').addClass('nav-link');
       $("ul#yummy-nav ul").parent("li").children("a").append(' <i class="fa fa-caret-down"></i>')
    });

})(jQuery);