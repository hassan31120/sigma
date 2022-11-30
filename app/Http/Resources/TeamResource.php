<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'image'     => asset($this->image),
            'job'       => $this->job,
            'linkedin'  => $this->linkedin,
            'facebook'  => $this->facebook,
            'instagram' => $this->instagram,
            'twitter'   => $this->twitter,
        ];
    }
}
