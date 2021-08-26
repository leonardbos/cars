<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'founded', 'description'];

//    protected $hidden = ['updated_at'];

//    protected $visible = ['name', 'founded', 'description'];

    public function carModels()
    {
        return $this->hasMany(CarModel::class);
    }

    //Define a has many through relationship
    public function engines()
    {
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            'car_id', //Foreign key on CarModel table
            'model_id' //Foreign key on Engine table
            );
    }


    //Define many to many relationship
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
