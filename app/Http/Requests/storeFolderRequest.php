<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class storeFolderRequest extends parentBaseIdRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge(parent::rules(),[
          'name'=> 'required',
          Rule::unique(File::class,'name')
            ->where('created_by', Auth::user()->id)
            ->where('parent_id',  $this->parent_id)
          ->whereNull('deleted_at')
        ]);
    }

  public function messages()
  {
    return [
      'name.unique'=> "Folder ':input' already exist"
    ];
  }
}
