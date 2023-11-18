<?php

namespace App\Http\Requests;

use App\Models\File;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class parentBaseIdRequest extends FormRequest
{
  public ?File $parent = null;
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    $this->parent = File::where('id', $this->input('parent_id'))->first();
    if ($this->parent && !$this->parent->isRoot() && $this->parent->isOwnerBy(auth()->user()->id)) {
      return false;
    }
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      Rule::exists(File::class, 'id')
        ->where(function (Builder $query) {
          return $query->where('is_folder', '=', '1')
            ->where('created_by', '=', auth()->user()->id);
        })
    ];
  }
}
