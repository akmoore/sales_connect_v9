<?php

namespace App\SalesConnect\Repositories;

use App\Business;
// use App\SalesConnect\Utility\Business\Create;
use App\SalesConnect\Interfaces\BusinessInterface;

class BusinessRepo implements BusinessInterface {

    protected $business;

    public function __construct(Business $business){
        $this->business = $business;
    }

    public function getRecords(){
        //
    }

    public function createRecord($request){
        return app(\App\SalesConnect\Utility\Business\Create::class)->execute($request);
    }

    public function getRecord($id){
        //
    }

    public function updateRecord($request, $id){
        //
    }

    public function deleteRecord($id){
        //
    }
}