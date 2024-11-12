<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    // protected $dates = ['send_date'];
    protected $casts = ['send_date' => 'date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
