<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'category',
        'year',
        'role',
        'timeline',
        'tools',
        'problem_statement',
        'ps_label',
        'prototype_url',
        'code_url',
        'solutions',
        'hero_image',
        'page_images',
        'sort_order',
    ];

    protected $casts = [
        'tools'       => 'array',
        'page_images' => 'array',
    ];

    public static function generateSlug(string $name): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i    = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
