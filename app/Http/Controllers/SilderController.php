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
        $sliders = Slider::query()->paginate(5);
        // $paginator = new Paginator(data_get($sliders, 'items', []),
        // data_get($sliders, 'total', 0),
        // data_get($sliders, 'per_page', '10'),
        // data_get($sliders, 'current_page', $page),
        // ['path' => $route]);
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
            return redirect()->route('slider.index');
        }
        catch(\Exception $e){
            dd($e->getMessage());
            DB::rollback();
            Log::error('Error upload database'. $e->getMessage());
        }
    }

    public function show($id)
    {
        $slider = Slider::where('id', $id)->first();
        return view('slider.create_update', compact('slider', 'id'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $slider = Slider::where('id', $id)->first();
            $slider->name = $request->name;
            $slider->slug = Str::slug($request->name);
            $slider->status = $request->status;
            if ($request->hasFile('img')) {
                $folderImg = 'upload';
                Storage::disk('public')->delete($folderImg . '/' . data_get($slider, 'img'));
                $file = $request->file('img');
                $fileName = uniqid(). '_' . $file->getClientOriginalName();
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

    public function delete($id)
    {
        try {
            $slider = Slider::find($id);
            $slider->delete();
            DB::commit();
            return response()->json(['status' => 200, 'msg' => false, 'data' => []]);
        } 
        catch (Exception $e) {
            DB::rollback();
            Log::error('Error delete slider' . $e->getMessage());
        }
    }

    public function recyclebin()
    {
        $recyclebin = Slider::onlyTrashed()->paginate(5);
        return view('slider.recyclebin', compact('recyclebin'));
    }

    public function restore($id)
    {
        $recyclebin = Slider::withTrashed()->where('id', $id)->restore();
        // return back()->with('success', true);
        return response()->json(['status' => 200, 'msg' => false, 'data' => []]);
    }

    public function foreverDelete($id)
    {
        Slider::withTrashed()->where('id', $id)->forceDelete();
        // return back()->with('success', true);
        return response()->json(['status' => 200, 'msg' => false, 'data' => []]);
    }
   
}
