<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Exceptions\IncorrectParameterException;
use Symfony\Component\DomCrawler\Crawler;

class FollowersCounterScrapperController extends ScrapperController
{
    const INSTAGRAM_URL = 'https://www.instagram.com/';

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
        $profileID = $request->request->get('profile');

        if (!$profileID) {
            throw new IncorrectParameterException();
        }

        $url = self::INSTAGRAM_URL . $profileID;

        return $url;
    }
}
