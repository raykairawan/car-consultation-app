<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;
    protected $fillable = ['factor', 'code'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate code in the format "FC-001"
            $lastRecord = static::latest('id')->first();
            $nextId = $lastRecord ? $lastRecord->id + 1 : 1;
            $model->code = 'FC-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        });

        static::created(function ($model) {
            Question::create([
                'name' => 'Apakah anda yakin ' . $model->factor . ' ?'
            ]);
        });
    }
}
