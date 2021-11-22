<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable = [
        'title',
        'description',
        'owner_id',
        'progress_id',
        'appointment'
    ];
    protected $dates = 'appointment';

    public function fileProgress(): HasOne
    {
        return $this->hasOne(FileProgress::class, 'id', 'progress_id');
    }
}
