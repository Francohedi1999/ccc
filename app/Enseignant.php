<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $fillable = [ "nom" , "prenom" , "im" , "cin" , "email" , "adresse" , "contact" , "code_id" , "grade_id" ];

    public function code()
    {
        return $this->belongsTo(Code::class , 'code_id' );
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class , 'grade_id' );
    }
}
