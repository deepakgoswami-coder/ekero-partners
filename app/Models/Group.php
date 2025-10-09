<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'leader_id',
        'contribution_amount',
        'frequency',
        'start_date',
        'total_members',
        'total_cycles',
        'status'
    ];
    public function leader(){
        return $this->belongsTo(User::class,'leader_id');
    }
}
