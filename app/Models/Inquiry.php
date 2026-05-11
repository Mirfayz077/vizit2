<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'name',
        'phone',
        'business_niche',
        'email',
        'company',
        'preferred_contact',
        'platform',
        'goal',
        'budget_range',
        'project_summary',
        'note',
        'status',
    ];

    public static function statusOptions(): array
    {
        return [
            'new' => 'Yangi',
            'reviewing' => 'Ko\'rilmoqda',
            'contacted' => 'Bog\'lanildi',
            'closed' => 'Yopildi',
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
