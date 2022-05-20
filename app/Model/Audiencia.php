<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Audiencia extends Model
{
 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'notificar','documentos','fecha','hora','senalamiento' ,'localidad','idexpediente','idcliente','demandado'
    ];



    public function expediente()
    {

        return $this->belongsTo('App\Model\Expediente','idexpediente','id');
    }

    public function cliente()
    {

        return $this->belongsTo('App\Model\Cliente','idcliente','id');
    }

}
