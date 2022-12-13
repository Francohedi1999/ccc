<?php

namespace App\Http\Controllers;

use App\Ec_ens;
use App\El_c;
use App\Liste_ecs;
use App\Enseignant;
use App\Niveau;
use App\Parcours;
use App\Semestre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EC_controller extends Controller
{
    public function index( Request $request )
    {
        $title = "Liste des éléments constitutifs";
        $ecs_ens =  Liste_ecs::where( 'nom' , 'like' , '%'.$request->recherche.'%' )
                            ->orWhere( 'prenom', 'like', '%'.$request->recherche.'%' )
                            ->orWhere( 'ec', 'like', '%'.$request->recherche.'%' )
                            ->orWhere( 'niv', 'like', '%'.$request->recherche.'%' )
                            ->orWhere( 'sem', 'like', '%'.$request->recherche.'%' )
                            ->orWhere( 'p', 'like', '%'.$request->recherche.'%' )
                            ->orderBy('id' , 'asc')
                            ->paginate(5);

        return view('ec/liste' , compact('title' , 'ecs_ens'));
    }

    public function create()
    {
        $title = "Ajout élément constitutif";
        $enseignants = Enseignant::all();
        $niveaux = Niveau::all();
        $semestres = Semestre::all();
        $parcours = Parcours::where('p_' , '=' , '1')->select('*')->get();
        $ecs = El_c::all();

        return view('ec/ajout' , compact('title' , 'enseignants' , 'niveaux' , 'semestres' , 'parcours' , 'ecs' ));
    }

    public function save( Request $request )
    {
        if( $request->ec == null || $request->ec == "" )
        {
            $request->validate([
                "elc_id"=>"required|integer",
                "vh"=>"required|integer",
                "sem_id"=>"required|integer",
                "niv_id"=>"required|integer",
                "ens_id"=>"required|integer"
            ],
            [
                "elc_id.required"=>"Veuillez bien remplir l'élément constitutif",
                "elc_id.integer"=>"Veuillez bien remplir l'élément constitutif",
                "vh.required"=>"Veuillez bien remplir le volume horaire",
                "vh.integer"=>"Veuillez bien remplir le volume horaire",
                "sem_id.required"=>"Veuillez bien remplir le semestre",
                "sem_id.integer"=>"Veuillez bien remplir le semestre",
                "niv_id.required"=>"Veuillez bien remplir le niveau",
                "niv_id.integer"=>"Veuillez bien remplir le niveau",
                "ens_id.required"=>"Veuillez bien remplir l'enseignant",
                "ens_id.integer"=>"Veuillez bien remplir l'enseignant"
            ]);

            if( $request->p_id == null || $request->p_id == "" )
            {
                $parcours = Parcours::where( 'sem_id' , '=' , $request->sem_id )->select('*')->first();
                Ec_ens::create([
                    "vh" => $request->vh ,
                    "credit" => round( $request->vh * 0.1 ) ,
                    "sem_id" => $request->sem_id ,
                    "niv_id" => $request->niv_id ,
                    "elc_id" =>  $request->elc_id  ,
                    "ens_id" => $request->ens_id,
                    "p_id" => $parcours->id
                ]);
            }
            else
            {
                Ec_ens::create([
                    "vh" => $request->vh ,
                    "credit" => round( $request->vh * 0.1 ) ,
                    "sem_id" => $request->sem_id ,
                    "niv_id" => $request->niv_id ,
                    "elc_id" =>  $request->elc_id ,
                    "ens_id" => $request->ens_id ,
                    "p_id" => $request->p_id
                ]);
            }
        }
        else
        {
            $request->validate([
                "ec"=>"required",
                "vh"=>"required|integer",
                "sem_id"=>"required|integer",
                "niv_id"=>"required|integer",
                "ens_id"=>"required|integer"
            ],
            [
                "ec.required"=>"Veuillez bien remplir l'élément constitutif",
                "vh.required"=>"Veuillez bien remplir le volume horaire",
                "vh.integer"=>"Veuillez bien remplir le volume horaire",
                "sem_id.required"=>"Veuillez bien remplir le semestre",
                "sem_id.integer"=>"Veuillez bien remplir le semestre",
                "niv_id.required"=>"Veuillez bien remplir le niveau",
                "niv_id.integer"=>"Veuillez bien remplir le niveau",
                "ens_id.required"=>"Veuillez bien remplir l'enseignant",
                "ens_id.integer"=>"Veuillez bien remplir l'enseignant"
            ]);

            $el_c = new El_c();
            $id_el_c = $el_c->insert( $request->ec );

            if( $request->p_id == null || $request->p_id == "" )
            {
                $parcours = Parcours::where( 'sem_id' , '=' , $request->sem_id )->select('*')->first();
                Ec_ens::create([
                    "vh" => $request->vh ,
                    "credit" => round( $request->vh * 0.1 ) ,
                    "sem_id" => $request->sem_id ,
                    "niv_id" => $request->niv_id ,
                    "elc_id" =>  $id_el_c ,
                    "ens_id" => $request->ens_id,
                    "p_id" => $parcours->id
                ]);
            }
            else
            {
                Ec_ens::create([
                    "vh" => $request->vh ,
                    "credit" => round( $request->vh * 0.1 ) ,
                    "sem_id" => $request->sem_id ,
                    "niv_id" => $request->niv_id ,
                    "elc_id" =>  $id_el_c ,
                    "ens_id" => $request->ens_id ,
                    "p_id" => $request->p_id
                ]);
            }
        }

        return back()->with("success" , "Elément constitutif enregistré avec succès !!!");
    }

    public function edit( $id )
    {
        $title = "Modification EC".$id;
        $ec_ens = Ec_ens::find( $id );

        $ecs = El_c::all();
        $enseignants = Enseignant::all();
        $niveaux = Niveau::all();
        $semestres = Semestre::all();
        $parcours = Parcours::where('p_' , '=' , '1')->select('*')->get();

        return view('ec/edit' , compact('title' , 'ec_ens' , 'ecs' , 'enseignants' , 'niveaux' , 'semestres' , 'parcours' ));
    }

    public function update( Request $request )
    {
        $ec_ens = Ec_ens::find( $request->id );

        if( $request->ec == null || $request->ec == "" )
        {
            $request->validate([
                "elc_id"=>"required|integer",
                "vh"=>"required|integer",
                "sem_id"=>"required|integer",
                "niv_id"=>"required|integer",
                "ens_id"=>"required|integer"
            ],
            [
                "elc_id.required"=>"Veuillez bien remplir l'élément constitutif",
                "elc_id.integer"=>"Veuillez bien remplir l'élément constitutif",
                "vh.required"=>"Veuillez bien remplir le volume horaire",
                "vh.integer"=>"Veuillez bien remplir le volume horaire",
                "sem_id.required"=>"Veuillez bien remplir le semestre",
                "sem_id.integer"=>"Veuillez bien remplir le semestre",
                "niv_id.required"=>"Veuillez bien remplir le niveau",
                "niv_id.integer"=>"Veuillez bien remplir le niveau",
                "ens_id.required"=>"Veuillez bien remplir l'enseignant",
                "ens_id.integer"=>"Veuillez bien remplir l'enseignant"
            ]);

            if( $request->p_id == null || $request->p_id == "" )
            {
                $parcours = Parcours::where( 'sem_id' , '=' , $request->sem_id )->select('*')->first();
                $ec_ens->update([
                    "vh" => $request->vh ,
                    "credit" => round( $request->vh * 0.1 ) ,
                    "sem_id" => $request->sem_id ,
                    "niv_id" => $request->niv_id ,
                    "elc_id" =>  $request->elc_id  ,
                    "ens_id" => $request->ens_id,
                    "p_id" => $parcours->id
                ]);
            }
            else
            {
                $ec_ens->update([
                    "vh" => $request->vh ,
                    "credit" => round( $request->vh * 0.1 ) ,
                    "sem_id" => $request->sem_id ,
                    "niv_id" => $request->niv_id ,
                    "elc_id" =>  $request->elc_id ,
                    "ens_id" => $request->ens_id ,
                    "p_id" => $request->p_id
                ]);
            }
        }
        else
        {
            $request->validate([
                "ec"=>"required",
                "vh"=>"required|integer",
                "sem_id"=>"required|integer",
                "niv_id"=>"required|integer",
                "ens_id"=>"required|integer"
            ],
            [
                "ec.required"=>"Veuillez bien remplir l'élément constitutif",
                "vh.required"=>"Veuillez bien remplir le volume horaire",
                "vh.integer"=>"Veuillez bien remplir le volume horaire",
                "sem_id.required"=>"Veuillez bien remplir le semestre",
                "sem_id.integer"=>"Veuillez bien remplir le semestre",
                "niv_id.required"=>"Veuillez bien remplir le niveau",
                "niv_id.integer"=>"Veuillez bien remplir le niveau",
                "ens_id.required"=>"Veuillez bien remplir l'enseignant",
                "ens_id.integer"=>"Veuillez bien remplir l'enseignant"
            ]);
            
            $el_c = new El_c();
            $id_el_c = $el_c->insert( $request->ec );

            if( $request->p_id == null || $request->p_id == "" )
            {
                $parcours = Parcours::where( 'sem_id' , '=' , $request->sem_id )->select('*')->first();
                $ec_ens->update([
                    "vh" => $request->vh ,
                    "credit" => round( $request->vh * 0.1 ) ,
                    "sem_id" => $request->sem_id ,
                    "niv_id" => $request->niv_id ,
                    "elc_id" =>  $id_el_c ,
                    "ens_id" => $request->ens_id,
                    "p_id" => $parcours->id
                ]);
            }
            else
            {
                $ec_ens->update([
                    "vh" => $request->vh ,
                    "credit" => round( $request->vh * 0.1 ) ,
                    "sem_id" => $request->sem_id ,
                    "niv_id" => $request->niv_id ,
                    "elc_id" =>  $id_el_c ,
                    "ens_id" => $request->ens_id ,
                    "p_id" => $request->p_id
                ]);
            }
        }

        return back()->with("success" , "Elément constitutif EC".$request->id." modifié avec succès !!!");
    }
}
