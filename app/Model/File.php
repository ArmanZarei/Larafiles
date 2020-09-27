<?php

namespace App\Model;

use App\Traits\Categorizable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use Categorizable;

    protected $guarded = ['id'];

    public function packages()
    {
        return $this->belongsToMany(Package::class,'package_file','file_id','package_id');
    }

    public function getFileTypeTextAttribute()
    {
        $types = [
            'application/pdf' => 'PDF',
            'image/png'       => 'PNG',
            'text/plain'      => 'TXT',
        ];
        $type = $this->attributes['type'];
        return array_key_exists($type,$types) ? $types[$type] : $type;
    }

    public function getSizeFormattedAttribute()
    {
        $bytes = $this->attributes['size'];
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function reports()
    {
        return $this->hasMany(FilesReports::class);
    }

    public function scopePopular($query)
    {
        return $query->orderBy('downloada_count', 'ASC');
    }

    public function updateDownloadCount()
    {
        $fileDownload = FileDownload::where('file_id', $this->id)->whereDate('date', Carbon::today())->first();
        if ($fileDownload) {
            $fileDownload->increment('download_count');
        } else {
            $fileDownload = FileDownload::create([
                'file_id'        => $this->id,
                'date'           => Carbon::today(),
                'download_count' => 1
            ]);
        }
    }
}
