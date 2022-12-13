<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class El_c extends Model
{
    protected $fillable = [ "id" , "ec"  ];

    public function insert( $ec )
    {
        $id = El_c::max('id');
        $ec_l = El_c::select('*')->where( 'ec' , '=' , $ec )->first();

        if( count( ( array )$ec_l ) > 0 )
        {
            $id = $ec_l->id;
        }
        else
        {
            if( $id == null || $id == "" )
            {
                $id = 1;
                El_c::create( [ "ec" => $ec ] );
            }
            else
            {
                $id = $id + 1;
                El_c::create([ "id" => $id , "ec" => $ec ]);
            }
        }

        return $id;
    }
}
