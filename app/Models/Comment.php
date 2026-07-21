<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Comment extends Model
{

  use HasFactory;
  protected $fillable = ['message', 'post_id', 'user_id'];
  protected $table = "comments";


  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function getDataAsCarbonAttribute()
  {
     return Carbon::parse($this->created_at);
  }

  
}
