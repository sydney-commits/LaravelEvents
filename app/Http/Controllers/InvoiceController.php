<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function sendNotification(){

        $user = User::first();

        $invoicedata = [
            'body' => 'Invoice payment boss',
            'text'=>'Pay Now',
            'url'=>url('/'),
            'thankyou'=>'Pay Now'
        ];

        $user->notify(new InvoicePaid($invoicedata));

        return 'completed';


    }
}
