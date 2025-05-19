<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_path',
        'description',
    ];


    /**
     * Suma la reputación de todos los usuarios que han dado like a esta imagen.
     */
    protected function likesReputation(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->likes()
                ->join('users', 'likes.user_id', '=', 'users.id')
                ->sum('users.reputation')
        );
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likers()
    {
        return $this->hasManyThrough(
            User::class,   // Modelo final al que queremos llegar
            Like::class,   // Modelo intermedio que une users e images
            'image_id',    // Clave foránea en la tabla likes que apunta a images.id
            'id',          // Clave primaria en users (va a matches con likes.user_id)
            'id',          // Clave primaria en images (local key)
            'user_id'      // Clave foránea en likes que apunta a users.id
        );
    }
}
