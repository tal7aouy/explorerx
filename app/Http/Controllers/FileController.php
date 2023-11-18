<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeFolderRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FileController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Files/Index');
    }

    public function createFolder(storeFolderRequest $request)
    {
        $data = $request->validated();
        $parent = $request->parent;
        if (!$parent){
            $parent = $this->getRoot();
        }
    }

}
