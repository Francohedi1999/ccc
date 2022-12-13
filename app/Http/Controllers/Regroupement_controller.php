<?php

namespace App\Http\Controllers;

use App\Ec_ens;
use App\Liste_ecs;
use App\Liste_reg;
use App\Niveau;
use App\Semestre;
use App\Parcours;
use App\Regroupement;
use App\Regs_valide;
use App\Salle;
use Illuminate\Http\Request;

class Regroupement_controller extends Controller
{
    public function index( Request $request )
    {
        $title = "Liste des regroupements validés";
        $regroupements =  Regs_valide::where( 'nom', 'like', '%'.$request->recherche.'%' )
                                        ->orWhere( 'prenom', 'like', '%'.$request->recherche.'%' )
                                        ->paginate(5);

        return view('regroupement/liste' , compact( 'title' , 'regroupements' ));
    }

    public function validation( Request $request )
    {
        $title = "Validation regroupement";
        if( $request->date_reg != "" || $request->date_reg != null )
        {
            $regroupements = Liste_reg::where( 'valide' , '=' , 0 )
                                    ->whereDate( 'date_reg', '=', $request->date_reg )->get();
        }
        else
        {
            $regroupements = Liste_reg::where( 'valide' , '=' , 0 )->get();
        }       

        return view('regroupement/validation_regroupement' , compact( 'title' , 'regroupements' ));
    }

    public function validate_regroupement(Request $request )
    {
        $regroupement = new Regroupement();
        $regroupement->where('id', $request->id)->update(['valide' => 1 ]);
        return back()->with("success" , "Regroupement REG".$request->id." validé avec succès !!!");
    }

    public function create()
    {
        $title = "Ajout nouveau regroupement";

        $niveaux = Niveau::all();
        $salles = Salle::all();
        $semestres = Semestre::all();
        $parcours = Parcours::where('p_' , '=' , '1')->select('*')->get();
        $ec_ens = Liste_ecs::all();
        // $ecs_ens =  Liste_ecs::where( 'nom' , 'like' , '%'.$request->recherche.'%' )
        //                     ->orWhere( 'prenom', 'like', '%'.$request->recherche.'%' )
        //                     ->orWhere( 'ec', 'like', '%'.$request->recherche.'%' )
        //                     ->orWhere( 'niv', 'like', '%'.$request->recherche.'%' )
        //                     ->orWhere( 'sem', 'like', '%'.$request->recherche.'%' )
        //                     ->orWhere( 'p', 'like', '%'.$request->recherche.'%' )
        //                     ->orderBy('id' , 'asc')
        //                     ->paginate(5);

        return view('regroupement/ajout' , compact( 'title' , 'niveaux' , 'salles' , 'semestres' , 'parcours' , 'ec_ens' ));
    }

    public function save( Request $request )
    {
        if( $request->salle == null || $request->salle == "" )
        {
            $request->validate([
                "niv_id"=>"required|integer",
                "sem_id"=>"required|integer",
                "date_reg"=>"required|date_format:Y-m-d|after_or_equal:today",
                "h_reg_1"=>"required|date_format:H:i",
                "h_reg_2"=>"required|date_format:H:i|after:h_reg_1",
                "ec_ens_id"=>"required",
                "salle_id"=>"required|integer"
            ],
            [
                "niv_id.required"=>"Veuillez bien remplir le niveau",
                "niv_id.integer"=>"Veuillez bien remplir le niveau",
                "sem_id.required"=>"Veuillez bien remplir le semestre",
                "sem_id.integer"=>"Veuillez bien remplir le semestre",
                "date_reg.required"=>"Veuillez bien remplir la date de regroupement",
                "date_reg.date_format"=>"Veuillez bien remplir la date de regroupement",
                "date_reg.after_or_equal"=>"Veuillez bien remplir la date de regroupement",
                "h_reg_1.required"=>"Veuillez bien remplir l'heure de début",
                "h_reg_1.date_format"=>"Veuillez bien remplir l'heure de début",
                "h_reg_2.required"=>"Veuillez bien remplir l'heure de fin",
                "h_reg_2.date_format"=>"Veuillez bien remplir l'heure de fin",
                "h_reg_2.after"=>"Veuillez bien remplir l'heure de fin",
                "ec_ens_id.required"=>"Veuillez bien remplir l'élément constitutif",
                "salle_id.required"=>"Veuillez bien remplir l'élément constitutif",
                "salle_id.integer"=>"Veuillez bien remplir l'élément constitutif"
            ]);
 
            $ec_ens = explode( "|" , $request->ec_ens_id );
            $ec_ens_id = $ec_ens[0];
            $ens_id = $ec_ens[1];

            if( $request->p_id == null || $request->p_id == "" )
            {
                $parcours = Parcours::where( 'sem_id' , '=' , $request->sem_id )->select('*')->first();
                Regroupement::create([
                    "niv_id" => $request->niv_id,
                    "sem_id" => $request->sem_id,
                    "p_id" => $parcours->id,
                    "date" => $request->date_reg,
                    "h_reg_1" => $request->h_reg_1,
                    "h_reg_2" => $request->h_reg_2,
                    "ec_ens_id"=> $ec_ens_id,
                    "ens_id" => $ens_id,
                    "salle_id"=> $request->salle_id
                ]);
            }
            else
            {
                Regroupement::create([
                    "niv_id" => $request->niv_id,
                    "sem_id" => $request->sem_id,
                    "p_id" => $request->p_id,
                    "date" => $request->date_reg,
                    "h_reg_1" => $request->h_reg_1,
                    "h_reg_2" => $request->h_reg_2,
                    "ec_ens_id"=> $ec_ens_id,
                    "ens_id"=> $ens_id,
                    "salle_id"=> $request->salle_id
                ]);
            }
        }
        else
        {
            $request->validate([
                "niv_id"=>"required|integer",
                "sem_id"=>"required|integer",
                "date_reg"=>"required|date_format:Y-m-d|after_or_equal:today",
                "h_reg_1"=>"required|date_format:H:i",
                "h_reg_2"=>"required|date_format:H:i|after:h_reg_1",
                "ec_ens_id"=>"required",
                "salle"=>"required"
            ],
            [
                "niv_id.required"=>"Veuillez bien remplir le niveau",
                "niv_id.integer"=>"Veuillez bien remplir le niveau",
                "sem_id.required"=>"Veuillez bien remplir le semestre",
                "sem_id.integer"=>"Veuillez bien remplir le semestre",
                "date_reg.required"=>"Veuillez bien remplir la date de regroupement",
                "date_reg.date_format"=>"Veuillez bien remplir le date de regroupement",
                "date_reg.after_or_equal"=>"Veuillez bien remplir le date de regroupement",
                "h_reg_1.required"=>"Veuillez bien remplir l'heure de début",
                "h_reg_1.date_format"=>"Veuillez bien remplir l'heure de début",
                "h_reg_2.required"=>"Veuillez bien remplir l'heure de fin",
                "h_reg_2.date_format"=>"Veuillez bien remplir l'heure de fin",
                "h_reg_2.after"=>"Veuillez bien remplir l'heure de fin",
                "ec_ens_id.required"=>"Veuillez bien remplir l'élément constitutif",
                "salle.required"=>"Veuillez bien remplir l'élément constitutif"
            ]);

            $ec_ens = explode( "|" , $request->ec_ens_id );
            $ec_ens_id = $ec_ens[0];
            $ens_id = $ec_ens[1];

            $salle = new Salle();
            $salle_id = $salle->insert( $request->salle );

            if( $request->p_id == null || $request->p_id == "" )
            {
                $parcours = Parcours::where( 'sem_id' , '=' , $request->sem_id )->select('*')->first();
                Regroupement::create([
                    "niv_id" => $request->niv_id,
                    "sem_id" => $request->sem_id,
                    "p_id" => $parcours->id,
                    "date" => $request->date_reg,
                    "h_reg_1" => $request->h_reg_1,
                    "h_reg_2" => $request->h_reg_2,
                    "ec_ens_id"=> $ec_ens_id,
                    "ens_id"=> $ens_id,
                    "salle_id"=> $salle_id
                ]);
            }
            else
            {
                Regroupement::create([
                    "niv_id" => $request->niv_id,
                    "sem_id" => $request->sem_id,
                    "p_id" => $request->id,
                    "date" => $request->date_reg,
                    "h_reg_1" => $request->h_reg_1,
                    "h_reg_2" => $request->h_reg_2,
                    "ec_ens_id"=> $ec_ens_id,
                    "ens_id"=> $ens_id,
                    "salle_id"=> $request->id_salle
                ]);
            }
        }
        return back()->with("success" , "Regroupement enregistré avec succès !!!");
    }
}
