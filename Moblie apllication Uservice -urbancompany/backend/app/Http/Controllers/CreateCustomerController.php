<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Mail;
use Illuminate\Http\Request;
use App\Mail\InfoMail;
class CreateCustomerController extends Controller
{
    public function index()
    {
        $message = "create user now!";
        return view('create_users.index', compact('message'));
    }
    public function create()
    {
        $customer = Customer::latest()->first();
       if($customer){
        $reg_no = $customer->register_number + 1;
       }else{
        $reg_no = '1000';
       }
        return view('create_users.create', compact('reg_no'));
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        if($customer){
            $message = "User created successfully";
        }else{
            $message = "Not able to create user.";
        }
        $data = ['customer_name'=> $customer->customer_name,
        'reg_number'=> $customer->register_number,
        'email' => $customer->email, 'phone' => $customer->phone_number];
        Mail::to($data['email'])->send(new InfoMail($data));

        // Mail::send('mail', $data, function($message)use ($data) {
        //    $message->to($data['email'], 'Registration')->subject
        //       ('Basic Testing Mail');
        //    $message->from('alerts@tawnytech.in','Tawny');
        // });
        $message =  "Email Sent. Check your inbox.";
        return view('create_users.index',compact('message'));
    }
}
