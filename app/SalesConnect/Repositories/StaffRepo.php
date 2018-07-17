<?php

namespace App\SalesConnect\Repositories;

use App\SalesConnect\Interfaces\StaffInterface;

class StaffRepo implements StaffInterface{
    public function aes($user){
        return app(\App\SalesConnect\Utility\Staff\SelectAes::class)->execute($user);
    }
}