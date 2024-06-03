<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model {
    use HasFactory;

    protected $table = 'job_listings';

    protected $fillable = ['title', 'salary'];
    // 'employer_id',

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function tags()
    {
        // return $this->belongsToMany(Tag::class, foreignPivotKey:"job_listings_id");
        return $this->belongsToMany(Tag::class, 'job_tag', 'job_listings_id', 'tag_id');


    }
}






// class job {
//     public static function all(): array
//     {
//         return [
//             [
//                 'id' => 1,
//                 'title' => 'Director',
//                 'salary' => 'ksh 10000'

//             ],
//             [
//                 'id' => 2,
//                 'title' => 'Programmer',
//                 'salary' => 'ksh 50000'
//             ],
//             [
//                 'id' => 3,
//                 'title' => 'Teacher',
//                 'salary' => 'ksh 45000'
//             ]
//         ];
//     }

//     public static function find(int $id): array
//     {
//         $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

//         if (! $job) {
//             abort(404);
//         }

//         return $job;

//     }
// }
