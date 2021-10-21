<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
                    // kompanija priklauso Tipui
    public function companyType() {
        //            //kompanija priklauso tipui, pagal stulpeli type_id
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
