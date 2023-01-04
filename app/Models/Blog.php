<?php

namespace App\Models;

use App\Events\BlogCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'message',
    ];
    
    protected $dispatchesEvents = [
        'created' => BlogCreated::class,
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}
