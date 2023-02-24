<?php

namespace App\Repositories;
use App\Interfaces\SliderRepositoryInterface;
use App\Models\Slider;
use DB;

class SliderRepository implements SliderRepositoryInterface
{
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $slider = new Slider();
            $slider->name = $request->name;
            $slider->slug = Str::slug($request->name);
            $slider->status = $request->status;
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $fileName = uniqid(). '_' . $file->getClientOriginalName();
                $folderImg = 'upload';
                $uploadImg = Storage::disk('public')->putFileAs($folderImg, $file, $fileName);
                $slider->img = $fileName;
            }
            $slider->save();
            DB::commit();
            return redirect()->route('slider.index');
        }
        catch(\Exception $e){
            dd($e->getMessage());
            DB::rollback();
            Log::error('Error upload database'. $e->getMessage());
        }
    }
}
