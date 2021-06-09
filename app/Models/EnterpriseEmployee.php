<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnterpriseEmployee extends Model
{
    protected $table = 'enterprise_employee';

    /**
     * Get the user that owns the EnterpriseEmployee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getEnterprise()
    {
        return $this->belongsTo(Enterprise::class, 'enterprise_id');
    }

    public function getEmployee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
