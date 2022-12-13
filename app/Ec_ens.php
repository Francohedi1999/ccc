<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ec_ens extends Model
{
    protected $fillable = [ "vh" , "credit" , "p_id" , "sem_id" , "niv_id" , "elc_id" , "ens_id"];

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

    public function ec()
    {
        return $this->belongsTo(El_c::class , 'elc_id' );
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class , 'ens_id');
    }
}
