<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Stichoza\GoogleTranslate\GoogleTranslate as GoogleTranslate;

class TranslatorController extends Controller
{
    public function index()
    {
        return view('translator');
    }

public function translate(Request $request)
{
    $text = trim($request->text);

    $result = Cache::remember(
        'translate_'.md5($text),
        now()->addDays(7),
        function () use ($text) {

            $tr = new GoogleTranslate('ta');

            return $tr->translate($text);
        }
    );

    return response()->json([
        'translated_text' => $result
    ]);
}
public function translate2(Request $request)
{
    $translator = new GoogleTranslate('ta');

    $result = $translator->translate($request->text);

    return response()->json([
        'translated_text' => $result
    ]);
}
}