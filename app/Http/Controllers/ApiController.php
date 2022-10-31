<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;

class ApiController extends Controller
{
    public function index($value){
        $call = 'testecusto2';
        $apiService = new ApiService();

        $request = $apiService->request('testecusto2');

        $options = $this->getBestOption($request,$value);

        $request = $apiService->request($call);
        
        $options = $this->getBestOption($request,$value); 

        asort($options);

        return view('api.index', compact('options'));

    }

    private function getBestOption($request,$value){
        $arrayOptionsLabel = [];
        $arrayOptionsPrices = ['price100','price1000','price10000'];
        foreach($request->data as $data){
            $arrayOptionsLabel[] = $data->label;
            foreach($arrayOptionsPrices as $optionPrice){
                $plan = explode('price', $optionPrice);
                if($value <= $plan[1]) {
                    $arrayValues[$data->label] = $data->{$optionPrice};
                    break;
                } else {
                    $arrayValues[$data->label] = $data->{$optionPrice};
                }
            }
        }
        return($arrayValues);
    }
}
