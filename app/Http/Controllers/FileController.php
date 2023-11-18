<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeFolderRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FileController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Files/Index');
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
