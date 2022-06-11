<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;
use App\Models\MemberShipPayment;
use App\Models\PaymentDetail;
use App\Models\User;

class CheckoutController extends Controller
{
    //Production
   private $appId;
   private $secretKey;

   public function __construct()
    {
        //production
        // $this->appId = '413230ff57f1de753a338b1a832314';
        // $this->secretKey ='758f55f5d4162ac1fa80f3ca234254e143133075';
        //Test
        $this->appId='174247b4f4de6a5e938c4673b1742471';
        $this->secretKey='210f6423df29d52d90a772f6c4650ca7f1143967';
    }


    public function checkoutMembership(Request $req){
        $package_id = $req->package_id;
        $user_id = Auth::user()->id;
        $user= User::where('id','=',$user_id)->first();

        $package_data = Package::where('id', $package_id)->first();

        $last = MemberShipPayment::latest('id')->first();
        if(!$last){
            $no=str_pad(1, 4, "0", STR_PAD_LEFT);
        }
        else{
            $no =str_pad($last->id + 1, 4, "0", STR_PAD_LEFT);
        }
        $orderNumber ='MAT'.$no;

        MemberShipPayment::create([
            'reg_id' => $user_id,
            'plan_id' => $req->package_id,
            'amount' => $req->package_amt,
            'transaction_id' => $orderNumber,
            'payment_status'=>'pending'
        ]);

        $orderId =   time();
        $orderAmount = $req->package_amt;
        $orderNote = $orderNumber;
        //globally declared
        $host=env('APP_URL');
        $notifyUrl='http://127.0.0.1:8000/api/return-membership';
        $returnUrl='http://127.0.0.1:8000/api/return-membership';
        // $notifyUrl=redirect('/notify-membership');
        // $returnUrl=redirect('/return-membership');
        $orderDetails=array();
        $orderDetails["notifyUrl"] =$notifyUrl;
        $orderDetails["returnUrl"] =$returnUrl;

        $orderDetails['customerName'] =$user->name;
        $orderDetails['customerEmail'] =$user->email;
        $orderDetails['customerPhone'] =$user->email;
        $orderDetails['orderId'] =$orderNumber;
        $orderDetails['orderAmount'] =$orderAmount;
        $orderDetails['orderNote'] = $orderNote;
        $orderDetails['orderCurrency'] ='INR';
        //test App Key
        //$orderDetails['appId'] ='75460e3d609e6e4f34db2ae2206457';
        //Production App Key
        $orderDetails['appId'] =$this->appId;
        $orderDetails['signature'] =$this->generateSignature($orderDetails);
        return response()->json(['msg'=>$orderDetails]);
    }

    public function generateSignature($postData)
    {
        //Test Secret Key
        $secretKey1 = $this->secretKey;
        //Production Key
        //$secretKey="758f55f5d4162ac1fa80f3ca234254e143133075";
        // get secret key from your config
        ksort($postData);
        $signatureData = "";
        foreach ($postData as $key => $value){
            $signatureData .= $key.$value;
        }
        $signature = hash_hmac('sha256', $signatureData, $secretKey1,true);
        $signature = base64_encode($signature);
        
        return $signature;
    }


    public function returnRegister(Request $request)
    {
    //   dd($request);
      $userId = Auth::user()->id;
        //dd($userId);
       $user= User::where('id','=',$userId)->get();
       $plan_id = MemberShipPayment::where('transaction_id', $request->orderId)
       ->where('reg_id', $userId)->first();
        $tranaction_data[]=[
            'order_id' =>$request->orderId,
            'transaction_id'=> $request->referenceId,
            'transaction_status' =>$request->txStatus,
            'amount' =>$request->orderAmount,
            'user_id'=> $userId,
            'plan_id' =>$plan_id->id,
            'payment_mode' =>$request->paymentMode,
            'transaction_message'=> $request->txMsg,
            'transaction_date' =>$request->txTime,
            'signature' =>$request->signature,
            'created_at' =>now(),
            'updated_at' =>now(),
            'transaction_subject'=>'registration'
            ];
           $td= PaymentDetail::insert($tranaction_data);
        
        if($request->txStatus=='SUCCESS'){
           
                // $payment = DataAnalyst::where('user_id', $userId)->first();
                // $payment->payment_status = 1;
                // $paySuccess = $payment->update();
            $success=MemberShipPayment::where('transaction_id', $request->orderId)
            ->where('reg_id', $userId)->update(['payment_status'=>'completed']);
        }
        else{
            
            $failed=MemberShipPayment::where('transaction_id', $request->orderId)
            ->where('reg_id', $userId)->update(['payment_status'=>'failed']);
           
        }
        // return view('frontend.checkout.return-registration',compact('request'));
        
        return response()->json(['msg1'=>$request]);
    }

}
