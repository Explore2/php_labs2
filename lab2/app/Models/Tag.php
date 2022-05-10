<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $primaryKey = 'id';
    protected $table = "tag";
    protected $fillable = [
        'name',
        'alpha_numeric_code'
    ];

    public function Articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
