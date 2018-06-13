<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Config;
use DB;
use sendwithus\API;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {

        return view('dashboard.Home.index');
    }

    public function topup()
    {
        $key = Config::get('stripe.stripe_secret');

        \Stripe\Stripe::setApiKey($key);

        $token = $_POST['stripeToken'];

        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => 10360, // amount in cents, again
                "currency" => "gbp",
                "source" => $token,
                "description" => "TopUp")
            );
        } catch (\Stripe\Error\Card $e) {

        }
        $userid = Auth::user()->id;
        $username = Auth::user()->name;
        $useremail = Auth::user()->email;
        $credit = Auth::user()->credit;
        $newcredit = $credit + 100;
        DB::table('users')
            ->where('id', $userid)
            ->update(['credit' => $newcredit]);

        $API_KEY = 'live_1bee3e05fd61e98ffa5b18fdbd1ce50e99c65b67';

        $api = new API($API_KEY);

        $response = $api->send('tem_R6AkjNNSPBr7DU5uqjJvfk',
            array(
                'name' => $username,
                'address' => $useremail),
            array(
                'email_data' => array(
                    'user_name' => $username,
                    'added_credit' => '100',
                    'remaining_credit' => $newcredit,
                ),
            )
        );

        return redirect('/home');

    }

}
