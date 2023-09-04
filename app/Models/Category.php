<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function children()
    {
        return $this->hasMany(Category::class , 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function attributesGroup()
    {
        return $this->belongsToMany(AttributeGroup::class , 'attributeGroup_category' , 'category_id' , 'attributeGroup_id');
    }

}
