<?php

namespace Mawdoo3\Search\Models;

use Illuminate\Database\Eloquent\Model;

class SavedResults extends Model
{
    protected $guarded = [];

    protected $visible = ['id', 'title', 'description', 'comment', 'link'];
}
