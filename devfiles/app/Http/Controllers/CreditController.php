<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Config;
use DB;
use Input;

class CreditController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.settings.credit.index');
    }
    public function add()
    {
        $rawcredit1 = Input::get('credit');
        $rawcredit2 = $rawcredit1 * 103.4 + 20;

        return view('dashboard.settings.credit.stripe')->with(compact('rawcredit2'));
    }
    public function CreditAdd()
    {

        $amount2 = Input::get('topupvalue');
        $amount1 = Input::get('topupvalue1');
        $amount = round($amount2, 0, PHP_ROUND_HALF_UP);

        // /dd($amount);
        $key = Config::get('stripe.stripe_secret');

        \Stripe\Stripe::setApiKey($key);

        $token = $_POST['stripeToken'];

        // Create the charge on Stripe's servers - this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => $amount, // amount in cents, again
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
        $newcredit = $credit + $amount1;
        DB::table('users')
            ->where('id', $userid)
            ->update(['credit' => $newcredit]);

        flash()->success('Credit Added');
        return redirect('home');
    }
}
