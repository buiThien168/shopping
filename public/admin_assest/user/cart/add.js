// $(document).ready(function () {
//     // Function to handle quantity increment
//     $(".cart_quantity_input").on("input", function () {
//         updateCartItemTotal($(this));
//         // calculateCartTotal();
//     });
//     $(".cart_quantity_up").on("click", function (e) {
//         e.preventDefault();
//         var inputElement = $(this).siblings(".cart_quantity_input");
//         var currentValue = parseInt(inputElement.val(), 10);
//         inputElement.val(currentValue + 1);

//         $(".cart_total_price").each(function () {
//             currentValue += parseFloat($(this).text());
//         });
//         $("#cart_total").text(formatCurrency(currentValue));
//         updateCartTotal($(this));
//     });

//     // Function to handle quantity decrement
//     $(".cart_quantity_down").on("click", function (e) {
//         e.preventDefault();
//         var inputElement = $(this).siblings(".cart_quantity_input");
//         var currentValue = parseInt(inputElement.val(), 10);
//         if (currentValue > 1) {
//             inputElement.val(currentValue - 1);
//             updateCartTotal($(this));
//         }
//     });
// });
$(document).ready(function () {
    // Function to handle quantity changes
    $(".cart_quantity_input").on("input", function () {
        updateCartItemTotal($(this));
        calculateCartTotal();
    });

    // Function to update the total price for each cart item
    function updateCartItemTotal(inputElement) {
        var quantity = parseInt(inputElement.val(), 10);
        var pricePerUnit = parseFloat(inputElement.data("price-per-unit"));
        var total = quantity * pricePerUnit;
        inputElement
            .closest("tr")
            .find(".cart_total_price")
            .text(total.toFixed(2));
    }

    // Function to calculate the total price for the entire cart
    function calculateCartTotal() {
        var cartTotal = 0;
        $(".cart_total_price").each(function () {
            cartTotal += parseFloat($(this).text());
        });
        $("#cart_total").text(formatCurrency(cartTotal));
    }

    // Initial calculation of cart total when the page loads
    calculateCartTotal();
});
