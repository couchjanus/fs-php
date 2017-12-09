jQuery.extend( jQuery.easing, {
  
      easeInOutExpo: function (x, t, b, c, d) {
            if (t==0) return b;
            if (t==d) return b+c;
            if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
            return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
        },
});

function toggle_panel(panel, background_layer) {

     if (panel.hasClass('speed-in')) {
         panel.removeClass('speed-in');
         background_layer.removeClass('is-visible');
     } else {
            panel.addClass('speed-in');
            background_layer.addClass('is-visible');
            }
}

