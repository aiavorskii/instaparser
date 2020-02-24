<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Exceptions\IncorrectParameterException;
use Symfony\Component\DomCrawler\Crawler;

class FollowersCounterScrapperController extends ScrapperController
{
    public function form()
    {
        return view('form.form-counter', ['action' => '/scrapper/followers']);
    }

    protected function getData(Crawler $response)
    {
        $data = $response->filter('script')->each(function ($node) {
            if (preg_match('@"userInteractionCount"\:"(\d+)"@', $node->text(), $matches)) {
                return $matches[1];
            }
        });

        return $data;
    }

    protected function formatData($data) {
        $data = array_filter($data);
        $data = array_pop($data);

        return ['count' => $data];
    }

    protected function getParseParam($request)
    {
        $url = $request->request->get('profile');

        if (!$url) {
            throw new IncorrectParameterException();
        }

        return $url;
    }
}
