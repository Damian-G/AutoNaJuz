$(document).ready(function() {
    $(".fav").on("click", function() {
        var img = $(this);
        var idAuta = img.data("auto");
        $.ajax({
            type: "POST",
            url: "changeFav.php",
            data: { idAuta: idAuta },
            dataType: "json",
            success: function(response) {
                if (response.status === "added") {
                    img.attr("src", "liked.png");
                } else if (response.status === "removed") {
                    img.attr("src", "unliked.png");
                }
            }
        });
    });
});
