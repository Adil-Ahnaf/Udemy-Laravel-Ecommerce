<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'subcategory_id', 'brand_id', 'product_name', 'product_code', 'product_details', 'product_color', 'product_size', 'product_quantity', 'selling_price', 'discount_price', 'video_link', 'main_slider', 'mid_slider', 'hot_deal', 'hot_new', 'best_rated', 'trend', 'image_one', 'image_two', 'image_three', 'status',
    ];
}
