<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public const THEMES = [
        'bronze',
        'graphite',
        'obsidian',
        'champagne',
        'blush',
        'amber',
        'violet',
    ];

    public const LAYOUTS = [
        'phone-left',
        'centered',
        'wide',
    ];

    protected $fillable = [
        'title',
        'slug',
        'label',
        'client_niche',
        'description',
        'before_state',
        'work_done',
        'result',
        'platform',
        'image',
        'theme',
        'layout',
        'row',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'row' => 'integer',
            'sort_order' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
