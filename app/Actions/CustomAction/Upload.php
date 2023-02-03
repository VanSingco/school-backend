<?php

namespace App\Actions\CustomAction;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Str;

class Upload
{
    use AsAction;

    public function handle($file, $folder)
    {
        $fileName = Str::random(30).'___'.$file->getClientOriginalName();
        $filePath = $file->storeAs($folder, $fileName, 'upload');
        
        return '/upload/'.$filePath;
    }
}
