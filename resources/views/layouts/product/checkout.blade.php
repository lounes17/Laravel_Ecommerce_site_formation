@extends('layouts.dashboard')
@section('css-stripe')

<style>
    .StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
 }

  .StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
 }

  .StripeElement--invalid {
  border-color: #fa755a;
 }

   .StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
 }

</style>
@endsection
@section('content')
<div class="dashboard-wrapper" >
<div class="container mt-4 mb-4 d-flex align-items-center">
    <div class="card col-md-8  ">
        <div class="card-body">
        <form action="/charge" method="post" id="payment-form">
                @csrf
                <div class="form">
                <input type="hidden" name="amount" value="{{$amount}}">
                  <label for="card-element  ">
                      <strong>Credit or debit card</strong>

                  </label>
                  <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                  </div>

                  <!-- Used to display form errors. -->
                  <div id="card-errors" role="alert"></div>
                </div>
                <button type="submit" class="btn btn-secondary mt-4 mb-2">Submit Payment</button>
                <p id="loading"style="display:none"class="text-info font-weight-bolder " > A wait please The payment is loading... </p>


              </form>
        </div>
    </div>

</div>

@endsection
@section('script-stripe')

<script src="https://js.stripe.com/v3/"></script>
<script>
window.onload=function(){
    var stripe = Stripe('pk_test_51Gu0zPJIqKuwACShXQRZCJgJum3f9l62I6641L8EHO6n28Xcd1Vt6kuSku32d9fpAoZ5D8qcr8H09ZEtph4Q0ZF100ETccIUQz');
    var elements = stripe.elements();
    var style = {
    base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
var card = elements.create('card', {style: style});
card.mount('#card-element');
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  var loading=document.getElementById('loading');
  loading.style.display='block';

  // Submit the form
  form.submit();
}
}
</script>

@endsection
