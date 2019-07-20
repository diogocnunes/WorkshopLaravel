<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MovieResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->each(function ($row) use (&$results) {
            $newRow = [
                'id' => $row->id,
                'title' => $row->title,
                'description' => $row->description,
                'year' => $row->year,
                'cover' => $row->cover,
                'genre' => $row->genre->name,
            ];
            $results[] = $newRow;
        });

        return [
            'data' => $results,
            'meta' => [
                'total' => count($this->collection)
            ]
        ];
    }
}
