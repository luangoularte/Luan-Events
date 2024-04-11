<?php

namespace Domain\Task\Models;

use Domain\Task\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = [
       'task', 'category', 'status'
    ];

    public function getStatusAttribute($value)
    {
        return TaskStatus::status($value);
    }
}
