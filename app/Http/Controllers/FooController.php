<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FooRepository;
use App\Services\FooService;

class FooController extends Controller
{
  
    // private $repository;
    // 
    // public function __construct(FooRepository $repository)
    // {
    //     $this->repository = $repository;
    // }
    // 
    public function foo(FooRepository $repository, FooService $fooService)
    {
        // traditional method
        // $repository = new \App\Repositories\FooRepository();
        // 
        // return $repository->get();
        
        // eligent method
        // return $this->repository->get();
        return $fooService->doSomething();
    }
}
