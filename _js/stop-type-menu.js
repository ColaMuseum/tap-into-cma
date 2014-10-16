$(function () {
    $("#selector li a").on("click", function () {
        var e = $(this).attr("id");
        var t = $(".stop-list li");
        $("#selector li").removeClass("selected");
        if (e == "all") {
            t.fadeIn().filter(".hidden").fadeOut();
        } else t.fadeOut().filter("." + e + "Stop").fadeIn();
        switch (e) {
        case "all":
            $("#category").show().text("All Stops");
            $(this).parent().addClass('selected');
            break;
        case "audio":
            $("#category").show().text("Commentary");
            $(this).parent().addClass('selected');
            break;
        case "music":
            $(this).parent().addClass('selected');
            $("#category").show().text("Musical Selections");
            break;
        case "film":
            $(this).parent().addClass('selected');
            $("#category").show().text("Films");
            break;
        case "image":
            $(this).parent().addClass('selected');
            $("#category").show().text("Images");
            break
        }
        return false;
    });
    $("input[name='stopID']").val("")
})