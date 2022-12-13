<?php

namespace App\Http\Controllers;

use App\Code;
use App\Grade;
use App\Enseignant;
use Illuminate\Http\Request;

class Enseignant_controller extends Controller
{
    public function index( Request $request )
    {
        $title = "Liste des enseignants";

        $enseignants = Enseignant::where('nom', 'like', '%'.$request->recherche.'%')
                                    ->orWhere('prenom', 'like', '%'.$request->recherche.'%')
                                    ->orWhere('im', 'like', '%'.$request->recherche.'%')
                                    ->orWhere('cin', 'like', '%'.$request->recherche.'%')
                                    ->orWhere('email', 'like', '%'.$request->recherche.'%')
                                    ->orWhere('adresse', 'like', '%'.$request->recherche.'%')
                                    ->orWhere('contact', 'like', '%'.$request->recherche.'%')
                                    ->orderBy('id' , 'asc')
                                    ->paginate(5);

        return view('enseignant/liste' , compact('title' , 'enseignants'));
    }

    public function create()
    {
        $title = "Ajout enseignant(e)";

        $codes = Code::all();
        $grades = Grade::all();

        return view('enseignant/ajout' , compact('title' , 'codes' , 'grades'));
    }

    public function save( Request $request )
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "im" => "required",
            "cin" => "required",
            "email" => "required|email",
            "adresse" => "required",
            "contact" => "required",
            "code_id" => "required|integer",
            "grade_id" => "required|integer"
        ],
        [
            "nom.required" => "Veuillez bien remplir le nom" ,
            "prenom.required" => "Veuillez bien remplir le prenom" ,
            "im.required" => "Veuillez bien remplir l' IM" ,
            "cin.required" => "Veuillez bien remplir le CIN" ,
            "email.required" => "Veuillez bien remplir l' e-mail" ,
            "email.email" => "Veuillez bien remplir l' e-mail" ,
            "adresse.required" => "Veuillez bien remplir l' adresse" ,
            "contact.required" => "Veuillez bien remplir le contact" ,
            "code_id.required" => "Veuillez bien remplir le code" ,
            "code_id.integer" => "Veuillez bien remplir le code" ,
            "grade_id.required" => "Veuillez bien remplir le garde" ,
            "grade_id.integer" => "Veuillez bien remplir le garde"
        ]);

        Enseignant::create( $request->all() );
        return back()->with("success" , "Enseignant enregistré avec succès !!!");
    }

    public function edit( $id )
    {
        $title = "Modification ENS".$id;
        $codes = Code::all();
        $grades = Grade::all();
        $enseignant = Enseignant::find( $id );

        return view('enseignant/edit' , compact('title' , 'codes' , 'grades' , 'enseignant' ));
    }

    public function update( Request $request )
    {
        $request->validate([
            "id" => "required",
            "nom" => "required",
            "prenom" => "required",
            "im" => "required",
            "cin" => "required",
            "email" => "required|email",
            "adresse" => "required",
            "contact" => "required",
            "code_id" => "required|integer",
            "grade_id" => "required|integer"
        ],
        [
            "nom.required" => "Veuillez bien remplir le nom" ,
            "prenom.required" => "Veuillez bien remplir le prenom" ,
            "im.required" => "Veuillez bien remplir l' IM" ,
            "cin.required" => "Veuillez bien remplir le CIN" ,
            "email.required" => "Veuillez bien remplir l' e-mail" ,
            "email.email" => "Veuillez bien remplir l' e-mail" ,
            "adresse.required" => "Veuillez bien remplir l' adresse" ,
            "contact.required" => "Veuillez bien remplir le contact" ,
            "code_id.required" => "Veuillez bien remplir le code" ,
            "code_id.integer" => "Veuillez bien remplir le code" ,
            "grade_id.required" => "Veuillez bien remplir le garde" ,
            "grade_id.integer" => "Veuillez bien remplir le garde"
        ]);

        $enseignant = Enseignant::find( $request->id );
        $enseignant->update( $request->all() );

        return back()->with("success" , "Enseignant(e) ENS".$request->id." modifié(e) avec succès !!!");
    }
}
