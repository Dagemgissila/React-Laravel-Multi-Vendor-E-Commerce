<?php

namespace App\Models;

use App\Enums\EnumsProductsStatusEnum;
use Illuminate\Database\Eloquent\Builder;
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

    public function scopeForVendor(Builder $query)
    {
        return $query->where("created_by", auth()->user()->id);
    }

    public function scopePublished(Builder $query)
    {
        return $query->where("status", EnumsProductsStatusEnum::Published);
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function variationTypes()
    {
        return $this->hasMany(VariationType::class);
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


}
