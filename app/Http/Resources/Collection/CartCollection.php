<?php

namespace App\Http\Resources\Collection;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CartCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => new UserCollection(User::findOrFail($this->user_id)),
            'created_at' => $this->created_at,
            'cart_items' => CartItemCollection::collection($this->cartItems),
        ];
    }
}
