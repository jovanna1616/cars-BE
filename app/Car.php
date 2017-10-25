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


    // static function paginator() {
    //     $request = new Request();
    //     $take = request($_GET['take']);
    //     $skip = request($_GET['skip']);
    //     dd($take);
    //     if($skip && $take){
    //         $cars =  self::all();
    //         $cars = array_slice($cars, $skip);
    //         for($i=0; $i<$take; $i++) {
    //             $cars[] = $car;
    //         }    
    //         return $cars;
    //    }
    //    $cars = self::all();
    // }

    // static function getCars() {
    //     return self::all();
    // }




    static function getCars() {        

        if(isset($_GET['take']) && isset($_GET['skip'])) {
            $take = (integer)$_GET['take'];
            $skip = (integer)$_GET['skip'];
            $cars[] =  self::all();
            foreach ($cars[0] as $car) {
                $allCars[] = $car;
            }
            // // izbacuje prvih 5 iz liste i krece od 6. u listi
            // $allCars = array_slice($allCars, $skip);
                        
            // $allCars = array_slice($allCars, 0, $take);
            
            // kraca verija
            $allCars = array_slice((array_slice($allCars, $skip)), 0, $take);
            // dd($allCars);    
            return $allCars;
       }
       return self::all();
    }

    // mutator - kad boolean bude stizao u bazu
    public function setIsAutomaticAttribute($value){
    	$this->attributes['is_automatic'] = (boolean)$value;
    }
}
