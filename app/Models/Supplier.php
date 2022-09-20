<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
/*
    * PRODUCT ATTRIBUTES
    * $this->attributes['id'] - int - contains the product primary key (id)

    * $this->attributes['name'] - string - contains the supplier name
    * $this->attributes['nit'] - string - contains the supplier nit
    * $this->attributes['phone'] - string - contains the supplier phone
    * $this->attributes['email'] - email - contains the supplier email
    * $this->attributes['observation'] - text - contains the supplier observation
    * $this->attributes['created_at'] - timestamp - contains the supplier creation date
    * $this->attributes['updated_at'] - timestamp - contains the supplier update date
*/

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|max:255",
            "nit" => "required|max:20",
            "phone" => "required|max:10",
            "email" => "required|max:40",
            "observation" => "required|max:255",
        ]);
    }

    public function getId()
    {
        return $this->attributes["id"];
    }

    public function setId($id)
    {
        $this->attributes["id"] = $id;
    }

    public function getName()
    {
        return $this->attributes["name"];
    }

    public function setName($name)
    {
        $this->attributes["name"] = $name;
    }

    public function getNit()
    {
        return $this->attributes["nit"];
    }
    
    public function setNit($nit)
    {
        $this->attributes["nit"] = $nit;
    }
    
    public function getPhone()
    {
        return $this->attributes["phone"];
    }
    
    public function setPhone($phone)
    {
        $this->attributes["phone"] = $phone;
    }

    public function getEmail()
    {
        return $this->attributes["email"];
    }
    
    public function setEmail($email)
    {
        $this->attributes["email"] = $email;
    }

    public function getObservation()
    {
        return $this->attributes["observation"];
    }
    
    public function setObservation($observation)
    {
        $this->attributes["observation"] = $observation;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    public function getProduct()
    {
        return $this->product;
    }
    
    public function setProduct($product)
    {
        $this->product = $product;
    }
    
    public function getCreatedAt()
    {
        return $this->attributes["created_at"];
    }
    
    public function setCreatedAt($createdAt)
    {
        $this->attributes["created_at"] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes["updated_at"];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes["updated_at"] = $updatedAt;
    }
}
