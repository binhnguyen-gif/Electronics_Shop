<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class UploadImage {

	public function handleUploadedImage($file)
	{
		if (!is_null($file)) {
            $fileName = time(). '_' . $file->getClientOriginalName();
            $folderImg = 'upload';
            Storage::disk('public')->putFileAs($folderImg, $file, $fileName);
            return $fileName;
        }

        return '';
	}
}
