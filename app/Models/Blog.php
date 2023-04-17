<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = ['judul', 'konten', 'thumbnail', 'banner', 'pembuat'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->slug = Str::of($blog->judul . '-' . strtotime(now()))->slug('-');
        });
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function totalComments()
    {
        return $this->comments()->count();
    }
}
