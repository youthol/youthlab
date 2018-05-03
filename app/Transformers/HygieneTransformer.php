<?php

namespace App\Transformers;

use App\Models\Hygiene;
use League\Fractal\TransformerAbstract;

class HygieneTransformer extends TransformerAbstract
{
    public function transform(Hygiene $hygiene)
    {
        return [
            'id' => $hygiene->id,
            'date' => $hygiene->date,
            'week' =>$hygiene->week,
            'dormitory'=>$hygiene->dormitory,
            'room'=>$hygiene->room,
            'score'=> $hygiene->score,
            'academy'=>$hygiene->academy,
            'people'=>$hygiene->people,
            'created_at' => $hygiene->created_at?$hygiene->created_at->toDateTimeString():null,
            'updated_at' => $hygiene->updated_at?$hygiene->updated_at->toDateTimeString():null,
        ];
    }
}