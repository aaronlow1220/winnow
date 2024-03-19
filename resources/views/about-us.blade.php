@extends('layout/layout')

@section('page-title', '帳號')

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/about-us.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/first-css/lin.css') }}">
@endpush

@section('main-content')
    <div class="ALL">
        <div class="justify-center flex-row align-center area1">
            <div class="us-img1">
                <img class="img1" src="{{ asset('assets/img/m-g.png') }}" alt="">
            </div>
            <div class="us-text1">
                <h1 class="HeadLine bold">關於我們</h1>
                <p class="Second-Titlecontent gray-text">忠貞社區發展協會於2010年1月依法設立之非營利團體，致力於社區婦女、兒少、青年及新住民各項社區發展及福利推動，建立社區照顧服務體系為宗旨。
                </p>
            </div>
        </div>

        <div class="area2">
            <div class="us-text2">
                <p class="content Sec">桃園市平鎮區忠貞社區發展協會為非以營利為目的之社會團體，以促進社區發展，增進社區凝聚力，推展福利社區化，建立社區照顧服務體系為宗旨。</p>
            </div>
            <div class="us-iconbox1">
                <div class="us-icon">
                    <div class="us-icon-icon">
                        <img class="icon-icon" src="{{ asset('assets/img/f551.svg') }}" alt="">
                    </div>
                    <p class="Last Main">促進社區發展</p>
                    <div></div>
                </div>
                <div class="us-icon">
                    <div class="us-icon-icon">
                        <img class="icon-icon" src="{{ asset('assets/img/f552.svg') }}" alt="">
                    </div>
                    <p class="Last Main">增進社區凝聚</p>
                    <div></div>
                </div>
                <div class="us-icon">
                    <div class="us-icon-icon">
                        <img class="icon-icon" src="{{ asset('assets/img/f553.svg') }}" alt="">
                    </div>
                    <p class="Last Main">建立照顧服務體系</p>
                    <div></div>
                </div>
            </div>

        </div>

        <div class="area4">
            <div class="area5">
                <img class="area5-img1" src="{{ asset('assets/img/cy.jpg') }}" alt="">
                <div class="area5-text">
                    <h3 class="Main-Titlecontent">產業發展</h3>
                    <p class="content t-p">透過導覽活動規劃與推廣，利用在地現有之資源，建構符合市場需求形態之導覽活動，以吸引遊客到訪，促進地方產業發展。</p>
                </div>
            </div>
            <div class="area6">
                <div class="area5-text">
                    <h3 class="Main-Titlecontent">地方創生</h3>
                    <p class="content t-p">在活動中培訓在地或對地方創生產業之人員，成為市場地方創生之生力軍。</p>
                </div>
                <img class="area5-img1" src="{{ asset('assets/img/dc.jpg') }}" alt="">
            </div>
        </div>
    @endsection
