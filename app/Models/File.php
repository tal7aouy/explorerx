<?php

namespace App\Models;

use App\Traits\HasOwner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class File extends Model
{
    use HasFactory;
    use HasOwner;
    use NodeTrait;
    use SoftDeletes;
    public function isOwnedBy($userId): bool
    {
      return $this->created_by == $userId;
    }

}
