<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['designation', 'slug', 'reference', 'description', 'prix', 'stock', 'actif'])]
class Article extends Model
{
    /** @use HasFactory<ArticleFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'prix' => 'decimal:3',
            'actif' => 'boolean',
        ];
    }
}
