$(document).ready(function() {
    $(".konwersacja-header").click(function() {
        $(this).next(".konwersacja-body").slideToggle();
    });

    $(document).on("submit", ".odpowiedz-form", function(e) {
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            type: "POST",
            url: "addResponse.php",
            data: formData,
            success: function(response) {
                if ($.trim(response) === "success") {
                    alert("Odpowiedź została dodana.");
                    form.find("textarea").val("");
                    location.reload();
                } else {
                    alert("Wystąpił problem podczas dodawania odpowiedzi.");
                }
            },
            error: function() {
                alert("Wystąpił problem podczas komunikacji z serwerem.");
            }
        });
    });
});