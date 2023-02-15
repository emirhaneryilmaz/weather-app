<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Student extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'student';
    protected $primaryKey = 'sid';
    protected $fillable = [
        'sid',
        'fname',
        'lname',
        'birthplace',
        'birthDate',
    ];

    public $timestamps= false; 
    public $sortable = ['sid', 'fname', 'lname', 'birthplace', 'birthDate'];
}
