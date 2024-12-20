<?php
namespace App\Http\Controllers\Api\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function slider()
    {
        $sliders = Slider::all()->map(function ($slider) {
            return [
                'id' => $slider->id,
                'title' => $slider->title,
                'image_url' => url($slider->image), // Generates the full URL
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $sliders,
        ]);
    }    
}
