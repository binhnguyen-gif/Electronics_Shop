<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Interfaces\CouponRepositoryInterface;
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

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
    }
}
