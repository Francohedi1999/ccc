<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Session_controller extends Controller
{
    public function index( Request $request )
    {
        $title = "Connexion";
        return view('login' , compact('title'));
    }

    public function login( Request $request )
    {
        $request->validate([
            "mdp" => "required"
        ]);

        if( $request->mdp == "1234" )
        {
            $request->session()->put( 'data' , $request->all( ) ) ;

            if( $request->session()->has( 'data' ) )
            {
                return redirect( route( 'principale' ) );
            }
        }
        else
        {
            return back()->with("erreur" , "Veuillez vérifier le mot de passe");
        }
    }

    public function logout()
    {
        session()->forget( 'data' );
        return redirect( route( 'login' ) );
    }
}
