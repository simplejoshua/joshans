$( document ).ready(function() {
    $("#delivery").on("click", function() {
        $(".pickupInformation-container").css({
            "display" : "none",
        })
        $(".deliveryInformation-container").css({
            "display" : "block",
        })
    })
    $("#pickup").on("click", function() {
        $(".deliveryInformation-container").css({
            "display" : "none",
        })
        $(".pickupInformation-container").css({
            "display" : "block",
        })
    })
    $("#close").on("click", function() {
        $(".masterOrderForm").css({
            "visibility" : "hidden",
        })
        $("#backdrop").css({
            "visibility" : "hidden",
        })
        $.scrollLock( false );
    })

    $('#delivery').change(function () {
        if($(this).is(':checked')) {
            $('#houseNo').attr('required');
            $('#brgySubd').attr('required');
            $('#cityMunicipality').attr('required');
            $('#deliveryDate').attr('required');
        
        } else {
            $('#brgySubd').removeAttr('required');
            $('#houseNo').removeAttr('required');
            $('#cityMunicipality').removeAttr('required');
            $('#deliveryDate').removeAttr('required');
        }
    });
    $('#pickup').change(function () {
        if($(this).is(':checked')) {
            $('#pick-upLocation').attr('required');
            $('#pickupDate-').attr('required');
        } else {
            $('#pick-upLocation').removeAttr('required');
            $('#pickupDate-').removeAttr('required');
        }
    })
})