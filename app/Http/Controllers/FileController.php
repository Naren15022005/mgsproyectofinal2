<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        // Obtener todos los archivos en un directorio
        $files = \Illuminate\Support\Facades\File::allFiles(public_path('some_directory'));

        // Hacer algo con los archivos
        foreach ($files as $file) {
            // Procesar cada archivo
        }

        return view('files.index', compact('files'));
    }

    public function upload(Request $request)
    {
        // Subir un archivo
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(public_path('uploads'), $file->getClientOriginalName());
        }

        return redirect()->back()->with('success', 'Archivo subido correctamente.');
    }
}
