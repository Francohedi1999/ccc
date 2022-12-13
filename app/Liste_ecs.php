<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liste_ecs extends Model
{
    protected $fillable = [ "id" ,
                            "vh" ,
                            "credit" ,
                            "p_id" ,
                            "p" ,
                            "sem_id" ,
                            "sem" ,
                            "niv_id" ,
                            "niv" ,
                            "elc_id" ,
                            "ec" ,
                            "ens_id" ,
                            "nom" ,
                            "prenom" ];
}

