<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class OwnerTocado extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'owner_id',
        'tocado_id',
        'user_id'
        ];

    public function getTocado()
    {
        return $this->belongsTo(Sympathizer::class, 'tocado_id');
    }
    public function getOwner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
