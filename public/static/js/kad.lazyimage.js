/**
 * 图片懒加载
 */
var LAZYCONF = {
    screenNum: 1.2,
    lazyName: "lazyimg",
    orginalSrc: "data-lazy-img"
},
tool = {
    getScrollTop: function () {
        return document.documentElement.scrollTop || document.body.scrollTop;
    },
    getClientHeight: function () {
        return document.documentElement.clientHeight || document.body.clientHeight;
    }
},
screenHeight = tool.getClientHeight();

$(function () {
    function lazyInit() {
        setTimeout(function () {
            lazyLoadyImg();
        }, 500);
        $(window).bind("scroll", lazyLoadyImg);
    };
    function lazyLoadyImg() {
        $('[data-lazyname="' + LAZYCONF.lazyName + '"]').each(function () {
            var kItem = $(this), top = kItem.offset().top;
            if ((kItem.height() !== 0 || top !== 0) && !kItem.is(':hidden') && top <= tool.getScrollTop() + screenHeight * LAZYCONF.screenNum) {
                var imgSrc = kItem.attr(LAZYCONF.orginalSrc);
                kItem.removeAttr("data-lazyname");
                kItem.removeAttr(LAZYCONF.orginalSrc);
                kItem.attr("src", imgSrc);
            }
        });
    }
    lazyInit();
})

