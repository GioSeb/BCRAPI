<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seguimiento extends Model
{
    use HasFactory;

    protected $table = 'seguimientos';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'cuit',
        'denominacion',
        'situations', // <-- Updated column name
        'last_known_cheques',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'situations' => 'array', // <-- Cast the new column to an array
        'last_known_cheques' => 'array',
    ];

    /**
     * Get the user that owns the seguimiento.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
