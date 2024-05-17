<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Card extends Model implements Sortable
{
    use SortableTrait;
    use HasFactory;

    protected $guarded = ['id'];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
}
