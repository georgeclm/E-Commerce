<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;


class tokoProfile extends Model
{
    use HasFactory;
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/jAZHCrXvUSsoh3BtdypreKvz8tz0M4DEnDOfvvDt.png';
        return '/storage/' . $imagePath;
    }
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(tokoProfile::class);
    }

}
