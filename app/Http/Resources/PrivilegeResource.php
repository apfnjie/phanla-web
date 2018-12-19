<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivilegeResource extends JsonResource
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
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'role' => [
                'id' => $this->role,
                'name' => $this->mapRole($this->role)
            ],
            'created_at' => $this->created_at->toDateTimeString()
        ];
    }

    private function mapRole($role)
    {
        $roles = [
            '1' => 'Approver',
            '2' => 'Administrator'
        ];

        return $roles[$role];
    }
}
