<?php
/**
 * Created by IntelliJ IDEA.
 * User: yayaandaya
 * Date: 11/08/21
 * Time: 19.14
 */

namespace App\Interfaces;


interface CrawlerInterface
{
    public function getContent($link);
    public function getCurrentPrice($link);
    public function getName($content);
    public function getDescription($content);
    public function getPhoto($content);
}
