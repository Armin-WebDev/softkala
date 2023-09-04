<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $table = 'attributesgroup';
    use HasFactory;

    public function attributesValue()
    {
        return $this->hasMany(AttributeValue::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class , 'attributeGroup_category','attributeGroup_id','category_id');
    }
}
