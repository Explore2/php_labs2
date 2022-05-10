<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;


    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $table = 'article';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'alpha_numeric_code',
        'content',
        'author'
    ];

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}
