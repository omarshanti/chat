<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    protected $fillable = [
        'user_id',
        'discussion_id',
        'content',
     
    ];
    public function owner() {
        return  $this->belongsTo(User::class,'user_id');
      }
      public function discssion() {
        return  $this->belongsTo(Discussion::class);
      }
}
