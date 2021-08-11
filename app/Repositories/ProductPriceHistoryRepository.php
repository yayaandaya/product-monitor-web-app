<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.25
 */

namespace App\Repositories;


use App\Interfaces\ProductPriceHistoryInterface;
use App\Models\ProductPriceHistory;

class ProductPriceHistoryRepository implements ProductPriceHistoryInterface
{

    public function create($params)
    {
        $model = new ProductPriceHistory();
        $model->product_id = (int) $params->product_id;
        $model->price = (double) $params->price;

        $model->save();

        return $model;
    }

    public function getList($product_id)
    {
        return ProductPriceHistory::where('product_id', (int) $product_id)
            ->where('is_deleted', false)
            ->paginate(30);
    }

    public function getChart($product_id) {
        return ProductPriceHistory::where('product_id', (int) $product_id)
            ->where('is_deleted', false)
            ->orderBy('created_at', 'ASC')
            ->get();
    }
}
