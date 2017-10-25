<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['mark', 'model', 'year', 'max_speed', 'is_automatic', 'engine', 'number_of_doors'];


    const STORE_RULES = [
            'mark' => 'required | min:2',
            'model' => 'required | min:2',
            'year' => 'required',
            'max_speed' => 'numeric|min:20|max:300',
            'is_automatic' => 'required',
            'engine' => 'required',
            'number_of_doors' => 'required | numeric|min:2|max:5'
        ];


    static function getCars() {
        return self::all();
    }


    // mutator - kad boolean bude stizao u bazu
    public function setIsAutomaticAttribute($value){
    	$this->attributes['is_automatic'] = (boolean)$value;

    }
}
