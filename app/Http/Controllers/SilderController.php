<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Str;
use App\Services\UploadImage;
use DB;
use Log;

class SilderController extends Controller
{
    private $uploadImage;

    public function __construct(UploadImage $uploadImage) {
        $this->uploadImage = $uploadImage;
    }

    public function index() {
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
        return view('slider.index', compact('data', 'paginator', 'total_trash'));
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
            $fileName = $this->uploadImage->handleUploadedImage($request->file('img'));
            $slider->img = $fileName;
            $slider->save();
            DB::commit();
            return redirect()->route('sliders.index');
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
            $fileName = $this->uploadImage->handleUploadedImage($request->file('img'));
            $slider->img = $fileName;
            $slider->save();
            DB::commit();
            return redirect()->route('sliders.index');
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
        $recyclebin = Slider::onlyTrashed()->paginate(8);
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
