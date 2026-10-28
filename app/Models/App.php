<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    protected $fillable = ['title','allDeviceImg', 'icon', 'description', 'tagline', 'screenshot', 'module', 'procedure', 'benefit', 'step'];

}
