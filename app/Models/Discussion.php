<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use   App\Models\User;
use   App\Models\reply;
class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'channel_id',
        'reply_id',
        'user_id',
        'slug',
    ];

    public function user() {
        return  $this->belongsTo(User::class);
      }
      public function BestReply() {
        return  $this->belongsTo(reply::class , 'reply_id');
      } 
      public function getRouteKeyName() {
        return 'slug';
      }
      public function replies() {
        return  $this->hasMany(Reply::class);
      }
      public function MarkAsBestReply(Reply $reply) {
        $this->update([
          'reply_id' => $reply->id,
        ]);

        if($reply->owner->id == $this->user->id) {
          return;
        }
      }

      public function scopeFilterByChannel($builder){
       if(request()->query('channel')) {
          $channel = Channel::where('slug',request()->query('channel'))->first();
          if ($channel) {
            return $builder->where('channel_id',$channel->id);
          }
          return $builder;
       }
       return $builder;
      }
}
