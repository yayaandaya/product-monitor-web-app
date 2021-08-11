<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.15
 */

namespace App\Interfaces;


interface ProductInterface
{
    public function create($params);
    public function getList();
    public function getPagination($limit);
    public function getById($params);
}
