<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Product extends Model
{
    /**
        * PRODUCT ATTRIBUTES
        * $this->attributes['id'] - int - contains the product primary key (id)

        * $this->attributes['name'] - string - contains the product name
        * $this->attributes['brand'] - string - contains the product brand
        * $this->attributes['category'] - string - contains the product category
        * $this->attributes['weight'] - float - contains the product weight
        * $this->attributes['price'] - int - contains the product price
        * $this->attributes['image'] - string - contains the product image
        * $this->attributes['created_at'] - timestamp - contains the product creation date 
        * $this->attributes['updated_at'] - timestamp - contains the product update date 

        * $this->items - Item[] - contains the associated items
    */

    public static function validate($request) 
    {
        $request->validate([
            "name" => "required|max:255",
            "brand" => "required|max:50", 
            "category" => "required|max:50",
            "weight" => "required",
            "price" => "required|numeric|gt:0", 
            'image' => 'image',
        ]); 
    }

    public static function sumPricesByQuantities($products, $productsInSession) 
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice()*$productsInSession[$product->getId()]); 
        }
        return $total;
    }
    
    public function getId() 
    {
        return $this->attributes['id']; 
    }

    public function setId($id) 
    {
        $this->attributes['id'] = $id; 
    }

    public function getName() 
    {
        return $this->attributes['name']; 
    }

    public function setName($name) 
    {
        $this->attributes['name'] = $name; 
    }

    public function getBrand() 
    {
        return $this->attributes['brand']; 
    }

    public function setBrand($brand) 
    {
        $this->attributes['brand'] = $brand; 
    }

    public function getCategory() 
    {
        return $this->attributes['category']; 
    }

    public function setCategory($category) 
    {
        $this->attributes['category'] = $category; 
    }

    public function getWeight() 
    {
        return $this->attributes['weight']; 
    }

    public function setWeight($weight) 
    {
        $this->attributes['weight'] = $weight; 
    }

    public function getPrice() 
    {
        return $this->attributes['price']; 
    }

    public function setPrice($price) 
    {
        $this->attributes['price'] = $price; 
    }

    public function getImage() 
    {
        return $this->attributes['image']; 
    }

    public function setImage($image) 
    {
        $this->attributes['image'] = $image; 
    }

    public function getCreatedAt() 
    {
        return $this->attributes['created_at']; 
    }

    public function setCreatedAt($createdAt) 
    {
        $this->attributes['created_at'] = $createdAt; 
    }

    public function getUpdatedAt() 
    {
        return $this->attributes['updated_at']; 
    }

    public function setUpdatedAt($updatedAt) 
    {
        $this->attributes['updated_at'] = $updatedAt; 
    }

    public function items() 
    {
    return $this->hasMany(Item::class); 
    }
    
    public function getItems() 
    {
    return $this->items; 
    }
    
    public function setItems($items) 
    {
    $this->items = $items; 
    }
    


}
