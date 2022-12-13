<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regroupement extends Model
{
    protected $fillable = [ "date" , "h_reg_1" , "h_reg_2" , "p_id" , "sem_id" , "niv_id" , "ec_ens_id" , "ens_id" , "salle_id" ];

    public function parcours()
    {
        return $this->belongsTo(Parcours::class , 'p_id' );
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class , 'sem_id' );
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class , 'niv_id' );
    }

    public function ec_ens()
    {
        return $this->belongsTo(Ec_ens::class , 'ec_ens_id' );
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class , 'ens_id');
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class , 'salle_id');
    }

}
