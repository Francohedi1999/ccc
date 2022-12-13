<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regs_valide extends Model
{
    protected $fillable = [ "id" ,
                            "date_reg" ,
                            "h_reg_1" ,
                            "h_reg_2" ,
                            "valide" ,
                            "niv_id" ,
                            "niv" ,
                            "sem_id" ,
                            "sem" ,
                            "p_id" ,
                            "p" ,
                            "ec_ens_id" ,
                            "ec" ,
                            "ens_id" ,
                            "nom" ,
                            "prenom" ,
                            "salle_id" ,
                            "salle" ];
}
