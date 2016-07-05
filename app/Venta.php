<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $table='venta';
    protected $primaryKey='venta_id';

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeName($query, $name)
    {
        if($name!="")
            { 
                $query->where('apellido','$name');
            }
        
    }   
}