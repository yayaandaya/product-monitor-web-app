<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.26
 */

namespace App\Repositories;


use App\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{

    public function create($params)
    {
        $model = new Product();
        $model->name = (string) $params->name;
        $model->description = (string) $params->description;
        $model->link = (string) $params->link;

        $model->save();

        return $model;
    }

    public function updateName($model, $name){

        $model->name = (string)$name;

        $model->save();

        return $model;
    }

    public function updateDescription($model, $description){

        $model->description = (string)$description;

        $model->save();

        return $model;
    }

    public function getList()
    {
        return Product::where('is_deleted', false)
            ->get();
    }

    public function getPagination($limit)
    {
        return Product::where('is_deleted', false)
//            ->paginate($limit ?? 5);
            ->paginate($limit);
    }

    public function getById($id)
    {
        return Product::where('id', (int) $id)
            ->where('is_deleted', false)
            ->first();
    }
}
