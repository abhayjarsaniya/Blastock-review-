<?php

namespace App\Http\Resources;

use App\Helpers\ListHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'type' => $this->type,
            'brand' => $this->brand,
            'sku' => $this->sku,
            'condition' => $this->condition,
            'condition_note' => $this->condition_note,
            'description' => $this->description,
            'key_features' => $this->key_features ? unserialize($this->key_features) : [],
            'total_stock' => $this->total_stock,
            'sold_quantity' => $this->sold_quantity,
            'stock_quantity' => $this->stock_quantity,
            'min_order_quantity' => $this->min_order_quantity,
            'has_offer' => $this->hasOffer(),
            'raw_price' => get_formated_value($this->current_sale_price()),
            'currency' => get_system_currency(),
            'currency_symbol' => get_currency_symbol(),
            'price' => get_formated_currency($this->sale_price, config('system_settings.decimals', 2)),
            'offer_price' => $this->hasOffer() ?
                get_formated_currency($this->offer_price, config('system_settings.decimals', 2)) : null,
            'discount' => $this->hasOffer() ?
                trans('theme.percent_off', ['value' => $this->discount_percentage()]) : null,
            'offer_start' => $this->hasOffer() ? (string) $this->offer_start : null,
            'offer_end' => $this->hasOffer() ? (string) $this->offer_end : null,
            'shipping_weight' => get_formated_weight($this->shipping_weight),
            'is_in_deals' => $this->isInDeals(),
            'attributes' => AttributeDryResource::collection($this->whenLoaded('attributeValues')->unique('attribute_id')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'image_id' => $this->when($this->whenLoaded('image'), optional($this->image)->id),
            'rating' => $this->rating(),
            'feedbacks_count' => $this->rating() ? $this->avgFeedback->count : 0,
            'feedbacks' => FeedbackResource::collection($this->whenLoaded('latestFeedbacks')),
            'shop' => new ShopLightResource($this->shop),
            'product' => new ProductResource($this->product),
            'free_shipping' => $this->free_shipping,
            'stuff_pick' => $this->stuff_pick,
            'labels' => $this->getLabels(),
            'linked_items' => ItemLightResource::collection(ListHelper::linked_items($this)),
            'listed_at' => date('F j, Y', strtotime($this->created_at)),
            // 'variants' => ListHelper::variants_of_product($this, $this->shop_id),
        ];
    }
}
