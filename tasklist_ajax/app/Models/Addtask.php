<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addtask extends Model
{
    protected $table = 'addtasks';
    use HasFactory;
    protected $fillable = ['task'];
}
