<?php
$currentuseremail = Auth::user()->email;
$credit = Auth::user()->credit;
$key = Config::get('stripe.stripe_publishable');

?>

    <div class="col-md-4">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Add Credit</h4>
                                </div>
                                <div class="panel-body">
                                    <h1>Your Remaining Credit is £{{$credit}}</h1>
                                    <hr>
                                    <h5>Click the button below to add £100</h5>
                                    <p>Transaction fee applies (3.4% + 20p) as a standard</p>
                                    <br>
                                    <form action="{{ url('topup') }}" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="{{$key}}"
    data-email="{{ $currentuseremail }}"
    data-amount="10360"
    data-currency="gbp"
    data-name="Concorde Express TopUp"
    data-description="£100 Credit TopUp {{$currentuseremail}}"
    data-image="{{ asset('/assets/img/75_Logo.png') }}">
  </script>
</form>
                                </div>
                            </div>
                        </div>
