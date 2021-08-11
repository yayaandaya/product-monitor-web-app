<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.37
 */

namespace App\Http\Controllers;


class ProductController extends Controller
{
    private $product;
    private $product_photo;

    public function __construct(ProductInterface $product, ProductPhotoInterface $product_photo)
    {
        $this->product = $product;
        $this->product_photo = $product_photo;
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'link' => 'required'
        ]);

        if ($validator->fails()) {
            return response([
                "error" => true
                ,"message" => implode($validator->errors()->all(), " | ")
            ],'400');
        }

        try{
            DB::beginTransaction();

            $crawler = new CrawlerController;
            $crawling = $crawler->initiate($request->link);

            //GET DATA
            $content = $crawling->getContent($request->link);
            $name = $crawling->getName($content);
            $description = $crawling->getDescription($content);
            $photos = $crawling->getPhoto($content);

            if(empty($name)) {
                DB::rollback();
                return response([
                    "error" => true
                    , "message" => 'Invalid product url'
                ],'400');
            }

            //SET PARAMETER CREATE
            $request->name = $name;
            $request->description = $description;
            $product = $this->product->create($request);

            //CREATE PHOTO OF PRODUCT
            $request_photo = new Request();
            $request_photo->replace([
                "product_id" => $product->id,
//                "photos" => $photos ?? []
                "photos" => $photos
            ]);
            app('App\Http\Controllers\ProductPhotoController')->create($request_photo);

            DB::commit();

            return response([
                "error" => false
                , "data" => $product
            ],'200');

        }
        catch (\Exception $ex) {
            return response([
                "error" => true
                ,"message" => $ex->getMessage()
            ],'500');

        }
    }

    public function getList(Request $request) {

        try{
            $product = $this->product->getPagination($request->limit);
            $transform = (new ProductTransformer())->transformPagination($product);
            return response($transform,'200');

        }
        catch (\Exception $ex) {
            return response([
                "error" => true
                ,"message" => $ex->getMessage()
            ],'500');

        }
    }

    public function get($id) {

        try{
            $product = $this->product->getById($id);
            if($product) {
                return response([
                    "error" => false
                    , "data" => $product
                ],'200');
            }
            else{
                return response([
                    "error" => false
                    , "data" => new \stdClass()
                ],'404');
            }

        }
        catch (\Exception $ex) {
            return response([
                "error" => true
                ,"message" => $ex->getMessage()
            ],'500');

        }
    }
}
