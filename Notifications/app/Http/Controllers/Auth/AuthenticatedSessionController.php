<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\mailObject;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $mail = new mailObject();
        $mail->to = Auth::user()->email;
        $mail->subject = "Nuevo Inicio de sesion";
        $mail->bodyText = "Si no has iniciado sesion ponerte en contacto";
        $mail->btnActions = [
                ["btnText" => "LLevame",
                "btnLink" => route("login")],
            ];
        $mail->view = [view('exampleView')->render(),
                        view('exampleView')->render(),
                        view('exampleView')->render()];

        $mail->backgound = "#c3c3c3";
        $mail->border = "red; border-width: 2px; border-radius: 10px; border-style: solid";
        
        Controller::notifyMail(Auth::user()->id, $mail);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
