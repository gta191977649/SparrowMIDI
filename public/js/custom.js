//加载特效
$(document).ready(function() {
    $("#app").css("display","none");
    $("#app").slideDown("slow");
    $("body").css("display", "none");
    $("body").fadeIn();
});        
//点击特效
$(document).on("click", "a", function () {
    var newUrl = $(this).attr("href");
    if (!newUrl || newUrl[0] === "#") {
        location.hash = newUrl;
        return;
    }
    $("html").fadeOut(function () {
        location = newUrl;
    });

    return false;
});
