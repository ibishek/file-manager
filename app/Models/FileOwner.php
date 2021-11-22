<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FileOwner extends Model
{
    use HasFactory;

    protected $table = 'file_owners';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'street_address_one',
        'street_address_two',
        'state',
        'country',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(Files::class, 'owner_id');
    }
}
