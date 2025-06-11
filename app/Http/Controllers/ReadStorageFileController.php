<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReadStorageFileController extends Controller
{
  
    public function readStorageFile($file_path, $file_name)
    {
        // รวม path และ filename เข้าด้วยกัน
        $fullPath = "{$file_path}/{$file_name}";
        
        // ตรวจสอบว่าไฟล์มีอยู่จริงใน storage หรือไม่
        if (Storage::disk('public')->exists($fullPath)) {
            // ดึง mime type ของไฟล์
            $mimeType = Storage::disk('public')->mimeType($fullPath);
            
            // ส่งไฟล์กลับไปพร้อม headers ที่เหมาะสม
            return response()->file(
                Storage::disk('public')->path($fullPath),
                ['Content-Type' => $mimeType]
            );
        }
        
        return response()->json(['message' => 'File not found'], 404);
    }
}
