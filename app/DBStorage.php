<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class DBStorage extends Model
{
    public function has($key)
    {
        return DatabaseStorage::find($key);
    }

    public function get($key)
    {
        if($this->has($key))
        {
            return new DB(DatabaseStorage::find($key)->cart_data);
        }
        else
        {
            return [];
        }
    }

    public function put($key, $value)
    {
        if($row = DatabaseStorage::find($key))
        {
            // update
            $row->cart_data = $value;
            $row->save();
        }
        else
        {
            DatabaseStorage::create([
                'id' => $key,
                'cart_data' => $value
            ]);
        }
    }
}
