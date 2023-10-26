<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RepositoryService;
use App\Traits\ApiResponse as ApiResponseTrait;

class RepositoryController extends Controller
{
    use ApiResponseTrait;

    private $repositoryService;

    /**
     * Constructs a new instance of the class.
     *
     * @param RepositoryService $repositoryService The repository service instance.
     */
    public function __construct(RepositoryService $repositoryService) {
        $this->repositoryService = $repositoryService;
    }

    /**
     * Discover repositories based on query parameters.
     *
     * @return ApiResponse The API response containing the repositories.
     */
    public function discover(){
        try{
            $repositories = $this->repositoryService->getMostPopularRepositories();
            return $this->apiResponse($repositories, 200, 'success');
        }catch (\Exception $e){
            return $this->apiResponse(null, 500, 'An error occurred: ' . $e->getMessage());
        }
    }
}
