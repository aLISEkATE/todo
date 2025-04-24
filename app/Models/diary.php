<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Diary extends Model
{
    protected $fillable = ["title", "body", "date", "user_id"];

    protected static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder) {
            if (Auth::check()) {
                $builder->where('user_id', Auth::id());
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}