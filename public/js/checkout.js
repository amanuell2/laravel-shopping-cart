Stripe.setPublishableKey('pk_test_nfOTdRv1XKiQFH4j1Rz9YhnC');


var $form = $('#checkout-form');
var $checkoutError = $('#charge-error');

$form.submit(function (event) {
    $checkoutError.addClass('hidden');
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response) {

    if (response.error) {
        $checkoutError.removeClass('hidden');
        $checkoutError.text(response.error.message);
        $form.find('button').prop('disabled', false);
    }
    else {
        var token = response.id;
        $form.append('<input type="hidden" name="stripeToken"/>').val(token);
        console.log(token);
        //subimt the form:
        $form.get(0).submit();
    }
}

