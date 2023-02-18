<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Exception;
use App\Models\Slider;
use App\Services\UploadImage;
use DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Str;
use Log;

class SilderController extends Controller
{
    private $uploadImage;

    public function __construct(UploadImage $uploadImage)
    {
        $this->uploadImage = $uploadImage;
    }

    public function index()
    {
        $response = Slider::query()->paginate(8);
        $total_trash = Slider::onlyTrashed()->count();
        $response = json_encode($response);
        $response = json_decode($response);

        $route = route('sliders.index');
        $data = data_get($response, 'data', []);
        $paginator = new Paginator(
            $response->data,
            $response->total,
            $response->per_page,
            // $page,
            $response->current_page,
            ['path' => $route]);
        return view('admin.slider.index', compact('data', 'paginator', 'total_trash'));
    }

    public function create(Request $request)
    {
        return view('admin.slider.create_update');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $slider = new Slider();
            $slider->name = $request->name;
            $slider->slug = Str::slug($request->name);
            $slider->status = $request->status;
            $fileName = $this->uploadImage->handleUploadedImage($request->file('img'));
            $slider->img = $fileName;
            $slider->save();
            DB::commit();
            return redirect()->route('admin.sliders.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            Log::error('Error upload database'.$e->getMessage());
        }
    }

    public function show($id)
    {
        $slider = Slider::where('id', $id)->first();
        return view('slider.create_update', compact('slider', 'id'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $slider = Slider::where('id', $id)->first();
            $slider->name = $request->name;
            $slider->slug = Str::slug($request->name);
            $slider->status = $request->status;
            $fileName = $this->uploadImage->handleUploadedImage($request->file('img'));
            $slider->img = $fileName;
            $slider->save();
            DB::commit();
            return redirect()->route('admin.sliders.index');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            Log::error('Error upload database'.$e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $slider = Slider::find($id);
            $slider->delete();
            DB::commit();
            return response()->json(['status' => 200, 'msg' => false, 'data' => []]);
        } catch (Exception $e) {
            DB::rollback();
            Log::error('Error delete slider'.$e->getMessage());
        }
    }

    public function recyclebin()
    {
        $recyclebin = Slider::onlyTrashed()->paginate(8);
        return view('admin.slider.recyclebin', compact('recyclebin'));
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
