<?php

namespace App\Http\Controllers;

use App\SalesConnect\Interfaces\StaffInterface;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    protected $staff;

    public function __construct(StaffInterface $staff){
        $this->staff = $staff;
        $this->middleware('auth:api');
    }

    public function aes(){
        return $this->staff->aes(auth()->user());
    }


}
