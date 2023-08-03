<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = $this->image ? $this->image : "https://sbcf.fr/wp-content/uploads/2018/03/sbcf-default-avatar.png";

        return $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
