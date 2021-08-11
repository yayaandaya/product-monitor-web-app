<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.51
 */

namespace Tests\Unit\Http\Controllers\Crawler;


use App\Http\Controllers\Crawler\FabelioController;
use Tests\TestCase;

class FabelioTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetContent()
    {
        $crawler = new FabelioController();
        $response = $crawler->getContent("https://fabelio.com/ip/meja-kantor-xaverius-fbf");
        $this->assertSame(gettype($response), 'string');
    }

    public function testGetNameSuccess()
    {
        $content = file('tests/Assets/Crawler/FabelioContent.html');
        $crawler = new FabelioController();
        $response = $crawler->getName(implode('', $content));
        $this->assertSame($response, 'Meja Kantor Xaverius');
    }

    public function testGetNameFailed()
    {
        $crawler = new FabelioController();
        $response = $crawler->getName('false content');
        $this->assertSame($response, false);
    }

    public function testGetDescriptionSuccess()
    {
        $content = file('tests/Assets/Crawler/FabelioContent.html');
        $crawler = new FabelioController();
        $response = $crawler->getDescription(implode('', $content));
        $this->assertSame($response, 'Meja Kerja Xaverius yang keren ini bisa menjadi teman kerjamu sehari-hari. Kaki-kakinya yang kokoh tentu dapat menopang semua barangmu. Dengan tinggi 75 cm, kamu dapat melakukan berbagai aktivitasmu dengan nyaman. Pastinya dengan design yang ergonomis dan stylish, sudah bisa dipastikan produktivitas kamu dapat meningkat dengan tajam. Dilengkapi dengan tempat saluran kabel, tentu akan menjadi lebih rapi dibandingkan dengan sebelumnya. Jangan lupa letakkan Meja Kerja Xaverius ini di ruang kerjamu dan pasangkan dengan kursi kerja agar lebih mantappp. Buruan, tunggu apalagi? Segera hiasi ruanganmu dengan Meja Kerja Xaverius!');
    }

    public function testGetDescriptionFailed()
    {
        $crawler = new FabelioController();
        $response = $crawler->getDescription('');
        $this->assertSame($response, '');
    }

    public function testGetPhotoSuccess()
    {
        $content = file('tests/Assets/Crawler/FabelioContent.html');
        $crawler = new FabelioController();
        $response = $crawler->getPhoto(implode('', $content));
        $this->assertSame($response[0], 'https://cdn-m2.fabelio.com/catalog/product/k/u/kumi_ed_back.jpg?auto=format');

    }

    public function testGetPhotoFailed()
    {
        $crawler = new FabelioController();
        $response = $crawler->getPhoto('false content');
        $this->assertSame($response, []);
    }

    public function testGetCurrentPriceSuccess()
    {
        $content = file('tests/Assets/Crawler/FabelioContent.html');
        $crawler = new FabelioController();
        $response = $crawler->getCurrentPrice(implode('', $content));
        $this->assertSame(gettype($response), 'double');
    }

    public function testGetCurrentPriceFailed()
    {
        $crawler = new FabelioController();
        $response = $crawler->getDescription('');
        $this->assertSame($response, '');
    }
}
