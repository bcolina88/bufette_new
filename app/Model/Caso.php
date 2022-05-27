<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'proceso', 'descripcion','idexpediente','documentos','idabogado','idcliente',
       'tarifa','posicion_cliente','tipo_pago','tipo_proceso','estado','fecha'
    ];



    public function expediente()
    {

        return $this->belongsTo('App\Model\Expediente','idexpediente','id');
    }

    public function abogado()
    {

        return $this->belongsTo('App\Model\User','idabogado','id');
    }


    public function cliente()
    {

        return $this->belongsTo('App\Model\Cliente','idcliente','id');
    }

}
