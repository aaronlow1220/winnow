@extends('layout/layout')

@section('page-title', '忠貞社區發展協會')

@push('top-link')
    <link rel="stylesheet" href="{{ asset('assets/css/ph.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/first-css/food.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/first-css/form1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/first-css/music.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/first-css/visit.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/first-css/lin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/btn.css') }}">
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
@endpush

@section('top')
    <div class="handle">
        <!-- <div id="icon-bar"></div>  -->

        <header>
            <div class="main-content">
                <div class="image-area">
                    <!-- 圖片內容 -->
                    <img id="main_image" src="{{ asset('assets/img/main_img.png') }}" alt="main_img" />
                </div>
                <div class="text-area">
                    <h2 class="HeadLine PH-HeadLine body1">夢想忠貞</h2>
                    <p class="Main-Titlecontent PH-Main-Titleconten text-secondary">
                        陪伴身邊需要愛與關懷的孩子，<br />
                        建構社區關懷系統改變家鄉孩子軌跡。
                    </p>
                    <!-- 文字內容 -->
                </div>
            </div>
            <div id="down">
                <img src="{{ asset('assets/img/scrollArrow.gif') }}" alt="" />
                <p>向下滑動</p>
            </div>
        </header>
    @endsection

    @section('main-content')
        <div class="ALL">
            <div class="New PC">
                <div class="new-text name_center">
                    <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_876_4077" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                            width="54" height="54">
                            <rect width="54" height="54" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_876_4077)">
                            <path
                                d="M10.125 42.4903V39.9375H14.1924V22.1668C14.1924 19.1202 15.1169 16.4036 16.9659 14.0168C18.8149 11.6299 21.2221 10.1538 24.1875 9.58843V5.625H29.8124V9.58843C32.7778 10.1538 35.185 11.6299 37.0341 14.0168C38.8831 16.4036 39.8076 19.1202 39.8076 22.1668V39.9375H43.8749V42.4903H10.125ZM27 48.8076C25.8779 48.8076 24.9195 48.4102 24.1248 47.6155C23.3301 46.8208 22.9327 45.8624 22.9327 44.7403H31.0672C31.0672 45.8624 30.6699 46.8208 29.8752 47.6155C29.0805 48.4102 28.1221 48.8076 27 48.8076ZM16.7451 39.9375H37.2548V22.1668C37.2548 19.3254 36.256 16.9059 34.2584 14.9083C32.2608 12.9107 29.8413 11.912 27 11.912C24.1586 11.912 21.7392 12.9107 19.7415 14.9083C17.7439 16.9059 16.7451 19.3254 16.7451 22.1668V39.9375ZM7.52887 22.0543C7.52887 19.011 8.1707 16.2022 9.45436 13.6276C10.738 11.0531 12.4702 8.87168 14.6509 7.08323L16.2864 9.04759C14.392 10.6208 12.8843 12.5205 11.7633 14.7468C10.6422 16.9731 10.0817 19.4089 10.0817 22.0543H7.52887ZM43.9182 22.0543C43.9182 19.4149 43.3577 16.9773 42.2367 14.7416C41.1157 12.5058 39.6079 10.6006 37.7135 9.02593L39.349 7.08323C41.5298 8.87168 43.262 11.0527 44.5456 13.6264C45.8293 16.2001 46.4711 19.0094 46.4711 22.0543H43.9182Z"
                                fill="black" fill-opacity="0.88" />
                        </g>
                    </svg>
                    <h1 class="SecondLine PH-SecondLine">最新消息</h1>
                </div>
                <div class="News">
                    <div class="image-area2">
                        <img src="../img/new-img1.png" id="news_image" alt="" />
                        <div class="news-textbox">
                            <h2 class="Main-Titlecontent PH-Main-Titlecontent">忠貞仙樂飄飄 手碟音樂表演</h2>
                            <h5 class="content PH-content">莫約民國43年期間隨國民兵一路南撤到台灣的馬家， 原世居山明水秀雲南，來到台灣落地生根。</h5>
                            <h5 class="Last PH-Last">2023/11/29</h5>
                        </div>
                    </div>

                    <div class="substances">
                        <div class="second-content">
                            <div class="content-img">
                                <img src="../img/new-img2.png" id="w" alt="" />
                            </div>
                            <div class="substance-text">
                                <h2 class="Second-Titlecontent PH-Second-Titlecontent">112年忠貞社區共生共學</h2>
                                <h4 class="Last PH-Last" style="color: rgba(0, 0, 0, 0.6)">2023/11/29</h4>
                            </div>
                        </div>
                        <hr />

                        <div class="second-content">
                            <div class="content-img">
                                <img src="../img/new-img2.png" id="w" alt="" />
                            </div>
                            <div class="substance-text">
                                <h2 class="Second-Titlecontent PH-Second-Titlecontent">112年忠貞社區共生共學</h2>
                                <h4 class="Last PH-Last" style="color: rgba(0, 0, 0, 0.6)">2023/11/29</h4>
                            </div>
                        </div>
                        <hr />

                        <div class="second-content">
                            <div class="content-img">
                                <img src="../img/new-img2.png" id="w" alt="" />
                            </div>
                            <div class="substance-text">
                                <h2 class="Second-Titlecontent PH-Second-Titlecontent">112年忠貞社區共生共學</h2>
                                <h4 class="Last PH-Last" style="color: rgba(0, 0, 0, 0.6)">2023/11/29</h4>
                            </div>
                        </div>
                        <hr />
                        <div class="s">
                            <button class="LG_button"><a style="color: rgb(255, 255, 255); text-decoration: none"
                                    href="">了解更多 ></a></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ph-size">
                <div class="ph-new-text name_center">
                    <h1 class="SecondLine PH-SecondLine">最<br />新<br />消<br />息</h1>
                </div>
            </div>

            <div class="New PH">
                <div class="News">
                    <div class="image-area2">
                        <div class="news-image">
                            <img src="../img/new-img1.png" id="news_image" alt="" />
                        </div>
                        <div class="news-text">
                            <h2 class="Main-Titlecontent PH-Main-Titlecontent">忠貞仙樂飄飄 手碟音樂表演</h2>
                            <h5 class="content PH-content">3/15 - 6/28 14:00 - 15:30</h5>
                            <h5 class="Last PH-Last">遠雄龍岡社區大廳</h5>
                            <h5 class="Last PH-Last">FREE</h5>
                        </div>
                    </div>

                    <div class="substances">
                        <hr />
                        <div class="second-content">
                            <div class="substance-text">
                                <h2 class="Second-Titlecontent PH-Second-Titlecontent">112年忠貞社區共生共學</h2>
                                <h4 class="Last PH-Last" style="color: rgba(0, 0, 0, 0.6)">2023/11/29</h4>
                            </div>
                            <div class="content-img">
                                <img src="../img/new-img2.png" id="w" alt="" />
                            </div>
                        </div>
                        <hr />

                        <div class="second-content">
                            <div class="substance-text">
                                <h2 class="Second-Titlecontent PH-Second-Titlecontent">112年忠貞社區共生共學</h2>
                                <h4 class="Last PH-Last" style="color: rgba(0, 0, 0, 0.6)">2023/11/29</h4>
                            </div>
                            <div class="content-img">
                                <img src="../img/new-img2.png" id="w" alt="" />
                            </div>
                        </div>
                        <hr />

                        <div class="second-content">
                            <div class="substance-text">
                                <h2 class="Second-Titlecontent PH-Second-Titlecontent">112年忠貞社區共生共學</h2>
                                <h4 class="Last PH-Last" style="color: rgba(0, 0, 0, 0.6)">2023/11/29</h4>
                            </div>
                            <div class="content-img">
                                <img src="../img/new-img2.png" id="w" alt="" />
                            </div>
                        </div>
                        <hr />
                        <div class="s">
                            <button class="LG_button"><a style="color: rgb(255, 255, 255); text-decoration: none"
                                    href="">了解更多 ></a></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ph-size">
                <div class="ph-new-text name_center">
                    <h1 class="SecondLine PH-SecondLine">迷<br />香<br />忠<br />貞</h1>
                </div>
            </div>

            <div class="food">
                <div class="food-text PC name_center">
                    <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_876_4099" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                            width="54" height="54">
                            <rect width="54" height="54" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_876_4099)">
                            <path
                                d="M16.5289 48.9374V28.3889C14.6654 28.0918 13.0818 27.2192 11.778 25.7711C10.4741 24.323 9.82214 22.5692 9.82214 20.5096V5.0625H12.375V20.5096H16.5289V5.0625H19.0817V20.5096H23.214V5.0625H25.7668V20.5096C25.7668 22.5692 25.1149 24.323 23.811 25.7711C22.5072 27.2192 20.9307 28.0918 19.0817 28.3889V48.9374L16.5289 48.9374ZM38.7692 48.9374V30.9374H32.8413V14.7115C32.8413 12.0231 33.5971 9.78966 35.1086 8.0113C36.6201 6.23293 38.6913 5.26442 41.322 5.10576V48.9374H38.7692Z"
                                fill="black" fill-opacity="0.88" />
                        </g>
                    </svg>
                    <h1 class="SecondLine PH-SecondLine">忠貞美食</h1>
                </div>

                <div class="fd-gap">
                    <div class="food-content">
                        <div class="showimage">
                            <img id="displayedImage" src="" alt="displayed-img" />
                        </div>
                        <div class="text-area2">
                            <p id="imageText"></p>
                            <button class="LG_button foodbtn" style=""><a
                                    style="color: rgb(255, 255, 255); text-decoration: none" href="">減肥明天的事
                                    ></a></button>

                            <div class="ph-foodbtn">
                                <button id="prev-slide2" class="slide-button material-symbols-rounded">
                                    <img class="left" src="{{ asset('assets/img/arrow-left.svg') }}" alt="" />
                                </button>
                                <button class="LG_button" style=""><a
                                        style="color: rgb(255, 255, 255); text-decoration: none" href="">減肥明天的事
                                        ></a></button>
                                <button id="next-slide2" class="slide-button material-symbols-rounded">
                                    <img class="right" src="{{ asset('assets/img/arrow-right.svg') }}" alt="" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="slider-wrapper">
                            <button id="prev-slide" class="slide-button material-symbols-rounded">
                                <img class="left" src="{{ asset('assets/img/arrow-left.svg') }}" alt="" />
                            </button>
                            <ul class="image-list">
                                <div class="foodscrollbar-content">
                                    <img class="image-item" src="../img/food-img2.png" alt="img-1" />
                                    <p class="Last">名稱</p>
                                </div>
                                <div class="foodscrollbar-content">
                                    <img class="image-item" src="../img/food-img1.png" alt="img-2" />
                                    <p class="Last">名稱</p>
                                </div>
                                <div class="foodscrollbar-content">
                                    <img class="image-item" src="../img/food-img3.png" alt="img-3" />
                                    <p class="Last">名稱</p>
                                </div>
                                <div class="foodscrollbar-content">
                                    <img class="image-item" src="../img/food-img2.png" alt="img-4" />
                                    <p class="Last">名稱</p>
                                </div>
                                <div class="foodscrollbar-content">
                                    <img class="image-item" src="../img/food-img3.png" alt="img-5" />
                                    <p class="Last">名稱</p>
                                </div>
                                <div class="foodscrollbar-content">
                                    <img class="image-item" src="../img/food-img1.png" alt="img-6" />
                                    <p class="Last">名稱</p>
                                </div>
                                <div class="foodscrollbar-content">
                                    <img class="image-item" src="../img/food-img2.png" alt="img-7" />
                                    <p class="Last">名稱</p>
                                </div>
                                <div class="foodscrollbar-content">
                                    <img class="image-item" src="../img/food-img1.png" alt="img-8" />
                                    <p class="Last">名稱</p>
                                </div>
                                <div class="foodscrollbar-content">
                                    <img class="image-item" src="../img/food-img3.png" alt="img-9" />
                                    <p class="Last">名稱</p>
                                </div>
                            </ul>
                            <button id="next-slide" class="slide-button material-symbols-rounded">
                                <img class="right" src="{{ asset('assets/img/arrow-right.svg') }}" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="music PC">
                <div class="music-text">
                    <div class="music-svg name_right">
                        <svg width="54" height="55" viewBox="0 0 54 55" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_1218_7930" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                width="54" height="55">
                                <rect y="0.5" width="54" height="54" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_1218_7930)">
                                <path
                                    d="M35.8828 44.3749C34.259 44.3749 32.8766 43.8076 31.7358 42.6732C30.5949 41.5387 30.0245 40.1611 30.0245 38.5404C30.0245 36.9077 30.5823 35.5213 31.6979 34.381C32.8135 33.2407 34.1682 32.6706 35.762 32.6706C36.3915 32.6706 36.9923 32.7593 37.5646 32.9367C38.1369 33.1141 38.674 33.363 39.1759 33.6832V15.125H48.3749V18.6428H41.7287V38.5898C41.7287 40.1968 41.1604 41.5627 40.0237 42.6876C38.887 43.8124 37.5067 44.3749 35.8828 44.3749ZM7.875 35.1152V32.5624H24.2221V35.1152H7.875ZM7.875 26.3965V23.8437H33.2264V26.3965H7.875ZM7.875 17.6779V15.125H33.2264V17.6779H7.875Z"
                                    fill="#1C1B1F" />
                            </g>
                        </svg>
                        <h1 class="SecondLine PH-SecondLine">音樂之門</h1>
                    </div>
                    <div>
                        <h3 class="content PH-content" style="width: 519px">2020年底由來自英國的手碟品牌Novapans Handpans David Wexler
                            及 Gina Chen 帶著手碟到忠貞社區與 孩子們分享，開啟國內兒童手碟音樂之門。</h3>
                    </div>
                    <div class="doremi-btn">
                        <button class="LG_button">
                            <a style="color: rgb(255, 255, 255); text-decoration: none" href="">Do Re Mi ></a>
                        </button>
                    </div>
                </div>

                <div class="image-area4">
                    <img src="../img/food-img1.png" id="music-img" alt="" />
                </div>
            </div>

            <div class="Way PC">
                <div class="way-content name_center">
                    <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_1326_13677" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                            width="54" height="54">
                            <rect width="54" height="54" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_1326_13677)">
                            <path
                                d="M27 48.9374C23.1981 48.9374 20.0914 48.3959 17.6798 47.3127C15.2683 46.2295 14.0625 44.8456 14.0625 43.161C14.0625 42.2927 14.4606 41.4555 15.2567 40.6492C16.0529 39.843 17.1562 39.173 18.5668 38.6394L19.3197 41.1014C18.6475 41.361 18.0764 41.674 17.6062 42.0403C17.136 42.4067 16.787 42.7802 16.5591 43.161C17.0524 44.0841 18.3057 44.8521 20.3192 45.4651C22.3326 46.0781 24.5596 46.3846 27 46.3846C29.426 46.3846 31.6551 46.0781 33.6873 45.4651C35.7195 44.8521 36.9822 44.0841 37.4755 43.161C37.262 42.8177 36.9224 42.4629 36.4565 42.0965C35.9906 41.7302 35.4101 41.3985 34.7149 41.1014L35.4548 38.6394C36.8509 39.173 37.9471 39.843 38.7432 40.6492C39.5394 41.4555 39.9374 42.2927 39.9374 43.161C39.9374 44.8456 38.7317 46.2295 36.3202 47.3127C33.9086 48.3958 30.8019 48.9374 27 48.9374ZM27 37.7957C27.7625 36.3476 28.6087 34.9529 29.5385 33.6115C30.4683 32.2701 31.4077 30.998 32.3567 29.7951C33.9634 27.7153 35.2377 25.8923 36.1796 24.3259C37.1214 22.7595 37.5923 20.7187 37.5923 18.2035C37.5923 15.2766 36.5613 12.7802 34.4995 10.7142C32.4376 8.64827 29.9338 7.61529 26.9879 7.61529C24.0421 7.61529 21.5423 8.64827 19.4884 10.7142C17.4346 12.7802 16.4077 15.2766 16.4077 18.2035C16.4077 20.7187 16.8786 22.7595 17.8204 24.3259C18.7622 25.8923 20.0365 27.7153 21.6432 29.7951C22.5923 30.998 23.5317 32.2701 24.4615 33.6115C25.3913 34.9529 26.2375 36.3476 27 37.7957ZM27 42.0662C26.6077 42.0662 26.2536 41.9428 25.9378 41.6962C25.6219 41.4494 25.3962 41.1257 25.2606 40.7248C24.3029 38.146 23.1739 36.0035 21.8736 34.2972C20.5734 32.591 19.3298 30.9561 18.1428 29.3927C16.9399 27.8436 15.9245 26.2218 15.0966 24.5271C14.2688 22.8324 13.8549 20.7251 13.8549 18.2053C13.8549 14.5319 15.1236 11.4231 17.661 8.87884C20.1985 6.33461 23.3114 5.0625 27 5.0625C30.6885 5.0625 33.8015 6.33122 36.3389 8.86866C38.8764 11.4061 40.1451 14.5191 40.1451 18.2076C40.1451 20.7259 39.7335 22.8294 38.9104 24.5181C38.0873 26.2068 37.0768 27.8317 35.8788 29.3927C34.6759 30.9561 33.4247 32.591 32.1252 34.2972C30.8257 36.0035 29.6998 38.141 28.7477 40.7098C28.6066 41.1035 28.3781 41.428 28.0622 41.6833C27.7463 41.9385 27.3923 42.0662 27 42.0662ZM27.0117 21.3014C27.8548 21.3014 28.5793 20.9982 29.1851 20.3918C29.7908 19.7854 30.0937 19.0535 30.0937 18.1959C30.0937 17.3528 29.7869 16.6319 29.1734 16.0334C28.5598 15.4348 27.8314 15.1355 26.9883 15.1355C26.1451 15.1355 25.4243 15.4387 24.8257 16.0451C24.2272 16.6515 23.9279 17.3762 23.9279 18.2193C23.9279 19.0769 24.2311 19.805 24.8374 20.4035C25.4438 21.0021 26.1686 21.3014 27.0117 21.3014Z"
                                fill="#1C1B1F" />
                        </g>
                    </svg>
                    <h1 class="SecondLine PH-SecondLine">忠貞景點</h1>
                </div>

                <div class="visit">
                    <div class="visit_container">
                        <div class="visit-img">
                            <img src="../img/view-img1.png" id="w" alt="" />
                        </div>
                        <div class="substance-text2">
                            <h2 class="Second-Titlecontent PH-Second-Titlecontent">雲南公園</h2>
                            <h4>2013年啓用，占地0.2公頃，設有藏族轉經輪、景頗族目瑙縱歌祈福柱等，富含雲南文化特色的設施，為「雲南文化｣為主題的特色公園。</h4>
                        </div>
                    </div>

                    <div class="visit_container">
                        <div class="visit-img">
                            <img src="../img/view-img2.png" id="w" alt="" />
                        </div>
                        <div class="substance-text2">
                            <h2 class="Second-Titlecontent PH-Second-Titlecontent">龍岡清真寺</h2>
                            <h4>源約於1950年代中期泰緬邊境撤台，其中不少信奉伊斯蘭的穆斯林信徒，1964年回教協會募捐修建，1989和2022年整修成為今日的樣貌。</h4>
                        </div>
                    </div>

                    <div class="visit_container">
                        <div class="visit-img">
                            <img src="../img/view-img3.png" id="w" alt="" />
                        </div>
                        <div class="substance-text2">
                            <h2 class="Second-Titlecontent PH-Second-Titlecontent">忠貞市場</h2>
                            <h4>2013年啓用，占地0.2公頃，設有藏族轉經輪、景頗族目瑙縱歌祈福柱等，富含雲南文化特色的設施，為「雲南文化｣為主題的特色公園。</h4>
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center">
                    <button class="LG_button"><a style="color: rgb(255, 255, 255); text-decoration: none"
                            href="">深入探索 ></a></button>
                </div>
            </div>

            <div class="forzhongzhen PC">
                <div class="for-text">
                    <div class="for-svg name_right" id="">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_911_2557" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                width="56" height="56">
                                <rect width="56" height="56" fill="#D9D9D9" />
                            </mask>
                            <g mask="url(#mask0_911_2557)">
                                <path
                                    d="M18.9718 45.2307C18.2696 45.2307 17.6528 44.965 17.1215 44.4337C16.5901 43.9023 16.3245 43.2855 16.3245 42.5833V37.6026H23.2437V29.6109C21.721 29.8622 20.1759 29.759 18.6084 29.3013C17.0409 28.8436 15.6962 28.0659 14.5744 26.968V23.45H11.3885L4.30774 16.3468C5.67783 15.1892 7.26405 14.2372 9.0664 13.4908C10.8687 12.7444 12.7137 12.3712 14.6013 12.3712C15.9607 12.3712 17.4231 12.5933 18.9885 13.0376C20.5539 13.4818 21.9723 14.1871 23.2437 15.1533V10.5898H47.8333V40.0256C47.8333 41.4824 47.33 42.7141 46.3233 43.7208C45.3167 44.7274 44.0925 45.2307 42.6507 45.2307H18.9718ZM25.891 37.6026H40.0929V40.0256C40.0929 40.7735 40.3322 41.3867 40.8109 41.8654C41.2895 42.344 41.9028 42.5833 42.6507 42.5833C43.3835 42.5833 43.9893 42.344 44.4679 41.8654C44.9465 41.3867 45.1859 40.7735 45.1859 40.0256V13.2372H25.891V17.2129L39.3436 30.6654V32.5679H37.441L30.0462 25.1955L28.7628 26.5865C28.3021 27.1101 27.8452 27.5162 27.392 27.8048C26.9388 28.0935 26.4385 28.3665 25.891 28.6237V37.6026ZM12.582 20.8026H17.2217V25.7026C17.9726 26.1902 18.6988 26.5447 19.4003 26.7661C20.1018 26.9874 20.7936 27.0981 21.4758 27.0981C22.5018 27.0981 23.5203 26.8431 24.5314 26.3331C25.5426 25.8231 26.3263 25.2659 26.8827 24.6616L28.1436 23.293L23.9167 19.066C22.642 17.7767 21.212 16.7798 19.6267 16.0753C18.0414 15.3709 16.3663 15.0186 14.6013 15.0186C13.4466 15.0186 12.3666 15.1749 11.3615 15.4875C10.3564 15.8001 9.39909 16.2003 8.48971 16.6879L12.582 20.8026ZM37.4456 40.25H18.9718V42.5833H38.3071C38.0438 42.335 37.8345 42.0043 37.6789 41.5912C37.5233 41.178 37.4456 40.7309 37.4456 40.25Z"
                                    fill="black" fill-opacity="0.88" />
                            </g>
                        </svg>
                        <h1 id="Main-Titlecontent PH-Main-Titlecontent">關於忠貞</h1>
                    </div>
                    <div>
                        <h2 class="Second-Titlecontent PH-Second-Titlecontent"
                            style="color: rgba(0, 0, 0, 0.6); letter-spacing: 0.5px; line-height: 70px">
                            社區凝聚，<br />
                            地方創生，<br />
                            促進產業發展。
                        </h2>
                    </div>
                    <div>
                        <button class="LG_button"><a style="color: rgb(255, 255, 255); text-decoration: none"
                                href="">了解更多 ></a></button>
                    </div>
                </div>

                <div class="image-area5">
                    <img class="way-img" src="../img/view-img3.png" id="" alt="" />
                </div>
            </div>

            <div class="ph-size PH">
                <div class="ph-new-text name_center">
                    <h1 class="SecondLine PH-SecondLine">夢<br />想<br />忠<br />貞</h1>
                </div>
            </div>
            <div class="music PH ph-size">
                <div class="text-box">
                    <div class="music-text">
                        <div class="music-textbox">
                            <div class="music-svg" id="name_right">
                                <svg width="54" height="55" viewBox="0 0 54 55" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_1218_7930" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0"
                                        y="0" width="54" height="55">
                                        <rect y="0.5" width="54" height="54" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_1218_7930)">
                                        <path
                                            d="M35.8828 44.3749C34.259 44.3749 32.8766 43.8076 31.7358 42.6732C30.5949 41.5387 30.0245 40.1611 30.0245 38.5404C30.0245 36.9077 30.5823 35.5213 31.6979 34.381C32.8135 33.2407 34.1682 32.6706 35.762 32.6706C36.3915 32.6706 36.9923 32.7593 37.5646 32.9367C38.1369 33.1141 38.674 33.363 39.1759 33.6832V15.125H48.3749V18.6428H41.7287V38.5898C41.7287 40.1968 41.1604 41.5627 40.0237 42.6876C38.887 43.8124 37.5067 44.3749 35.8828 44.3749ZM7.875 35.1152V32.5624H24.2221V35.1152H7.875ZM7.875 26.3965V23.8437H33.2264V26.3965H7.875ZM7.875 17.6779V15.125H33.2264V17.6779H7.875Z"
                                            fill="#1C1B1F" />
                                    </g>
                                </svg>
                                <h1 class="SecondLine PH-SecondLine">音樂之門</h1>
                            </div>
                            <div>
                                <h3 class="content PH-content music-textcontent">2020年底由來自英國的手碟品牌Novapans Handpans David
                                    Wexler 及 Gina Chen 帶著手碟到忠貞社區與 孩子們分享，開啟國內兒童手碟音樂之門。</h3>
                            </div>
                        </div>

                        <div class="doremi-btn">
                            <button class="LG_button">
                                <a style="color: rgb(255, 255, 255); text-decoration: none" href="">Do Re Mi ></a>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="image-area4">
                    <img src="../img/food-img1.png" id="music-img" alt="" />
                </div>
            </div>

            <div class="ph-size PH">
                <div class="ph-new-text name_center">
                    <h1 class="SecondLine PH-SecondLine">忠<br />貞<br />景<br />點</h1>
                </div>
            </div>
            <div class="Way PH">
                <div class="visit">
                    <div class="visit_container">
                        <div class="visit-img">
                            <img src="../img/view-img1.png" id="r" alt="" />
                        </div>
                        <div class="substance-text2">
                            <h2 class="SecondLine PH-SecondLine">雲南公園</h2>
                            <h4 class="content">2013年啓用，占地0.2公頃，設有藏族轉經輪、景頗族目瑙縱歌祈福柱等，富含雲南文化特色的設施，為「雲南文化｣為主題的特色公園。</h4>
                        </div>
                    </div>

                    <div class="visit_container">
                        <div class="visit-img">
                            <img src="../img/view-img2.png" id="r" alt="" />
                        </div>
                        <div class="substance-text2">
                            <h2 class="SecondLine PH-SecondLine">龍岡清真寺</h2>
                            <h4 class="content">源約於1950年代中期泰緬邊境撤台，其中不少信奉伊斯蘭的穆斯林信徒，1964年回教協會募捐修建，1989和2022年整修成為今日的樣貌。</h4>
                        </div>
                    </div>

                    <div class="visit_container">
                        <div class="visit-img">
                            <img src="../img/view-img3.png" id="r" alt="" />
                        </div>
                        <div class="substance-text2">
                            <h2 class="SecondLine PH-SecondLine">忠貞市場</h2>
                            <h4 class="content">2013年啓用，占地0.2公頃，設有藏族轉經輪、景頗族目瑙縱歌祈福柱等，富含雲南文化特色的設施，為「雲南文化｣為主題的特色公園。</h4>
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content: center">
                    <button class="LG_button"><a style="color: rgb(255, 255, 255); text-decoration: none"
                            href="">深入探索 ></a></button>
                </div>
            </div>

            <div class="ph-size PH">
                <div class="ph-new-text name_center">
                    <h1 class="SecondLine PH-SecondLine">關<br />於<br />忠<br />貞</h1>
                </div>
            </div>

            <div class="forzhongzhen PH ph-size">
                <div class="for-text">
                    <div class="for-textbox">
                        <p class="Second-Titlecontent PH-Second-Titlecontent">
                            忠貞社區發展協會為非以營利為目的之社會團體，以促進社區發展，增進社區凝聚力，推展福利社區化，建立社區照顧服務體系為宗旨。</p>
                        <p class="Second-Titlecontent">
                            透過導覽活動規劃與推廣，利用在地現有之資源，建構符合市場需求形態之導覽活動，以吸引遊客到訪，促進地方產業發展。並在活動中培訓在地或對地方創生產業之人員，成為市場地方創生之生力軍。</p>
                    </div>
                    <div>
                        <button class="LG_button">了解更多 ></button>
                    </div>
                </div>

                <div class="image-area5">
                    <img class="for-img" src="../img/view-img3.png" id="" alt="" />
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/foodmap.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            let hamburger =  document.querySelector("#hamburger");
            hamburger.addEventListener('click', function(){
                hamburger.scrollIntoView( { behavior: "smooth"});
            });
        });
    </script>
@endsection
