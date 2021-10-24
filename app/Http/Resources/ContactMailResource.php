<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactMailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string) $this->id,
            'type' => 'ConcatMail',
            'attributes' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'email' => $this->email,
                'message' => $this->message
            ]
        ];
    }
}
