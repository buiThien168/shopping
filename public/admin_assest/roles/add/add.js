$(function () {
    $(".checkbox_wrapper").on("click", function () {
        $(this)
            .parent()
            .parent()
            .parent(".card")
            .find(".checkbox_children")
            .prop("checked", $(this).prop("checked"));
    });
    $(".checkall").on("click", function () {
        $(this)
            .parents()
            .find(".checkbox_children")
            .prop("checked", $(this).prop("checked"));
        $(this)
            .parents()
            .find(".checkbox_wrapper")
            .prop("checked", $(this).prop("checked"));
    });
});
