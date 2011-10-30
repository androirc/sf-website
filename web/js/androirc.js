(function ($) {
    $.fn.vAlign = function() {
        return this.each(function() {
            var h = $(this).height();
            var oh = $(this).outerHeight();
            var mt = (h + (oh - h)) / 2;

            $(this).css("margin-top", "-" + mt + "px");
            $(this).css("top", "50%");
            $(this).css("position", "absolute");
        });
    };
})(jQuery);

var addthis_config = {
    data_track_clickback : true,
    ui_click: true,
    ui_cobrand: 'AndroIRC'

}

var addthis_share = {
    templates: {
        twitter: '{{title}} - {{url}} (from @androirc)'
    }
}