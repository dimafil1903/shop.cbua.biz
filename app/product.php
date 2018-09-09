<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use Searchable;

    /**
     * Получить имя индекса для модели.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'posts_index';
    }
}