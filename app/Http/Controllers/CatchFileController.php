<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatchFileController extends Controller
{
    public function handleFile($directory, $action, $file)
    {
        $file = basename($file);
        $path = storage_path("app/public/{$directory}/" . $file);

        if (file_exists($path)) {
            $content = file_get_contents($path);

            if ($action === 'download') {
                return response()->download($path);
            } elseif ($action === 'view') {
                return response($content)->header('Content-Type', 'application/pdf');
            }
        } else {
            abort(404, 'Arquivo não encontrado');
        }
    }
}

