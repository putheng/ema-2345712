<?php

namespace App\Http\Resources;

use App\Http\Resources\Admin\{
    SupplierResource,
    TransferResource,
    StoreResource,
    SaleResource,
};
use App\Http\Resources\Summary\SocietyResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\{
    Product,
    Society,
    Order,
    Supplier,
    Store,
    Transfer,
    Sale
};

class AdminSummaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'society' => $this->society(),
            'store' => $this->store(),
            'supplier' => $this->supplier(),
            'product' => $this->product(),
            'transfer' => $this->transfer(),
            'sales' => $this->sales(),
        ];
    }

    protected function sales()
    {
        $sales = Sale::orderBy('id', 'desc')->take(10)->get();

        $status = ['Finished', 'Processing', 'Completed'];

        return [
            'count' => Order::whereIn('status', $status)->get()->count(),
            'sales' => SaleResource::collection($sales)
        ];
    }

    protected function transfer()
    {
        $stores = Transfer::orderBy('id', 'desc')->take(10)->get();

        return [
            'count' => Transfer::count(),
            'transfer' => TransferResource::collection($stores)
        ];
    }

    protected function store()
    {
        $stores = Store::orderBy('id', 'desc')->take(10)->get();

        return [
            'count' => Store::count(),
            'store' => StoreResource::collection($stores)
        ];
    }

    protected function society()
    {
        $society = Society::orderBy('id', 'desc')->take(10)->get();

        return [
            'count' => Society::count(),
            'society' => SocietyResource::collection($society)
        ];
    }

    protected function supplier()
    {
        $suppliers = Supplier::orderBy('id', 'desc')->take(10)->get();

        return [
            'count' => Supplier::count(),
            'suppliers' => SupplierResource::collection($suppliers)
        ];
    }

    protected function product()
    {
        $products = Product::orderBy('id', 'desc')->take(10)->get();

        return [
            'count' => Product::count(),
            'products' => ProductIndexResource::collection($products)
        ];
    }
}
