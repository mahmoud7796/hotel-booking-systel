<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $guarded=[];


    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getBannerSrcAttribute($value){
        return  ($value!==null) ? asset($value) : "";
    }


    public function publishStatus(){
        return $this -> publish_status ==1  ? 'Active':'Deactive';
    }
}
