<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'notificar','motivo','fecha','cliente_id','encargado_id','caso_id', 'prioridad', 

    ];


    public function cliente()
    {

        return $this->belongsTo('App\Model\Cliente','cliente_id','id');
    }


    public function encargado()
    {

        return $this->belongsTo('App\Model\User','encargado_id','id');
    }

    public function caso()
    {

        return $this->belongsTo('App\Model\Caso','caso_id','id');
    }



}
