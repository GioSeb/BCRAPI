<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use app\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
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
    ];

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

        public function isAdmin(): bool
        {
            return $this->hasRole(Role::ROLE_ADMIN);
        }

        public function isMaster(): bool
        {
            return $this->hasRole(Role::ROLE_MASTER);
        }

        // Check if user is Admin OR Master
        public function isAdminOrHigher(): bool
        {
            return $this->isAdmin() || $this->isMaster();
        }
         // Check if user is specifically Master (stricter than isAdminOrHigher)
         public function isMasterOnly(): bool // Or just use isMaster() depending on context
         {
             return $this->isMaster();
         }
}
