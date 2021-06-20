<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';


    public function blogs()
    {
        $this->hasMany(Blog::class, 'category_id', 'id');
    }


    public static function formatForSelect2(array $data, array $categories)
    {


        $return = [];


        foreach ($categories as $Ckey => $category) {

            if (empty($data)) {
                $return[$Ckey] = [
                    'text' => $category,
                    'selected' => ''
                ];
            }

            foreach ($data as $Dkey => $item) {
                if ($Ckey === $Dkey)
                    if (!array_key_exists($Ckey, $return))
                        $return[$Ckey] = [
                            'text' => $category,
                            'selected' => 'selected'
                        ];
                    else {
                        if (!array_key_exists($Ckey, $return))
                            $return[$Ckey] = [
                                'text' => $category,
                                'selected' => ''
                            ];
                    }
            }
        }

        return $return;
    }
}
