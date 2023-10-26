<?php

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RepositoryTest extends TestCase
{
    /**
     * Test retrieving a list of the most popular repositories from the GitHub API.
     *
     * @return void
     */
    public function testGetPopularRepositories()
    {
        // Send a GET request to the API endpoint
        $response = $this->get('http://127.0.0.1:8000/api/repositories?per_page=10&sinceDate=2023-01-01&language=PHP');
        // dd(count($response->json()['data']));

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the response contains the expected data
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'stargazers_count',
                ],
            ],
            'status',
        ]);

        // Assert that the response contains the correct number of repositories
        $response->assertJsonCount(10, 'data');

        // Assert that the response contains the expected repository details
        $response->assertJsonFragment([
            'id' => 625678322,
            'name' => 'laravel',
            'stargazers_count' => 2526,
        ]);

        // Assert that the response contains the correct status
        $response->assertJson([
            'status' => 'success',
        ]);
    }
}
