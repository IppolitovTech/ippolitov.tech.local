{{-- Server-rendered copy of the page for crawlers without JS (AI bots). Hidden for users by the .js class, see partials/seo-meta. --}}
<div class="ssr-content container">
    <header>
        <p><a href="{{ url('/') }}/">{{ config('seo.person.name') }}</a> — {{ config('seo.person.job_title') }}</p>
        <nav>
            <ul>
                @foreach($mainMenuLinks as $link)
                @if($link['link'] != 'page')
                <li><a href="{{ $link['link'] == '/' ? url('/') . '/' : url($link['link']) . '/' }}">{{ $link['name_page'] }}</a></li>
                @endif
                @endforeach
            </ul>
        </nav>
    </header>
    <main>
        @if($currentLink == 'page' && $seo['page'])
        <article>
            <h1>{{ $seo['page']['header'] }}</h1>
            <p>By {{ config('seo.person.name') }},
                <time datetime="{{ date(DATE_ATOM, strtotime($seo['page']['created_at'])) }}">{{ date('F j, Y', strtotime($seo['page']['created_at'])) }}</time>
            </p>
            {!! $seo['page']['text'] !!}
        </article>
        @else
        <h1>{{ $title }}</h1>
        @if($seo['page'])
        {!! $seo['page']['text'] !!}
        @endif
        @if($currentLink == 'portfolio')
        @foreach($portfolioWork as $item)
        <section>
            <h2>{{ $item['header'] }}</h2>
            {!! $item['text'] !!}
            @if(!empty($item['link']))
            <p><a href="{{ $item['link'] }}">{{ $item['link'] }}</a></p>
            @endif
        </section>
        @endforeach
        @endif
        @endif
    </main>
    <footer>
        <ul>
            @foreach(config('seo.person.same_as') as $profile)
            <li><a href="{{ $profile }}" rel="me">{{ $profile }}</a></li>
            @endforeach
        </ul>
    </footer>
</div>
