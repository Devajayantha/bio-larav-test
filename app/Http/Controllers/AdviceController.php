<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdviceResource;
use App\Http\Resources\DetailAdviceResource;
use App\Models\Advice;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdviceController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $advices = Advice::with('translations')
            ->latest()->get();

        $languages = Language::query()
            ->get();

        return view('advice.index', [
            'advices' => AdviceResource::collection($advices)->toArray($request),
            'languages' => $languages,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @param \App\Models\Advice $advice
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request, Advice $advice)
    {
        $advice->load('translations.language');

        $languages = Language::query()
            ->whereNot('code', 'en')
            ->get();

        return view('advice.edit', [
            'advice' => DetailAdviceResource::make($advice, $languages)->toArray($request),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Advice $advice
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, Advice $advice)
    {
        DB::transaction(function () use ($request, $advice) {
            foreach ($request->input('data') as $key => $translation) {
                $advice->translateOrNew($key)->name = $translation['name'];
                $advice->translateOrNew($key)->information = $translation['information'];
                $advice->translateOrNew($key)->actual_tip = $translation['actualtip'];
                $advice->translateOrNew($key)->tip_example = $translation['tipexample'];
            }

            $advice->save();
        });

        return redirect()->back()->with('success', 'Advice updated successfully');
    }
}
