<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Str;
use DB;
use Log;

class SilderController extends Controller
{
    public function index() {
        $sliders = Slider::query()->get();
        return view('slider.index', compact('sliders'));
    }

    public function create(Request $request) {
        return view('slider.create_update');
    }
   
    public function store(Request $request) {
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
        }
        catch(\Exception $e){
            dd($e->getMessage());
            DB::rollback();
            Log::error('Error upload database'. $e->getMessage());
        }
    }

    public function show(Request $request, $id)
    {
        
    }
   
}
