<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $table='proveedor';
    protected $fillable = ['ruc_dni'];
    protected $primaryKey='proveedor_id';

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