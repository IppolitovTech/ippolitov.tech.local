<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\Page;

class SitemapController extends Controller
{
    public function index()
    {
        $entries = Page::select('link', 'updated_at','blog')
            ->where('work', 1)
            ->orderBy('updated_at', 'desc')
            ->get();

        $xml = view('pages/sitemap', compact('entries'))->render();

        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
