<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class IbanValidation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'iban',
        'user_id',
    ];

    /**
     * IbanValidation belongs to User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
