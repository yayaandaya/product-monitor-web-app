<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.30
 */

namespace App\Transformers;


use Illuminate\Support\Carbon;

class ProductPriceHistoryTransformer
{
    public function transformChart($data)
    {
        $result = [];
        foreach ($data as $value) {

            array_push($result, [
                (Carbon::parse($value->created_at)->timestamp),
                (double) $value->price,
            ]);
        }
        return $result;
    }
}
