<?php


namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class RecruitmentService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function strpos($firstString, $secondString) {

        if (strpos($firstString, $secondString) !== false) {
            echo "Udało się! '" . $firstString . "' zawiera słowo '" . $secondString . "'";
        }
        else echo "Niestety, '" . $firstString . "' nie zawiera słowa '" . $secondString . "'";
    }

    public function chucknorris() {

        $response = $this->client->request(
            'GET',
            'https://api.chucknorris.io/jokes/random'
        );
        
        $content = $response->toArray();
        $content = $content['value'];
        return $content;
    }
}