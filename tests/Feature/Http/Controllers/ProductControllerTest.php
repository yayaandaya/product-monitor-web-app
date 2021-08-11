<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.54
 */

namespace Tests\Feature\Http\Controllers;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use RefreshDatabase;

    protected static $setUpHasRunOnce = false;


    public function testCreateSuccess()
    {

        $data = ["link" => "https://fabelio.com/ip/meja-kantor-xaverius-fbf"];

        $response = $this->post('/api/', $data);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' =>[
                'name',
                'description',
                'link',
                'id'
            ]
        ]);

    }

    public function testCreateFail()
    {

        $data = ["link" => "https://google.com"];
        $response = $this->post('/api/', $data);
        $response->assertStatus(500);

    }

    public function getListSuccess()
    {

        $response = $this->get('/api/');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'data' => [
                    '*' =>[
                        'name',
                        'description',
                        'link',
                        'id'
                    ]
                ]
            ]
        ]);

    }

    public function testGetSuccess()
    {
        $response = $this->get('/api/1');
        $response->assertStatus(404);
//        $response->assertJsonStructure([
//            'data' => [
//                'name',
//                'description',
//                'link',
//                'id'
//            ]
//        ]);

    }

    public function testGetFail()
    {

        $response = $this->get('/0');
        $response->assertStatus(404);

    }
}
