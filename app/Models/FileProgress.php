<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileProgress extends Model
{
    use HasFactory;
    protected $table = 'file_progress';
    protected $fillable = ['progress'];
    public $timestamps = false;

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class, 'id');
    }
}
