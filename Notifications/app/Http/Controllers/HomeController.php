<?php

namespace App\Http\Controllers;

use App\Mail\genericMailable;
use App\mailObject;
use App\Models\User;
use App\Notifications\notificationTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function notify($id){
       Controller::notifyDB(User::find(Auth::user()->id),User::find($id));

       return redirect()->route('dashboard');
    }

    public function visto($id){
        
        Auth::user()->notifications->where('id',$id)->markAsRead();
 
        return redirect()->route('dashboard');
     }
}
