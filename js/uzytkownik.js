$(document).ready(function() {

    $(".konwersacja-header").click(function() {
        $(this).next(".konwersacja-body").slideToggle();
    });

    $("#reportForm").on("submit", function(e) {
        e.preventDefault();

        $.post("addReport.php", $(this).serialize(), function(data) {
            if ($.trim(data) === "sukces") {
                alert("Zgłoszenie zostało wysłane.");
                location.reload();
                $("#report").val('');
            } else {
                alert("Wystąpił problem podczas wysyłania zgłoszenia.");
            }
        });
    });
});
