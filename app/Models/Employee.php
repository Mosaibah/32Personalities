<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['name','email','salary'];



    public function allowances(){
        return $this->belongsToMany(Allowance::class, "employee_allowances");
    }
}
