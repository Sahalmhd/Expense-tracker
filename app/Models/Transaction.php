<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'user_id',
        'description',
        'type',
        'destination',
        'amount',
        'date',
    ];

    /**
     * Get the user associated with the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'date' => 'datetime',
    ];
    
}
