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
                <img class="img1" src="{{ asset('assets/img/m-g.jpg') }}" alt="">
            </div>
            <div class="us-text1">
                <h1 class="HeadLine bold">關於我們</h1>
                <p class="Second-Titlecontent gray-text">為保存 異域孤軍文化
                    歷史而設立的園區，包含孤軍紀念廣場、阿美米干1981、癮食聖堂、黑山銀花民族文創館，設於桃園龍岡「忠貞新村」舊址。
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
                <img class="area5-img1" src="{{ asset('assets/img/r19.jpg') }}" alt="">
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
                <img class="area5-img1" src="{{ asset('assets/img/i32.jpg') }}" alt="">
            </div>
        </div>

        <div class="area3 PC">
            <div class="usp-col">
                <div class="usp-row">
                    <div class="usp-img1">
                        <div class="usp-img1-img">
                            <img class="img3" src="/img/Rectangle 10.jpg" alt="">
                        </div>
                        <div class="usp-img1-text">
                            <p class="content">name</p>
                        </div>
                    </div>
                    <hr class="ph">
                    <div class="usp-img1">
                        <div class="usp-img1-img">
                            <img class="img4" src="/img/Rectangle 11.jpg" alt="">
                        </div>
                        <div class="usp-img1-text">
                            <p class="content">name</p>
                        </div>
                    </div>
                    <hr class="ph">
                    <div class="usp-img1">
                        <div class="usp-img1-img">
                            <img class="img5" src="/img/Rectangle 12.jpg" alt="">
                        </div>
                        <div class="usp-img1-text">
                            <p class="content">name</p>
                        </div>
                    </div>
                    <hr class="ph">
                </div>
                <div class="usp-row">
                    <div class="usp-img1">
                        <div class="usp-img1-img">
                            <img class="img3" src="/img/Rectangle 10.jpg" alt="">
                        </div>
                        <div class="usp-img1-text">
                            <p class="content">name</p>
                        </div>
                    </div>
                    <hr class="ph">
                    <div class="usp-img1">
                        <div class="usp-img1-img">
                            <img class="img4" src="/img/Rectangle 11.jpg" alt="">
                        </div>
                        <div class="usp-img1-text">
                            <p class="content">name</p>
                        </div>
                    </div>
                    <hr class="ph">
                    <div class="usp-img1">
                        <div class="usp-img1-img">
                            <img class="img5" src="/img/Rectangle 12.jpg" alt="">
                        </div>
                        <div class="usp-img1-text">
                            <p class="content">name</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="substances ph">
            <div class="second-content">
                <div class="substance-text">
                    <h2 class="Second-Titlecontent PH-Second-Titlecontent">112年忠貞社區共生共學</h2>
                    <h4 class="Last PH-Last"style="color: rgba(0, 0, 0, 0.6);">2023/11/29</h4>
                </div>
                <div class="content-img">
                    <img src="../img/new-img2.png" id="w" alt="">
                </div>

            </div>
            <hr>

            <div class="second-content">
                <div class="substance-text">
                    <h2 class="Second-Titlecontent PH-Second-Titlecontent">112年忠貞社區共生共學</h2>
                    <h4 class="Last PH-Last"style="color: rgba(0, 0, 0, 0.6);">2023/11/29</h4>
                </div>
                <div class="content-img">
                    <img src="../img/new-img2.png" id="w" alt="">
                </div>

            </div>
            <hr>

            <div class="second-content">
                <div class="substance-text">
                    <h2 class="Second-Titlecontent PH-Second-Titlecontent">112年忠貞社區共生共學</h2>
                    <h4 class="Last PH-Last"style="color: rgba(0, 0, 0, 0.6);">2023/11/29</h4>
                </div>
                <div class="content-img">
                    <img src="../img/new-img2.png" id="w" alt="">
                </div>

            </div>
        </div>
    @endsection
