<?php

/*
|--------------------------------------------------------------------------
| SEO / AI discovery settings
|--------------------------------------------------------------------------
|
| Used for <meta> tags, Open Graph, JSON-LD (schema.org) and /llms.txt.
| Values come from .env (SEO_*); the second argument is the fallback.
| Lists (skills, profiles) are comma-separated in .env.
|
*/

$list = function ($value) {
    return array_values(array_filter(array_map('trim', explode(',', (string) $value))));
};

return [
    'site_name' => env('SEO_SITE_NAME', 'konstantindev.com'),

    'locale' => env('SEO_LOCALE', 'en_US'),

    // Default description, used when a page has no text of its own (max ~160 chars).
    'description' => env('SEO_DESCRIPTION', 'Konstantin Ippolitov — Senior Backend Engineer, 10+ years. PHP/Laravel, Go, Kafka, Elasticsearch. High-load systems for UK, UAE and enterprise clients.'),

    // Image for link previews (Open Graph / Twitter), path relative to /public.
    'image' => env('SEO_IMAGE', '/img/my-photo.webp'),

    'person' => [
        'name' => env('SEO_PERSON_NAME', 'Konstantin Ippolitov'),
        'job_title' => env('SEO_PERSON_JOB_TITLE', 'Senior Backend Engineer'),
        'skills' => $list(env('SEO_PERSON_SKILLS', 'PHP, Laravel, Go, Apache Kafka, Elasticsearch, PostgreSQL, MySQL, Docker, Vue.js, High-load architecture, Event-driven systems, Performance optimization')),
        'same_as' => $list(env('SEO_PERSON_SAME_AS', 'https://www.linkedin.com/in/ippolitov-konstantin/, https://github.com/IppolitovTech, https://t.me/Kostantin_Ippolitov')),
    ],
];
