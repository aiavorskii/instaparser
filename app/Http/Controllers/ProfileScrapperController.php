<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Exceptions\IncorrectParameterException;
use Symfony\Component\DomCrawler\Crawler;

class ProfileScrapperController extends ScrapperController
{
    public function form()
    {
        return view('form.form-profile', ['action' => '/scrapper/profile']);
    }

    protected function getData(Crawler $response)
    {
        $data = $response->filter('a')->each(function ($node) {
            $attributes = $node->extract(['href']);
            if (!empty($attributes)) {
                $href = array_pop($attributes);
                if (preg_match('@(?i)instagram.com\/(?!p\/)[A-Za-z0-9-_]+@', $href)) {
                    return $href;
                }
            }
        });

        return $data;
    }

    protected function formatData($data)
    {
        $data = array_filter($data);
        $data = array_unique($data);

        $returnData = ["instagram" => array_values($data)];

        return $returnData;
    }

    protected function getParseParam($request)
    {
        $url = $request->request->get('url');

        if (!$url) {
            throw new IncorrectParameterException();
        }

        return $url;
    }
}
