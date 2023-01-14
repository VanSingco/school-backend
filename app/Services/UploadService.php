<?php

namespace App\Services;

use Illuminate\Validation\ValidationException;

class UploadService {

    public function upload($file, $folder)
    {
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs($folder, $fileName, 'upload');
        
        return '/upload/'.$filePath;
    }

}