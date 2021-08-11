<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.15
 */

namespace App\Interfaces;


interface ProductPhotoInterface
{
    public function create($params);
    public function getList($product_id);
}
