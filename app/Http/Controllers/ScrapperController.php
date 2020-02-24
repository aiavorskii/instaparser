<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Exceptions\InvalidURLException;
use Goutte\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\DomCrawler\Crawler;

abstract class ScrapperController extends BaseController
{
    var $client;

    abstract public function form();
    abstract protected function getData(Crawler $response);
    abstract protected function formatData($data);
    abstract protected function getParseParam($data);

    public function scrap(Request $request)
    {
        $this->client = new Client();
        $url = $this->getParseParam($request);

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidURLException('Invalid URL');
        }

        $response = $this->client->request('GET', $url);
        $data = $this->getData($response);
        $data = $this->formatData($data);

        return new JsonResponse($data);
    }
}
