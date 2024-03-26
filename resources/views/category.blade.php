@extends('layout/layout')

@section('page-title', $category->name)

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
    <script src="{{ asset('assets/js/category.js') }}" defer></script>
@endpush

@section('main-content')
    <main>
        <div id="sub-main">
            <h3 id="page_title">{{ $category->name }}</h3>

            <div class="tabs">
                @isset($subCategory)
                    @foreach ($subCategory as $sc)
                        <a href="{{ route('category', ['category' => $category->alias, 'subCategory' => $sc->alias]) }}"><button @if ($subCatAlias == $sc->alias) class="tab-button active-tab" @else class="tab-button" @endif>{{ $sc->name }}</button></a>
                    @endforeach
                @endisset
            </div>

            <div>
                <div id="tab1" class="tab-content">
                    <div class="article" id="article-container">
                        <div class="row-column">
                            <h3 class="title">
                                @isset($article)
                                    {{ $article->title }}
                                @endisset
                            </h3>
                            {{-- <div class="date">2023/12/10</div> --}}
                        </div>
                        @if ($article)
                            {!! $article->content !!}
                        @else
                            目前沒有文章哦~
                        @endif

                    </div>
                    <div class="card-container">
                        @isset($otherPosts)
                            @foreach ($otherPosts as $post)
                                <a class="card" href="{{ route('post', ['category' => $catAlias, 'subCategory' => $subCatAlias, 'article' => $post->uuid]) }}">
                                    <img src="{{ asset('media/post/' . $post->uuid . '/' . $post->media_location) }}" alt="">
                                    <div class="flex-column">
                                        <div>
                                            <div class="card_tittle">{{ $post->title }}</div>

                                        </div>
                                        <div class="date">{{ date('Y-m-d', strtotime($post->created_at)) }}</div>
                                    </div>
                                </a>

                                <a class="m_card" href="{{ route('mpost', ['category' => $catAlias, 'subCategory' => $subCatAlias, 'article' => $post->uuid]) }}">
                                    <img src="{{ asset('media/post/' . $post->uuid . '/' . $post->media_location) }}" alt="">
                                    <div class="flex-column">
                                        <div>
                                            <div class="card_tittle">{{ $post->title }}</div>
                                        </div>
                                        <div class="date">{{ date('Y-m-d', strtotime($post->created_at)) }}</div>
                                    </div>
                                </a>

                                <div class="divider"></div>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
    </main>
@endsection
