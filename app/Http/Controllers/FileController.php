<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeFolderRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class FileController extends Controller
{
  public function index()
  {
    $folder = $this->getRoot();
    $files = File::query()->where('parent_id', $folder->id)
      ->where('created_by', Auth::user()->id)
      ->orderBy('is_folder', 'desc')
      ->orderBy('created_at', 'desc')
      ->paginate(10);
    $files = FileResource::collection($files);
    return Inertia::render('Admin/Files/Index', [
      'files' => $files,
      'folder' => $folder
    ]);
  }

  public function createFolder(storeFolderRequest $request): void
  {

    $data = $request->validated();
    $parent = $request->parent;

    if (!$parent) {
      $parent = $this->getRoot();
    }

    $file = new File();
    $file->is_folder = 1;
    $file->name = $data['name'];

    $parent->appendNode($file);
  }

  private function getRoot()
  {
    return File::query()->whereIsRoot()->where('created_by', Auth::user()->id)->firstOrFail();
  }

}
