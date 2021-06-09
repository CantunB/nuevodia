<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmationResult extends Model
{
    protected $table = 'confirmation_results';
    protected $fillable = [
        'mobilizer_id',
        'tocado_id',
        'confirmation_status',
    ];

    public function getInfo()
    {
        return $this->belongsTo(Sympathizer::class,'mobilizer_id');
    }
    public function getTocado()
    {
        return $this->belongsTo(Sympathizer::class,'tocado_id');
    }

    public function scopeConfirmed($query){
        return $query->where('confirmation_status','1');
    }

}
