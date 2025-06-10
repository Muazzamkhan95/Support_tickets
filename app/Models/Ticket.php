<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'tracking_id',
        'name',
        'email',
        'ticket_type',
        'message',
        'status',
        'note'
    ];


}
