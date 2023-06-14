<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Mail;
use App\Http\Controllers\Controller;
use App\Mail\InfoMail;

class ApiController extends Controller
{

   public function register_user(Request $request){
       $response = ["status"=>0,"data"=>null,"msg"=>""];
       if(!isset($request->email) || !isset($request->password) || !isset($request->customer_name)
           || !isset($request->phone_number)){
           $response["msg"] = "Missing Parameter";
           return json_encode($response);
       }
       try {
           $user = new Customer();
           $user->email = $request->email;
           $user->password = $request->password;
           $user->customer_name = $request->customer_name;
           $user->phone_number = $request->phone_number;
           $user->save();
           $response["status"] = 1;
           return json_encode($response);
       } catch (QueryException $e ) {
           $response["msg"] = $e;
           return json_encode($response);
       }
   }
    public function login_user(Request $request){
        $response = ["status"=>0,"data"=>null,"msg"=>""];
        if(!isset($request->email)|| !isset($request->password)){
            $response["msg"] = "Missing Parameter";
            return json_encode($response);
        }
        try{
            $user = Customer::where("email",$request->email)->where('password', $request->password)->first();
            if(!is_object($user)){
                $response["msg"] = "Invalid User Info";
                return json_encode($response);
            }
            $response["status"] = 1;
            $response["data"] = $user;
            return json_encode($response);
        }catch(QueryException $e){
            $response["msg"] = $e;
            return json_encode($response);
        }
    }


    public function get_category()
    {
        $response = ["status" => 0, "data" => null, "msg" => ""];
        try {
            $category = Category::all();
            if (!is_object($category)) {
                $response["msg"] = "No Data Found";
                return json_encode($response);
            }
            $response["status"] = 200;
            $response["data"] = $category;
            return json_encode($response);
        } catch (QueryException $e) {
            $response["msg"] = $e;
            return json_encode($response);
        }
    }

    public function get_sub_category_by_id(Request $request)
    {
        $response = ["status" => 0, "data" => null, "msg" => ""];
        if (!isset($request->category)) {
            $response["msg"] = "Missing Parameter";
            return json_encode($response);
        }
        try {
            $subCategory = SubCategory::where("category", $request->category)->get();
            if (!is_object($subCategory)) {
                $response["msg"] = "Invalid User Info";
                return json_encode($response);
            }
            $response["status"] = 200;
            $response["data"] = $subCategory;
            return json_encode($response);
        } catch (QueryException $e) {
            $response["msg"] = $e;
            return json_encode($response);
        }
    }

    public function get_product_by_sub_category(Request $request)
    {
        $response = ["status" => 0, "data" => null, "msg" => ""];
        if (!isset($request->sub_category)) {
            $response["msg"] = "Missing Parameter";
            return json_encode($response);
        }
        try {
            $product = Product::where('sub_category', $request->sub_category)->get();
            if (!is_object($product)) {
                $response["msg"] = "No Data Found";
                return json_encode($response);
            }
            $response["status"] = 200;
            $response["data"] = $product;
            return json_encode($response);
        } catch (QueryException $e) {
            $response["msg"] = $e;
            return json_encode($response);
        }
    }

    public function order_details(Request $request)
    {
        $response = ["status" => 0, "data" => null, "msg" => ""];
        if (
            !isset($request->order_by)
            || !isset($request->phone)
            || !isset($request->email)
            || !isset($request->order_product)
            || !isset($request->date)
            || !isset($request->price)
            || !isset($request->payment_mode)
            || !isset($request->address)
            || !isset($request->card_info)
            || !isset($request->otp_status)
        ) {
            $response["msg"] = "Missing Parameter";
            return json_encode($response);
        }
        try {
            $otp = rand(10000,99999);


            $product = new Order();
            $product->order_by =  $request->order_by;
            $product->phone =  $request->phone;
            $product->email =  $request->email;
            $product->order_product =  $request->order_product;
            $product->date =  $request->date;
            $product->price =  $request->price;
            $product->payment_mode =  $request->payment_mode;
            $product->address =  $request->address;
            $product->card_info =  $request->card_info;
            $product->otp =  $otp;
            $product->otp_status =  $request->otp_status;
            $product->save();
            self::basic_email($otp, $request);
            $response["status"] = 200;
            $response["data"] = $product;
            return json_encode($response);
        } catch (QueryException $e) {
            $response["msg"] = $e;
            return json_encode($response);
        }
    }

    public function verifyOTP(Request $request)
    {
        $response = ["status" => 0, "data" => null, "msg" => ""];
        if (!isset($request->otp) || !isset($request->phone)) {
            $response["msg"] = "Missing Parameter";
            return json_encode($response);
        }
        try {
            $order = Order::where('otp', $request->otp)->where('phone', $request->phone)->orderBy('id', 'DESC')->limit(1)->first();

            if (!is_object($order)) {
                $response["msg"] = "No Data Found";
                return json_encode($response);
            }
            $ord = Order::find($order->id);
            $ord->otp = $request->otp;
            $ord->otp_status = 'connected';
            $ord->save();

            $response["status"] = 200;
            $response["data"] = $ord;
            return json_encode($response);
        } catch (QueryException $e) {
            $response["msg"] = $e;
            return json_encode($response);
        }
    }

    public function basic_email($otp , $request) {
        $data = ['order_by'=> $request->order_by,
        'otp'=> $otp,
        'email' => $request->email, 'phone' => $request->phone];
        Mail::to($data['email'])->send(new InfoMail($data));



        // Mail::send(['text'=>'mail'], $otp, function($message, $email) {
        //    $message->to($email, 'Received OTP')->subject
        //       ('Basic Testing Mail');
        //    $message->from('arunkrishnan2k@gmail.com','OTP');
        // });
        // echo "Basic Email Sent. Check your inbox.";
     }


    public function job()
    {
//       $whiteList= Whitelist::all();
//       foreach($whiteList as $white){
//            if($white->duration  == now()->diffInDays($white->created_at)){
//                Whitelist::where('phone', $white->phone)->delete();
//            }
//       }
    }
}
