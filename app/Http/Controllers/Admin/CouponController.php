<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Coupon\StoreRequest;
use App\Http\Requests\Coupon\UpdateRequest;
use App\Interfaces\CouponRepositoryInterface;
use App\Models\Discount;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    protected $couponRepo;

    public function __construct(CouponRepositoryInterface $couponRepo)
    {
        $this->couponRepo = $couponRepo;
    }

    public function index()
    {
        $coupons = $this->couponRepo->getAllCoupon();
        return view('admin.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupon.create_update');
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $coupon = $request->validated();
            $coupon['code'] = Str::upper(Str::slug($coupon['code'], ''));
            $this->couponRepo->createCoupon($coupon);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('error transaction create coupon', $e->getMessage());
            return redirect()->back()->with('error', 'Thêm mã coupon thất bại');
        }

        return redirect()->back()->with('success', 'Thêm mã coupon thành công');
    }

    public function show($id) {
        $coupon = $this->couponRepo->getCouponById($id);
        return view('admin.coupon.create_update', compact('id', 'coupon'));
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $coupon = $request->validated();
            $coupon['code'] = Str::upper(Str::slug($coupon['code'], ''));
            $this->couponRepo->updateCoupon($id, $coupon);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('error transaction create coupon', $e->getMessage());
            return redirect()->back()->withErrors('error', 'Edit mã coupon thất bại');
        }

        return redirect()->back()->with('success', 'Edit mã coupon thành công');

    }

    public function delete($id)
    {
        try {
            $coupon = Discount::query()->findOrFail($id);
            $coupon->delete();

            return redirect()->back()->with('success', 'Xóa thành công');
        }catch (\Exception $e){
            return redirect()->back()->withErrors('error', 'Có lỗi xảy');
        }
    }
}
