<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;
class Product extends Model implements HasMedia
{
    //
    use InteractsWithMedia;




    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100);

        $this->addMediaConversion('small')
            ->width(480);
        $this->addMediaConversion('large')
            ->width(1200);

        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
