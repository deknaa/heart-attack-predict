<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            // Mengambil file gambar dari request
            $image = $request->file('image');
            
            // Membuat nama file unik dengan ekstensi asli file
            $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
            
            // Menyimpan file ke storage (bukan ke public_path)
            // Menggunakan disk 'public' yang akan tersimpan di storage/app/public
            $path = $image->storeAs('uploads', $filename, 'public');
            
            // Membuat URL yang dapat diakses untuk file
            // Pastikan Anda telah menjalankan "php artisan storage:link"
            $url = Storage::url($path);
            
            // Mengembalikan URL gambar untuk digunakan di Quill Editor
            return response()->json([
                'success' => true,
                'url' => $url
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'No Image was provided'
        ], 400);
    }
}
