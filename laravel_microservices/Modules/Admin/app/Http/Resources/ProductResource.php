<?php

namespace Modules\Admin\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'title' => $this->title,
            'description'=>$this->description,
            'image' => $this->image,
            'price' => $this->price,
        ];
    }
}
