jQuery(function ($) {

    var k = 'nt-cookiepolicy',
        v = 'accepted',
        p = $('#nt-cookie-policy'),
        h = p.height();

    p.css('bottom', -1 * h).removeClass('nt-cp-hidden');

    if ($.cookie(k) !== v) {
        p.on('click', 'a.nt-cp-close', function (e) {
            e.preventDefault();
            p.animate({bottom: -1 * h}, 300, 'easeInOutCirc');
            $.cookie(k, v, {expires: 365, path: '/'});
        }).animate({bottom: 0}, 1200, 'easeOutBounce');
    }

});
