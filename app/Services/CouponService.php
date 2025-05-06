<?php
namespace App\Services;

use App\Models\Coupon;

class CouponService
{
    public function getAll()
    {
        return Coupon::latest()->get();
    }

    public function find(int $id): Coupon
    {
        return Coupon::findOrFail($id);
    }

    public function create(array $data): Coupon
    {
        return Coupon::create($data);
    }

    public function update(int $id, array $data): Coupon
    {
        $coupon = $this->find($id);
        $coupon->update($data);
        return $coupon;
    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }
}
