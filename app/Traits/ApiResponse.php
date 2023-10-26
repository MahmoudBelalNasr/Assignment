<?php
namespace App\Traits;
trait ApiResponse{

    /* Response format
     * [
     *      'data' =>
     *      'status' => true , false
     *      'msg' =>
     * ]
     */

    public function apiResponse($data = null, $code = 200, $msg = null){
        $array = [
            'data' => $data,
            'status' => in_array($code , $this->successCode()) ? true : false,
            'msg' => $msg,
        ];
        return response($array, $code);
    }

    public function successCode(){
        return[
            200, 201, 202
        ];
    }

    public function notFoundResponse(){
        return $this->apiResponse(null ,404,'Not Found !!');
    }

}
