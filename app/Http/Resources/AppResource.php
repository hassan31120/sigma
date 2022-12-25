<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppResource extends JsonResource
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
            'body'      => $this->body,
            'image'     => asset($this->image),
            'price'     => (float) $this->price,
            'ref1'      => $this->ref1,
            'ref2'      => $this->ref2,
            'ref3'      => $this->ref3,
            'b_head'    => $this->b_head,
            'b_body'    => $this->b_body,
            'b_image'   => asset($this->b_image),
            'pages'     => (float) $this->pages,
            'downlaods' => (float) $this->downlaods,
            'customers' => (float) $this->customers,
            'country'   => (float) $this->country,
            'c_name'    => $this->c_name,
            'c_body'    => $this->c_body,
            'c_logo'    => asset($this->c_logo),
            'cat_id'    => $this->cat_id
        ];
    }
}
