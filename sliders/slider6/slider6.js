function ArbNetRotator(tab, cnt) {
    $(tab).mouseenter(function (e, trg) {
        if (trg) e.stopPropagation();
        $(tab).siblings().removeClass("active");
        $(this).addClass("active");
        $(cnt).hide();
        $(cnt).eq($(this).index()).show();
        if (trg) return false;
    });

    $(tab).eq(0).parent().mouseenter(function (e) {
        e.stopPropagation();
        clearInterval(window.arbnettmrrotator);
        return false;
    });

    $(tab).eq(0).parent().mouseleave(function (e) {
        e.stopPropagation();
        var rot = $(this);
        window.arbnettmrrotator = setInterval(function () {
            rot.find("li").eq(rot.find("li.active").index() + 1 == rot.find("li").length ? 0 : rot.find("li.active").index() + 1).trigger('mouseenter', true);
        }, $(".news_headlines").attr("auto_news_headlines") );
        return false;
    });

    $(tab).eq(0).parent().mouseleave();
}

$(document).ready(function () {  
    ArbNetRotator('.news_headlines .news_list>li', '.news_headlines .wrapper');
});
