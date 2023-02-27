<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use App\Models\Producer;
use App\Models\Product;
use App\Services\UploadImage;
use Illuminate\Http\Request;
use DB;
use Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected $productRepository;
    private $uploadImage;

    public function __construct(ProductRepositoryInterface $productRepository, UploadImage $uploadImage)
    {
        $this->productRepository = $productRepository;
        $this->uploadImage = $uploadImage;
    }

    public function index()
    {
        $listProduct = $this->productRepository->getAllProduct();
        $total_trash = $this->productRepository->totalTrash();
        return view('admin.product.index', compact('listProduct', 'total_trash'));
    }

    public function create()
    {
        $listCategory = Category::query()->get()->toArray();
        $listProducer = Producer::query()->get()->toArray();
        return view('admin.product.create_update', compact('listCategory', 'listProducer'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only([
                'name',
                'category_id',
                'sortDesc',
                'detail',
                'producer_id',
                'number',
                'sale',
                'price',
                'price_sale',
                'status',
            ]);
            $data['created_by'] = Auth::guard('users')->user()->id;
            $data['alias'] = Str::slug($data['name']);
            $data['avatar'] = $this->uploadImage->handleUploadedImage($request->file('img'));
            $data['img'] = $this->fileUpload($request->file('image_list'));
            $this->productRepository->createProduct($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error'.$e->getMessage());
            return redirect()->back()->with('message', 'Error');
        }

        return redirect()->back()->with('message', 'Thêm mới nhà cung cấp thành công');
    }

    public function show($id)
    {
        $data = $this->productRepository->getProductById($id)->toArray();
        return view('admin.producer.create_update', compact('id', 'data'));
    }

    public function update($id, StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $updateProduct = $request->only(['name', 'code', 'keyword', 'status']);
            $updateProduct['updated_by'] = Auth::guard('users')->user()->id;
            $this->productRepository->updateProduct($id, $updateProduct);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'ddd');
        }

        return redirect()->route('admin.product.index');
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $this->productRepository->deleteProduct($id);
            DB::commit();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (Exception $e) {
            DB::rollback();
            Log::error('Error delete slider'.$e->getMessage());
            return redirect()->back()->with('error', 'Xóa thành thất bại');
        }
    }

    public function recyclebin()
    {
        $recyclebin = Product::onlyTrashed()->paginate(8);
        return view('admin.producer.recyclebin', compact('recyclebin'));
    }

    public function restore($id)
    {
        try {
            $this->productRepository->restoreProductById($id);
            return redirect()->back()->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Khôi phục thất bại');
        }
    }

    public function foreverDelete($id)
    {
        try {
            $this->productRepository->foreverDeleteProductById($id);
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
    }

    private function fileUpload($files)
    {
        $file_name = '';
        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/product/', $name);
            $file_name .= $name.'#';
        }
        return $file_name;
    }
}
