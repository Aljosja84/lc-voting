<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function getStatusClasses()
    {
        switch($this->name) {
            case "Open":
                return 'bg-gray-200';
                break;
            case "Considering":
                return 'bg-purple text-white';
                break;
            case "In Progress":
                return 'bg-yellow text-white';
                break;
            case "Implemented":
                return 'bg-green text-white';
                break;
            case "Closed":
                return 'bg-red text-white';
                break;
            default:
                return 'bg-gray-200';
        }
    }

    public function getStatusTextColor()
    {
        switch($this->name) {
            case "Open":
                return 'text-black';
                break;
            case "Considering":
                return 'text-purple';
                break;
            case "In Progress":
                return 'text-yellow';
                break;
            case "Implemented":
                return 'text-green';
                break;
            case "Closed":
                return 'text-red';
                break;
            default:
                return 'text-gray-600';
        }
    }

    public static function getCount()
    {
        return Idea::query()
            ->selectRaw("count(*) as all_statuses")
            ->selectRaw("count(case when status_id = 1 then 1 end) as open")
            ->selectRaw("count(case when status_id = 2 then 1 end) as considering")
            ->selectRaw("count(case when status_id = 3 then 1 end) as in_progress")
            ->selectRaw("count(case when status_id = 4 then 1 end) as implemented")
            ->selectRaw("count(case when status_id = 5 then 1 end) as closed")
            ->first()
            ->toArray();
    }
}
