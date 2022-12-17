<?php

namespace App\Models;

class Hi
{
    public static function all()
    {
        return [
            [
                'id' => '1',
                'title' => 'lorem',
                'body' => "It is a long established fact that a reader will be distracted
                 by the readable content of a page when looking at its layout.
                 The point of using Lorem Ipsum is that it has a more-or-less normal distribution"
            ],
            [
                'id' => '2',
                'title' => "lorem2",
                'body' => "It is a long established fact that a reader will be
                distracted by the readable content of a page when looking at its layout.
                 The point of using Lorem Ipsum is that it has a more-or-less normal distribution"
            ]
        ];
    }
    public static function find($id){
        $listings = self::all();
            foreach ($listings as $listing):
                if ($listing['id'] == $id) {
                    return $listing;
                }
            endforeach;
    }
}
