<?php

namespace App\SalesConnect\Interfaces;

interface _Main {
    public function getRecords();
    public function getRecord($id);
    public function createRecord($request);
    public function updateRecord($request, $id);
    public function deleteRecord($id);
}