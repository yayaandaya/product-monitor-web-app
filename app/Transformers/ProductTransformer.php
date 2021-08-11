<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.32
 */

namespace App\Transformers;


class ProductTransformer
{
    public function transformPagination($data)
    {
        $result = $data->toarray();
        $result['error'] = false;
        $result['draw'] = $result['total'];
        $result['recordsTotal'] = $result['total'];
        $result['recordsFiltered'] = $result['total'];

        return $result;
    }
}
