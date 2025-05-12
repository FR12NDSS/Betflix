function PasswordLock(user) {
    $("#dialog-confirm").html("Do you want to unlock it?");
    $("#dialog-confirm").dialog({
        resizable: false,
        open: function (event, ui) {
            $(".ui-widget-overlay").remove();
        },
        position: { my: 'top', at: 'top+30%' },
        modal: true,
        title: "PASSWORD LOCK",
        height: 125,
        width: 200,
        buttons: {
            "Yes": function () {
                var AJ_Post = $.ajax({
                    type: "POST", url: "../PLock_G.ashx"
                    , data: { userName: user }
                    , success: function (output) {
                        switch (output) {
                            case "N1":
                                window.location.reload(); 
                                break;
                            default:
                                alert(output);
                                break;
                        }
                    }
                });
            },
            "No": function () { $(this).dialog('close'); }
        }
    });
}