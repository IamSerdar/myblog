<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->name,
            'description' => $this->description,
            'views'       => $this->views,
            'image'       => url('images/' . $this->image),
            'author'      => [
                'id'    => $this->author->id ?? null,
                'name'  => $this->author->login ?? 'Unknown',
                'role'  => $this->author->role ?? 'user',
            ],
            'created_at'  => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}

