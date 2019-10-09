<?php


namespace App\Http\Controllers;


use App\Events\NewEvent;
use Illuminate\Http\Request;

class RealController
{
    public function newEvent(Request $request)
    {
        $result = [
            'labels' => ['march', 'april', 'may', 'june'],
            'datasets' => array([
                'label' => 'Sales',
                'backgroundColor' => '#F26202',
                'data' => [15000, 5000, 10000, 1000]
            ],
            )
        ];

        if($request->has('label')){
            $result['labels'][] = $request->input('label');
            $result['datasets'][0]['data'][] = (integer)$request->input('sale');

            if($request->has('realtime')){
                if(filter_var($request->input('realtime'), FILTER_VALIDATE_BOOLEAN)){
                    event(new NewEvent($result));
                }
            }
        }

        return $result;
    }

}
