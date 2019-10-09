<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class StartController
{
    public function index(Request $request)
    {
        return view('start', [
            'urlData' => [
                [
                    'url' => 'dev.com',
                    'description' => 'Some description'
                ],
                [
                    'url' => 'dev.com',
                    'description' => 'Some description2'
                ]
            ]
        ]);
    }

    public function getJson(Request $request)
    {
        return collect([
            [
                'url' => 'dev.com',
                'description' => 'Some description'
            ],
            [
                'url' => 'dev.com',
                'description' => 'Some description2'
            ]
        ]);
    }

    public function dataChart()
    {
        return [
            'labels' => ['march', 'april', 'may', 'june'],
            'datasets' => array([
                'label' => 'Sales',
               // 'backgroundColor' => '#F26202',
                'backgroundColor' => ['#F26202', '#F32156', '#F89646', '#F65865'], //for Pie chart
                'data' => [15000, 5000, 10000, 1000]
            ],
            /*[
                'label' => 'Sold',
                'backgroundColor' => '#F32202',
                'data' => [15000, 5000, 30000, 10000]
            ]*/
            )
        ];
    }

    public function randomChart()
    {
        return [
            'labels' => ['march', 'april', 'may', 'june'],
            'datasets' => array(
                [
                    'label' => 'Серебро',
                    'backgroundColor' => '#F26202',
                    'data' => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000)],
                ],
                [
                    'label' => 'Золото',
                    'backgroundColor' => '#F32202',
                    'data' => [rand(0, 40000), rand(0, 40000), rand(0, 40000), rand(0, 40000)]
                ]
            )
        ];
    }
}
