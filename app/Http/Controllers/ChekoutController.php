<?php

namespace App\Http\Controllers;

use App\customer;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\shipping;
use Illuminate\Http\Request;
use Mail;
use Cart;
use Session;
class ChekoutController extends Controller
{
    public function index()
    {
        return view('frontEnd.checkout.checkout-content');
    }
    /*
     * customerSingUp function create with
     * customer information and
     * singUp system create
     * email verify
     */
    public function customerSingUp(Request $request){
        $this->validate($request,[
            'email_address' => 'required|email|unique:customers,email_address',
        ]);
        $customer = new customer();
        $customer->first_name    = $request->first_name;
        $customer->last_name     = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password      = bcrypt($request->password);
        $customer->phone_number  = $request->phone_number;
        $customer->address       = $request->address;
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        Session::put('customerName', $customer->first_name.' '.$customer->last_name);
        $data = $customer->toArray();
        Mail::send('frontEnd.mails.confirmation-mail', $data, function($message) use($data){
            $message ->to($data['email_address']);
            $message ->subject('confirmation mail');
        });
        return redirect('/checkout/shipping');
    }
    public function shippingFrom(){
        $customer = customer::find(Session::get('customerId'));
        return view('frontEnd.checkout.shipping',['customer' => $customer]);
    }
    public function saveShippingInfo(Request $request)
    {
        $shipping = new shipping();
        $shipping->full_name      = $request->full_name;
        $shipping->email_address  = $request->email_address;
        $shipping->phone_number   = $request->phone_number;
        $shipping->address        = $request->address;
        $shipping->save();
        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }
    public function login(Request $request){
        $customer = customer::where('email_address',$request->Email)->first();
        if(password_verify($request->password,$customer->password)){
                Session::put('customerId',$customer->id);
                Session::put('customerName',$customer->firstName.' '.$customer->last_name);
                return redirect('/checkout/shipping');
        }else{
            return redirect('/cart/checkout')->with('message',"password or email address are not metch");
        }

    }
    public function paymentForm(){
        return view('frontEnd.checkout.payment');
    }
    public function newOrder(Request $request){
       $paymentType = $request->payment_type;
       if($paymentType == 'Cash'){
            $order               = new Order();
            $order->customer_id  = Session::get('customerId');
            $order->shipping_id  = Session::get('shippingId');
            $order->order_total  = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id       = $order->id;
            $payment->payment_type   = $paymentType;
            $payment->save();

            $cartProducts = Cart::getContent();
            foreach($cartProducts as $cartProduct){
                $orderDetails                = new OrderDetails();
                $orderDetails->order_id      = $order->id;
                $orderDetails->product_id    = $cartProduct->id;
                $orderDetails->prodcut_name  = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->quantity;
                $orderDetails->save();
            }
           Cart::clear();
            return redirect('/complete/order');
       }elseif ($paymentType == 'paypal'){

       }elseif ($paymentType == 'bkash'){

       }

    }
    public function logout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }
    public function completeOrder(){
        return 'success';
    }
}
