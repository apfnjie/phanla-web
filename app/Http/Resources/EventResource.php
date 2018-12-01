<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'event_id' => $this->id,
            'tag' => "$this->tag",
            'name' => $this->name,
            'location' => $this->location,
            'time' => $this->time,
            'description' => $this->description,
            'fee' => $this->fee,
            'created_by' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'status' => $this->mapStatus($this->status),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }

    public function mapStatus($status)
    {
        $statuses = [
            '1' => 'Pending',
            '2' => 'Active',
        ];

        return $statuses[$status];
    }
}
