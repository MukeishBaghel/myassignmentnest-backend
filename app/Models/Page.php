<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'location',
        'page_url',
        'hero_title',
        'hero_sub_title',
        'section_1_title_1',    
        'section_1_content_1',
        'section_1_title_2',
        'section_1_content_2',
        'conference_pricing_text',
        'sponsor_section_text',
      ];

      public function country(){
        return $this->belongsTo('App\Models\Country');
      }
}
