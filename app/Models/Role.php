<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Define constants for easier access in code
    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_MASTER = 'master';

    // Relationship: A role can have many users
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
