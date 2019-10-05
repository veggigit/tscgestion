<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = ['sender_name', 'sender_email', 'to', 'subject', 'title', 'body', 'img', 'link'];
}
