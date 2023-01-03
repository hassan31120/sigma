<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'desc'      => $this->desc,
            'image'     => asset($this->image),
            'price'     => (float) $this->price,
            'ref1'      => $this->ref1,
            'ref2'      => $this->ref2,
            'ref3'      => $this->ref3,
            'ads'       => $this->ads,
            'cat_id'    =>(integer) $this->cat_id,
            'cat'       => $this->cat->name,
            'date'      => $this->created_at->format('Y/m/d')
        ];
    }
}
