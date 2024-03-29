<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Producer\StoreRequest;
use App\Interfaces\ProducerRepositoryInterface;
use App\Models\Producer;
use DB;
use Illuminate\Support\Facades\Auth;

class ProducerController extends Controller
{
    protected $producerRepository;

    public function __construct(ProducerRepositoryInterface $producerRepository)
    {
        $this->producerRepository = $producerRepository;
    }

    public function index()
    {
        $listProducer = $this->producerRepository->getAllProducer();
        $total_trash = $this->producerRepository->totalTrash();
        return view('admin.producer.index', compact('listProducer', 'total_trash'));
    }

    public function create()
    {
        return view('admin.producer.create_update');
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->only(['name', 'code', 'keyword', 'status']);
            $data['created_by'] = Auth::guard('users')->user()->id;
            $this->producerRepository->createProducer($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('message', 'Error');
        }

        return redirect()->back()->with('message', 'Thêm mới nhà cung cấp thành công');
    }

    public function show($id)
    {
        $data = $this->producerRepository->getProducerById($id)->toArray();
        return view('admin.producer.create_update', compact('id', 'data'));
    }

    public function update($id, StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $updateProducer = $request->only(['name', 'code', 'keyword', 'status']);
            $updateProducer['updated_by'] = Auth::guard('users')->user()->id;
            $this->producerRepository->updateProducer($id, $updateProducer);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'ddd');
        }

        return redirect()->route('admin.producer.index');
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $this->producerRepository->deleteProducer($id);
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
        $recyclebin = Producer::onlyTrashed()->paginate(8);
        return view('admin.producer.recyclebin', compact('recyclebin'));
    }

    public function restore($id)
    {
        try {
            $this->producerRepository->restoreProducerById($id);
            return redirect()->back()->with('success', 'Khôi phục thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Khôi phục thất bại');
        }
    }

    public function foreverDelete($id)
    {
        try {
            $this->producerRepository->foreverDeleteProducerById($id);
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Xóa thất bại');
        }
    }
}
