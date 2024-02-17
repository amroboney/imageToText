<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class ImageController extends Controller
{
    public function extractText()
    {
        $imagePath = public_path('images/photo2.jpeg'); // Replace with your image path

        try {
            $text = (new TesseractOCR($imagePath))
                ->lang('eng') // Specify the language
                ->run();

            return response()->json(['text' => $text]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function extract(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();

        $image->move(public_path('uploads'), $imageName);

        // Use Tesseract to perform OCR on the uploaded image
        $textFromImage = (new TesseractOCR(public_path('uploads/' . $imageName)))
            ->run();

            return $textFromImage;
    }
}
