<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate code in the format "CC-001"
            $lastRecord = static::latest('id')->first();
            $nextId = $lastRecord ? $lastRecord->id + 1 : 1;
            $model->code = 'CC-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        });
    }
}
