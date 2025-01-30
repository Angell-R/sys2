<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordenes extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function empresas(){
        return $this->belongsTo(empresa::class, 'empresas_id');
    }
    public function emptecnicos(){
        return $this->belongsTo(emptecnico::class, 'emptecnicos_id');
    }

    public function revisiones(){
        return $this->hasMany(revisiones::class, 'id');
    }
}
