<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Message extends Model
{
    protected  $fillable = [
        'sender_id',
        'receiver_id',
        'is_bot',
        'message',
        'file_path',
        'file_name',
        'file_type',
        'file_size',
    ];

    // Sender user
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Receiver user
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
     protected $appends = ['file_url'];

    public function getFileUrlAttribute()
    {
        return $this->file_path ? Storage::url($this->file_path) : null;
    }
}
