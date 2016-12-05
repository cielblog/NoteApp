$(document).ready(function () {

    $("#saveNote").on('click', function () {

        var note_title = $("#note_title");
        var note_text = $("textarea#note_text");
        var action = $("#action").val();

        var _data = {note_title: note_title.val(), note_text: note_text.val()};

        //alert(action);


        $.ajax({
            url: action,
            method: "POST",
            data: _data,
            cache: false,
            dataType: 'json',

            success: function (result) {
                var error_type = result.type;
                var error_msg = result.msg;

                if (error_type !== 'success') {
                    $("#alert").addClass('alert-'+error_type);
                }
                $("#alert").addClass('alert-'+error_type);
                $("#alert").html(error_msg);

                if (error_type === 'success') {
                    note_title.val(null);
                    note_text.val(null);

                    window.location.reload();
                }

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.warn(XMLHttpRequest.responseText);
                alert("The are some problems from our ends. please tey again later.");
            }

        });
    });
});