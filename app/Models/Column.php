<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Column extends Model implements Sortable
{
    use SortableTrait;
    use HasFactory;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'archived_at' => 'datetime'
    ];

    public function scopeNotArchived(Builder $query)
    {
        $query->whereNull('archived_at');
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
