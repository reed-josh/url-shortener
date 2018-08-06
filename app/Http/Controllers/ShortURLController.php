<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortUrl;


class ShortURLController extends Controller
{
    public function create(Request $request)
    {
        $exists = ShortUrl::where('long_url', $request->get('long_url'))->first();
        if ($exists) {
            $shortUrl = $exists->short_url;
            return view('show', compact('shortUrl'));
        }
        $this->validate($request, ShortUrl::$rules, [
            'long_url.required' => 'A URL is required.',
            'long_url.url' => 'A valid URL format is required.'
            ]);
        $url = $request->get('long_url');
        $shortUrl = hash('crc32', $url);
        ShortUrl::create([
            'long_url' => $url,
            'short_url' => $shortUrl
        ]);
        return view('show', compact('shortUrl'));
    }

    public function processShortURL($hash) {;
        $cachedURL = cache()->get($hash);
        if ($cachedURL) {
            return redirect($cachedURL);
        }
        $results = ShortUrl::where('short_url', $hash)->first();
        if (!$results) {
            abort(404);
        }
        cache()->put($hash, $results->long_url);
        return redirect($results->long_url);
    }
}
