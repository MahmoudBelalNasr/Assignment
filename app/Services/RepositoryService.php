<?php

namespace App\Services;
use App\Traits\ApiResponse as ApiResponseTrait;
use Illuminate\Support\Facades\Http;

class RepositoryService
{
    use ApiResponseTrait;

    public function getMostPopularRepositories(){

        $perPage = request()->input('per_page', '');
        $sinceDate = request()->input('sinceDate', '');
        $language = request()->input('language', '');

        $queryParameters = [
            'q' => isset($sinceDate) ? "created:>{$sinceDate}" : '',
            'per_page' => $perPage,
            'sort' => 'stars',
            'order' => 'desc',
        ];

        if ($language) {
            $queryParameters['q'] .= " language:{$language}";
        }

        $response = Http::get('https://api.github.com/search/repositories', $queryParameters);

        $data = $response->json();
        if ($data['total_count'] == 0) {
            return $this->notFoundResponse();
        }

        $results = collect($data['items'] ?? []);

        return $results;
    }
}
