<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;


class Room extends Model
{
    
    // protected $keyType = 'string'; // UUID adalah string
    // public $incrementing = false; // Non-auto increment

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         if (!$model->id) {
    //             $model->id = (string) Str::uuid();
    //         }
    //     });
    // }

    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['category', 'author']; // Debug n+1 problem (eager load)


    public function scopeFilter($query, array $filters) {

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) { // whereHas() = dimana kaitan dengan relasi
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) =>
                $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }


    // membuat relasi dengan class Category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // membuat relasi dengan class User
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
