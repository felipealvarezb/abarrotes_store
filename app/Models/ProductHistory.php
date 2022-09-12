<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class ProductHistory extends Model
{
    /**
        * PRODUCT ATTRIBUTES
        * $this->attributes['id'] - int - contains the product primary key (id)
        * $this->attributes['idProduct'] - int - contains the product foreing key (id)
        * $this->attributes['price'] - int - contains the product price
        * $this->attributes['created_at'] - timestamp - contains the product creation date
        * $this->attributes['updated_at'] - timestamp - contains the product update date

        * $this->product - products[] - contains the associated products
    */

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getIdProduct()
    {
        return $this->attributes['product_id'];
    }

    public function setIdProduct($id)
    {
        $this->attributes['product_id'] = $id;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
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

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}