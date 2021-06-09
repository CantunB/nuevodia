<?php

namespace App;

use App\Models\Enterprise;
use App\Models\Leader;
use App\Models\Mobilizer;
use App\Models\Owner;
use App\Models\Simpatizantes;
use App\Models\Sympathizer;
use App\Models\Tocados;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clave_elector','nombre','paterno','materno','celular','email', 'password','estatus',
    ];

    protected $primaryKey = 'id';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  static function count_liders($user_id){
        return Leader::select('user_id')->where('user_id',$user_id)->count();
    }

    public  static function count_mobilizers($user_id){
        return Mobilizer::select('user_id')->where('user_id',$user_id)->count();
    }

    public  static function count_tocados($user_id){
        return Tocados::select('user_id')->where('user_id',$user_id)->count();
        //return Sympathizer::where('clave_elector', 'not like', "%@%")->select('user_id')->where('user_id',$user_id)->count();
    }

    public  static function count_tocados_sc($user_id){
        return Simpatizantes::select('user_id')->where('user_id',$user_id)->count();
    }

    public  static function count_propietarios($user_id){
        return Owner::select('user_id')->where('user_id',$user_id)->count();
    }

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getUserEmpresas()
    {
        return $this->belongsToMany(User::class, 'enterprise_user', 'user_id', 'user_id');
    }

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getUserEmployee()
    {
        return $this->belongsToMany(User::class, 'enterprise_employee', 'user_id', 'user_id');
    }

}
