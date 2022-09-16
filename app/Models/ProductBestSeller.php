<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBestSeller extends Model
{

    /**
        * PRODUCT ATTRIBUTES
        * $this->attributes['id'] - int - contains the product primary key (id)
        * $this->attributes['idProduct'] - int - contains the product foreing key (id)
        * $this->attributes['product_count'] - int - contains the product count

        * $this->product - products[] - contains the associated products
    */

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attibutes['id'] = $id;
    }
    public function getIdProduct()
    {
        return $this->attributes['product_id'];
    }

    public function setIdProduct($id)
    {
        $this->attributes['product_id'] = $id;
    }

    public function getProductCount()
    {
        return $this->attributes['product_count'];
    }

    public function setProductCount($product_count)
    {
        $this->attributes['product_count'] = $product_count;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
