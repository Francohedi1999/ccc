<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = [ "salle" ];

    public function insert( $salle )
    {
        $id = Salle::max('id');
        $salle_ = Salle::select('*')->where( 'salle' , '=' , $salle )->first();

        if( count( ( array )$salle_ ) > 0 )
        {
            $id = $salle_->id;
        }
        else
        {
            if( $id == null || $id == "" )
            {
                $id = 1;
                Salle::create( [ "salle" => $salle ] );
            }
            else
            {
                $id = $id + 1;
                Salle::create([ "id" => $id , "salle" => $salle ]);
            }
        }

        return $id;
    }
}
