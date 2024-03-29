<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InventoryLightResource extends JsonResource
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
            'id' => $this->id,
            'sku' => $this->sku,
            'title' => $this->title,
            'condition' => $this->condition,
            'total_stock' => $this->total_stock,
            'sold_quantity' => $this->sold_quantity,
            'stock_quantity' => $this->stock_quantity,
            'min_order_quantity' => $this->min_order_quantity,
            'price' => get_formated_currency($this->sale_price, config('system_settings.decimals', 2)),
            'has_offer' => $this->hasOffer(),
            'offer_price' => $this->hasOffer() ? get_formated_currency($this->offer_price, config('system_settings.decimals', 2)) : null,
            'free_shipping' => $this->free_shipping,
            'active' => $this->active,
            'shop_id' => $this->shop_id,
            'image' => get_inventory_img_src($this, 'medium'),
        ];
    }
}
