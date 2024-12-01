<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    private $langActive = [
        'vn',
        'fr',
        'it',
        'en',
    ];
    public function changeLang(Request $request)
    {
        $lang = $request->lang;
        if (in_array($lang, $this->langActive)) {
            session(['lang' => $lang]);
        }
        return redirect()->back();
    }
}
