<?php
namespace App\Http\Controllers\Api\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function slider()
    {
        $base_url = 'https://menamaherbigben.com/storage/photos/';
        $sliders = Slider::all(['title', 'image']); // Fetch all records without filtering by year_type
    
        $data = $sliders->map(function ($slider) use ($base_url) {
            return [
                'title' => $slider->title,
                'image' => $base_url . $slider->image,
            ];
        });
    
        return response(
            $data,
            200
        );
    }    
}
