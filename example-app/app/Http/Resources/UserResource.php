<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "name" => ucfirst($this->name), // La 1er lettre en majuscule
            "firstname" => ucfirst($this->firstname), // La 1er lettre en majuscule
            "username" => $this->name,
            "age" => $this->age,
            "email" => $this->email
        ];
    }
}
