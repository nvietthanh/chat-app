<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $images = $this->getImages();
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'attributes' => $this->attributes,
            'image_url' => $images[0]['image_url'],
            'images' => $images,
            'branch' => $this->getBranch(),
            'category' => $this->getCategory(),
        ];
    }

    public function getImages()
    {
        $images = [];
        foreach ($this->whenLoaded('images') as $image) {
            $images[] = [
                'image_url' => get_file_url($image->image_url),
                'thumbnail_image_url' => get_file_url($image->thumbnail_image_url),
            ];
        }

        return $images;
    }

    public function getBranch()
    {
        if (!$this->whenLoaded('branch')) {
            return null;
        }

        return [
            'id' => $this->branch->id,
            'name' => $this->branch->name,
            'description' => $this->branch->description,
            'image_url' => get_file_url($this->branch->image_url),
        ];
    }

    public function getCategory()
    {
        if (!$this->whenLoaded('category')) {
            return null;
        }

        return [
            'id' => $this->category->id,
            'name' => $this->category->name,
            'image_url' => get_file_url($this->category->image_url),
        ];
    }
}
