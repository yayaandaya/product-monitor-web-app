<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.35
 */

namespace App\Http\Controllers\Crawler;


use App\Interfaces\CrawlerInterface;
use Symfony\Component\DomCrawler\Crawler;

class FabelioController implements CrawlerInterface
{

    public function getContent($link)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get($link);
        $response = $request->getBody()->getContents();

        return $response;
    }

    public function getCurrentPrice($content)
    {
        $crawler = new Crawler($content);
        $_this = $this;
        $price = $crawler->filter('div.css-nbm52x')->each(function (Crawler $node, $i) use ($_this) {
            return $this->hasContent($node->filter('#product-final-price')) != false ? $node->filter('#product-final-price')->text() : '';
        });

        $str_price = str_replace('Rp','', $price[0]);
        $num_price = str_replace('.','', $str_price);

        return (double) $num_price;
    }

    public function getName($content)
    {
        $crawler = new Crawler($content);
        $filter = $crawler->filter('#product-name');

        if(count($filter) > 0)
        {
            foreach ($filter as $i => $content)
            {
                return $content->nodeValue;
            }
        }

        return false;
    }

    public function getDescription($content)
    {
        $crawler = new Crawler($content);
        $_this = $this;
        $description = $crawler->filter('div.css-16jty6w')->each(function (Crawler $node, $i) use ($_this) {
            return $this->hasContent($node->filter('div.grid-item.text-16.css-1zmocm')) != false ? $node->filter('div.grid-item.text-16.css-1zmocm')->text() : '';
        });
        return implode(" ", $description);
    }

    public function getPhoto($content)
    {
        $result = [];

        $crawler = new Crawler($content);

        $_this = $this;
        $images = $crawler->filter('div.css-1jzbfwt')->each(function (Crawler $node, $i) use ($_this) {
            return $_this->getNodeContent($node);
        });

        if (count($images) > 0) {
            foreach ($images as $image) {
                if ($image != ''){
                    $img = explode("?", $image);
                    array_push($result, $img[0].'?auto=format');
                }
            }
        }

        return $result;
    }

    private function hasContent($node)
    {
        return $node->count() > 0 ? true : false;
    }

    private function getNodeContent($node)
    {
        return $this->hasContent($node->filter('#product-image')) != false ? $node->filter('#product-image')->eq(0)->attr('src') : '';
    }
}
