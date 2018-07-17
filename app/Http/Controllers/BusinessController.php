<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesConnect\Interfaces\BusinessInterface;

class BusinessController extends Controller
{
    protected $business;

    public function __construct(BusinessInterface $business){
        $this->business = $business;
        $this->middleware('auth:api');
    }

    public function index(){
        return 'all businesses';
    }

    public function store(Request $request){
        return $this->business->createRecord($request);
    }
}
