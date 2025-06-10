<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'created_by',
        'actividad',
        'cargo',
        'vinculo',
        'domicilio',
        'localidad',
        'telefono',
        'cuit',
        'estado',
    ];
    // Relationship to get the user who CREATED this user
    public function creator(): BelongsTo
    {
        // This links the 'created_by' column to the 'id' of another User model
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship to get all users CREATED BY this user
    public function createdUsers(): HasMany
    {
        return $this->hasMany(User::class, 'created_by');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Ensures password is automatically hashed when set
        ];
    }

    // Relationship: A user belongs to one role
    public function role(): BelongsTo
    {
        // Eager load the role by default to avoid N+1 issues in checks
        return $this->belongsTo(Role::class)->withDefault([
            'name' => 'User', // Provide default if role_id is null
            'slug' => Role::ROLE_USER,
        ]);
    }

    // Helper methods for role checks
    public function hasRole(string $roleSlug): bool
    {
        // Ensure role relationship is loaded before accessing slug
        return $this->role?->slug === $roleSlug;
    }

    public function isAdmin():bool
    {
        return $this->hasRole(Role::ROLE_ADMIN);
    }

    public function isMaster() : bool
    {
        return $this->hasRole(Role::ROLE_MASTER);
    }

    // Check if user is Admin OR Master
    public function isAdminOrHigher() : bool
    {
        return $this->isAdmin() || $this->isMaster();
    }
    //Check if user is specifically Master
    public function isMasterOnly() : bool
    {
        return $this->isMaster();
    }
}
