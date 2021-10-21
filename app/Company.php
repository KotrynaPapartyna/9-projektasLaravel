<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Company extends Model
{
    use Sortable;

    // nustatoma kuri lentele bus rikiuojama. kintamieji- galioja tik modelyje, yra bibliotekos
    protected $table="companies";

    //nurodomi kintamieji, kurie gali buti pildomi nauja informacija
    protected $fillable=["title", "description", "type_id"];

    // nurodomi visi stulpeliai kuriuo norima rikiuoti
    public $sortable= ["id", "title", "description", "type_id" ];



    // kompanija priklauso Tipui
    public function companyType() {
        //            //kompanija priklauso tipui, pagal stulpeli type_id
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
