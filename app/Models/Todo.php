<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todos';
    protected $fillable = ['title', 'description', 'add_by', 'date', 'start_time', 'end_time'];


    public  function add_by(){

        return   $this->belongsTo('App\Models\User','add_by','id');   
    }
}
