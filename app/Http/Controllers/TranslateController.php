<?php

namespace App\Http\Controllers;

use App\Support\MyMemory;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $request->validate([
            'text' => 'required|string',
            'locale' => 'required|string|exists:languages,code',
        ]);

        $translate = new MyMemory();

        return $translate->translate($request->input('text'), $request->input('locale'));
    }
}
