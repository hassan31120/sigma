<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoResource extends JsonResource
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
            'views'     => (double) $this->views,
            'customers' => (double) $this->customers,
            'employees' => (double)$this->employees,
            'projects'  => (double) $this->projects,
            'email'     => $this->email,
            'number'    => $this->number,
        ];
    }
}
