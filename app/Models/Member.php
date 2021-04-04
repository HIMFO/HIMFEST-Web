<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\File;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'lineid',
        'phone',
        'student_card_file_path',
        'verified',
    ];

    public function team() {
        return $this->belongsTo(Team::class);
    }
}
