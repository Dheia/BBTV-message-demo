<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Session;
use Stripe;
use Auth;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Payment_logs;
use App\Models\Package;
    
class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
         $d['packages'] = Package::select('*')->get();
        return view('frontend.fan.stripe',$d);
    }
   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
         //dd($request);
        $user_id=Auth::user()->id;
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $paymentIntent = Stripe\Charge::create ([
                    "amount" => $request->amount,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Thanks For Add Credit." 
            ]);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return response()->json(['status' => false, 'message' => $e->getError()->message], 200);
        }
         dd($paymentIntent);
        if ($paymentIntent->status == 'succeeded') {
            $PaymentStatus = Transaction::create([
                'user_id'             => $user_id,
                'trans_id'            => $paymentIntent->id,
                'amount'              => $paymentIntent->amount,
                'balance_transaction' => $paymentIntent->balance_transaction,
                'currency'            => $paymentIntent->currency,
                'description'         => $paymentIntent->description,
                'paid'                => $paymentIntent->paid,
                'payment_method'      => $paymentIntent->payment_method,
                'status'              => $paymentIntent->status,
            ]);
            $d['user']=User::where('id',$user_id)->first();
            $d['user']->wallet=$d['user']->wallet+$paymentIntent->amount;
            $d['user']->save();
            $paymentlog= new Payment_logs;
            $paymentlog->user_id=$user_id;
            $paymentlog->amount=$paymentIntent->amount;
            $paymentlog->save();


            
            Session::flash('success', 'Payment successful!');
        }
       
           
        return back();
    }
}