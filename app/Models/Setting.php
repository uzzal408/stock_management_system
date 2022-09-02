<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Setting extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'settings';

    /**
     * @var array
     */
    protected $fillable = ['key','value'];

    /**
     * @param $key
     */

    public static function get($key){
        $settings = new self();
        $entry = $settings->where('key',$key)->first();

        if(!$entry){
            return;
        }
        return $entry->value;
    }

    /**
     * @param $key
     * @param null $value
     * @return bool
     */
    public static function set($key, $value=null){

        $settings = new self();

        $entry = $settings->where('key',$key)->firstOrFail();
        $entry->value = $value;
        $entry->saveOrFail();

        Config::set('key',$value);

        if(Config::get('key')==$value){
            return true;
        }

        return false;

    }
}
