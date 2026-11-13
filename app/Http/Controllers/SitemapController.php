<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use App\Models\MainMenu;
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

    /**
     * /llms.txt — a short Markdown summary of the site for LLMs and AI assistants
     * (see https://llmstxt.org).
     */
    public function llms()
    {
        $config = config('seo');
        $siteUrl = rtrim(url('/'), '/');

        $lines = [];
        $lines[] = '# ' . $config['site_name'];
        $lines[] = '';
        $lines[] = '> ' . $config['description'];
        $lines[] = '';
        $lines[] = 'Author: ' . $config['person']['name'] . ' — ' . $config['person']['job_title'] . '.';
        $lines[] = 'Skills: ' . implode(', ', $config['person']['skills']) . '.';
        $lines[] = '';

        $lines[] = '## Main pages';
        $lines[] = '';
        foreach (MainMenu::all() as $link) {
            if ($link->link == 'page') {
                continue;
            }
            $url = $link->link == '/' ? $siteUrl . '/' : $siteUrl . '/' . trim($link->link, '/') . '/';
            $lines[] = '- [' . $link->name_page . '](' . $url . ')' . ($link->title ? ': ' . $link->title : '');
        }
        $lines[] = '';

        $articles = Page::where('work', 1)->where('blog', 1)->orderBy('updated_at', 'desc')->get();
        if ($articles->count()) {
            $lines[] = '## Articles';
            $lines[] = '';
            foreach ($articles as $page) {
                $summary = Str::limit(trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags($page->text), ENT_QUOTES | ENT_HTML5, 'UTF-8'))), 150);
                $lines[] = '- [' . $page->header . '](' . $siteUrl . '/page/' . $page->link . '/)' . ($summary ? ': ' . $summary : '');
            }
            $lines[] = '';
        }

        $lines[] = '## Profiles';
        $lines[] = '';
        foreach ($config['person']['same_as'] as $profile) {
            $lines[] = '- ' . $profile;
        }
        $lines[] = '';

        return Response::make(implode("\n", $lines), 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
