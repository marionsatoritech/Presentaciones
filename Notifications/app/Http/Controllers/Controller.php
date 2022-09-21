<?php

namespace App\Http\Controllers;

use App\mailObject;
use App\Models\User;
use App\Notifications\notificationBD;
use App\Notifications\notificationTask;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function notifyMail($userID, $mail){

        $user = User::find($userID);

        $user->notify(new notificationTask($mail));
    }

    public static function notifyDB($fromUser, $toUser){
        if(Auth::check()){
            $toUser->notify(new notificationBD($fromUser));
        }
    }
}
