<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['url_data','code','visit_count','expiry_at'];


     /**
     * Get the visitors for the url.
     */
    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class);
    }
}
