<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    protected $table = 'enterprises';
    protected $fillable = [
        'name',
        //'email',
        'telephone',
        //'website',
        'address',
        //'rfc',
        'responsable',
        //'description',
        'name_responsable',
        'address_responsable',
        'telephone_responsable',
        'company_file'
    ];

    public function Enterprise_Capturista()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Enterprise_User()
    {
        return $this->belongsToMany(Enterprise::class, 'enterprise_user', 'enterprise_id', 'enterprise_id');
    }

    public function Enterprise_Employee()
    {
        return $this->belongsToMany(Enterprise::class, 'enterprise_employee', 'enterprise_id', 'enterprise_id');
    }
}
