<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'firstname'=> $this->firstname,
            'lastname'=> $this->lastname,
            'user_account'=> $this->account_selection,
            'user_email'=> $this->email,
            'user_id'=> $this->id,
        ];
    }
}
