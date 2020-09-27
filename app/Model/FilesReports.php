<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FilesReports extends Model
{
    const STATUS_PENDING = 0;
    const STATUS_SOLVED = 1;
    const STATUS_IN_PROGRESS = 2;

    protected $guarded = ['id'];

    public function getStatusTextAttribute()
    {
        $statuses = [
            self::STATUS_PENDING => 'Pending',
            self::STATUS_SOLVED => 'Solved',
            self::STATUS_IN_PROGRESS => 'In Progress',
        ];

        return key_exists($this->attributes['status'], $statuses) ? $statuses[$this->attributes['status']] : 'Unknown';
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
