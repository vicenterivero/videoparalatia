<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitude extends Model
{
    protected $fillable=['id_solicitud','llave','id_tramite','no_solicitud','fecha_solicitud','hora_solicitud','no_solicitud_api','fecha_solicitud_api','hora_solicitud_api','id_estado'];

}
