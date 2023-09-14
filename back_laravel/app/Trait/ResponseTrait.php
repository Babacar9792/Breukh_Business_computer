<?php 



namespace App\Trait;

trait ResponseTrait {
    public function responseData($message='', $data=[],$status = false , $other = ''){
        return $other !== '' ? ["message"=> $message, "data" => $data, 'status' => $status, 'other' => $other ] : ["message"=> $message, "data" => $data, 'status' => $status];
    }
}











?>