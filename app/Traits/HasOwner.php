<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasOwner {

    protected static function bootHasOwner()
    {
        static::creating(function ($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id;
        });
    }
}
