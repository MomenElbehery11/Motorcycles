<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageUploadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'path'      => asset('storage/' . $this->path),
            'price'     => $this->price,
            'created_at'=> $this->created_at->toDateTimeString(),
        ];
    }
}

