<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname',
        'name',
        'patronymic',
    ];

    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class, 'user_id');
    }
}
