<?php

namespace App\Services;

use Illuminate\Support\Str;

/**
 * Meta tags, canonical URL and schema.org JSON-LD for a public page.
 */
class Seo
{
    /**
     * @param string     $currentLink '/', 'portfolio', 'contacts' or 'page'
     * @param string|null $title      page title from the database
     * @param array|null $page        row from the `pages` table, if the route has one
     */
    public static function forPage($currentLink, $title, $page = null)
    {
        $config = config('seo');
        $siteUrl = rtrim(url('/'), '/');
        $isArticle = $currentLink == 'page';

        if ($isArticle) {
            $canonical = $siteUrl . '/page/' . $page['link'] . '/';
        } else {
            $canonical = $siteUrl . '/' . ($currentLink == '/' ? '' : trim($currentLink, '/') . '/');
        }

        $description = $page ? self::plainText(!empty($page['description']) ? $page['description'] : $page['text']) : '';
        $description = Str::limit($description ?: $config['description'], 160);

        $title = $title ?: $config['person']['name'];
        if ($currentLink != '/') {
            $title .= ' | ' . $config['site_name'];
        }

        $graph = [[
            '@type' => 'Person',
            '@id' => $siteUrl . '/#person',
            'name' => $config['person']['name'],
            'url' => $siteUrl . '/',
            'image' => $siteUrl . $config['image'],
            'jobTitle' => $config['person']['job_title'],
            'knowsAbout' => $config['person']['skills'],
            'sameAs' => $config['person']['same_as'],
        ]];

        if ($isArticle) {
            $graph[] = [
                '@type' => 'Article',
                'mainEntityOfPage' => $canonical,
                'headline' => $page['header'],
                'description' => $description,
                'datePublished' => date(DATE_ATOM, strtotime($page['created_at'])),
                'dateModified' => date(DATE_ATOM, strtotime($page['updated_at'])),
                'author' => ['@id' => $siteUrl . '/#person'],
                'inLanguage' => 'en-US',
            ];
        }

        return [
            'title' => $title,
            'description' => $description,
            'canonical' => $canonical,
            'image' => $siteUrl . $config['image'],
            'type' => $isArticle ? 'article' : 'website',
            'site_name' => $config['site_name'],
            'locale' => $config['locale'],
            'json_ld' => json_encode(
                ['@context' => 'https://schema.org', '@graph' => $graph],
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG
            ),
            'page' => $page,
        ];
    }

    private static function plainText($html)
    {
        $text = html_entity_decode(strip_tags((string) $html), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return trim(preg_replace('/\s+/u', ' ', $text));
    }
}
