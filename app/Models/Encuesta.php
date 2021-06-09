<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuestas';
    protected $fillable = [
        'celular',
        'clave_elector',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
        'q8',
        'q9',
        'q10',
        'status_number',
        'user_id',
    ];

    /**
     * Get the user that owns the Encuesta
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
<<<<<<< HEAD
=======
    /**
     * Get the user that owns the Encuesta
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getSympathizers()
    {
        return $this->belongsTo(Sympathizer::class, 'celular', 'celular');
    }
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
}
