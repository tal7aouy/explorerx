<?php

namespace App\Models;

use App\Traits\HasOwner;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;

class File extends Model
{
  use HasFactory;
  use HasOwner;
  use NodeTrait;
  use SoftDeletes;

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'created_by');
  }

  public function parent(): BelongsTo
  {
    return $this->belongsTo(File::class, 'parent_id');
  }

  public function isRoot()
  {
    return $this->parent_id == null;
  }

  public function owner():Attribute
  {
    return  Attribute::make(
      get: fn(mixed $value, array $attributes) => $attributes['created_by'] == Auth::id() ? 'me' : $this->user->name
    );
  }

  public function isOwnedBy($userId): bool
  {
    return $this->created_by == $userId;
  }

  protected static function boot()
  {
    parent::boot();
    static::creating(function ($model) {
      if (!$model->parent)
        return;
      $model->path = (!$model->parent->isRoot() ? $model->parent->path . '/' : '') . Str::slug($model->name);
    });
  }

}
