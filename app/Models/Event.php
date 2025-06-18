<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $table = 'events';

	public $timestamps = false;

	protected $fillable = ['id', 'name', 'description', 'content', 'date_start', 'date_end', 'time_start', 'time_end', 'address', 'link', 'slug', 'active', 'isdelete', 'position'];

	protected $appends = ['date_range'];
	
	public function image() {
		return $this->hasOne('App\Models\Image', 'id_fk','id')->where('type','event_hinh_dai_dien');
	}
	public function images() {
		return $this->hasMany('App\Models\Image', 'id_fk','id')->where('type','event_hinh_khac')->where('isdelete',0)->orderby('position', 'asc');
	}

	public function getDateRangeAttribute()
	{
		$start = Carbon::parse($this->date_start);
		$end = Carbon::parse($this->date_end);

		if ($start->year !== $end->year) {
			return $start->format('d/m/Y') . ' - ' . $end->format('d/m/Y');
		} elseif ($start->month !== $end->month) {
			return $start->format('d/m') . ' - ' . $end->format('d/m/Y');
		} elseif ($start->day !== $end->day) {
			return $start->format('d') . ' - ' . $end->format('d/m/Y');
		} else {
			return $start->format('d/m/Y');
		}
	}

}
