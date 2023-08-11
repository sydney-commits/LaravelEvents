<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;


class RegisteredUserController extends Controller
{
   use Queueable;
    public function create(): View
    {
        return view('auth.register');
    }

  
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        

        $data = array('name'=>"Virat Gandhi", 'email' => $user->email);
     
        Mail::send(['text'=>'mail'], $data, function($message) {
           $message->to('sydneysunya@gmail.com', 'Tutorials Point')->subject
              ('Laravel Basic Testing Mail');
           $message->from('theblockbusters9@gmail.com','Virat Gandhi');
        });

       echo "Basic Email Sent. Check your inbox.";





       event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
