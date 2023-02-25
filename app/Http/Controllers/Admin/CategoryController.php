<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use League\Flysystem\Exception;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    //
    public function index()
    {
        $listCategory = $this->categoryRepository->getAllCategory();
//        dd($listCategory->toArray());
        return view('admin.category.index', compact('listCategory'));
    }

    public function create()
    {
        $listCategory = $this->categoryRepository->getAllCategory();
        return view('admin.category.create_update', compact('listCategory'));
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only(['name', 'parent_id', 'orders', 'status']);
            $data['slug'] = Str::slug($data['name']);
            $data['created_by'] = Auth::guard('users')->user()->id;
            if ($data['parent_id'] == 0){
                $data['level'] = 1;
            }else{
                $detail = $this->categoryRepository->getCategoryById($data['parent_id']);
                $data['level'] = $detail['level'] + 1;
            }
            $this->categoryRepository->createCategory($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd('Error');
            return redirect()->back()->with('message', 'Error');
        }

        return redirect()->back()->with('message', 'Thêm mới danh mục thành công');
    }

    public function show($id)
    {
        $listCategory = $this->categoryRepository->getAllCategory();
        $data = $this->categoryRepository->getCategoryById($id)->toArray();
        return view('admin.category.create_update', compact('id','data','listCategory'));
    }

    public function update($id, StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $updateCategory = $request->only(['name', 'parent_id', 'orders', 'status']);
            $updateCategory['slug'] = Str::slug($updateCategory['name']);
            $updateCategory['updated_by'] = Auth::guard('users')->user()->id;
            if ($updateCategory['parent_id'] == 0){
                $updateCategory['level'] = 1;
            }else{
                $detail = $this->categoryRepository->getCategoryById($updateCategory['parent_id']);
                $updateCategory['level'] = $detail['level'] + 1;
            }
            $this->categoryRepository->updateCategory($id, $updateCategory);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', 'ddd');
        }

        return redirect()->route('admin.category.index');
    }

    public function recyclebin()
    {
    }
}
