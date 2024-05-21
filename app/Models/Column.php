<?php

namespace App\Models;

use App\Models\Traits\Archivable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Column extends Model implements Sortable
{
    use SortableTrait;
    use HasFactory;
    use Archivable;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $guarded = ['id'];

    public function buildSortQuery(): Builder
    {
        return static::query()->where('board_id', $this->board_id);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
