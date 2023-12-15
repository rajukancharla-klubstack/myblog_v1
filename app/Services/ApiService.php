<?php

namespace App\Services;




class ApiService
{
    protected $apiUrl;

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    public function fetchData()
    {
        // Dummy implementation: Simulate making an HTTP GET request to the API
        $dummyApiResponse = [
            'data' => [
                ['id' => 1, 'name' => 'Item 1'],
                ['id' => 2, 'name' => 'Item 2'],
                ['id' => 3, 'name' => 'Item 3'],
            ],
        ];

        return $dummyApiResponse;
    }
}
