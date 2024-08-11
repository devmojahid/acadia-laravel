<?php

namespace Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Page\Database\Factories\PageContentFactory;

class PageContent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['page_id', 'content'];

    // Define the relationship with the Page model
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
