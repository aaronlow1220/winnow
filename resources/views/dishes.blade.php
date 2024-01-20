@extends('layout/layout')

@section('page-title', '迷香忠貞')

@section('main-content')
    <main>
        <div class="sub-main">
            <h3 id="page_title">迷香忠貞</h3>

            <div class="tabs">
                <button class="tab-button active-tab" onclick="openTab(event, 'tab1')">雲南</button>
                <button class="tab-button" onclick="openTab(event, 'tab2')">眷村</button>
                <button class="tab-button" onclick="openTab(event, 'tab3')">新住民</button>
                <button class="tab-button" onclick="openTab(event, 'tab4')">穆斯林</button>
            </div>

            <div class="a">
                <div class="article">
                    <div id="tab1" class="tab-content">
                        <img src="../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="" />
                        <div class="row-column">
                            <h3 class="title">雲南米干線</h3>
                            {{-- <div class="date">2023/12/10</div> --}}
                        </div>
                        <div class="content body1">
                            米干，外形酷似似粄條，但口感與香氣截然不同。米干口感綿滑而米香味強烈，粄條則有彈性而米香味較淡。粄條在台灣各地幾乎都可以吃得到，這種客家人將在來米磨成漿蒸熟再切成條狀的食品，在台灣主要可分為「北新埔、南美濃」兩派，其中多以純米漿製成、吃起來滑嫩而容易斷的是新竹新埔粄條，會混合太白粉或番薯粉，口感較有嚼勁的則是高雄美濃粄條。<br /><br />而米干則源自雲南。普洱稱之為「米干」，昆明叫它「卷粉」，廣東人則稱為「腸粉」，也是以在來米漿蒸製而成。不過，台灣賣米干的地方，多集中在桃園龍岡的忠貞新村這個前眷村所在地，而其原因，是因為這裡是1954年第一批撤退來台的泰緬孤軍興建的眷村之一。
                            米干，外形酷似似粄條，但口感與香氣截然不同。米干口感綿滑而米香味強烈，粄條則有彈性而米香味較淡。粄條在台灣各地幾乎都可以吃得到，這種客家人將在來米磨成漿蒸熟再切成條狀的食品，在台灣主要可分為「北新埔、南美濃」兩派，其中多以純米漿製成、吃起來滑嫩而容易斷的是新竹新埔粄條，會混合太白粉或番薯粉，口感較有嚼勁的則是高雄美濃粄條。<br /><br />而米干則源自雲南。普洱稱之為「米干」，昆明叫它「卷粉」，廣東人則稱為「腸粉」，也是以在來米漿蒸製而成。不過，台灣賣米干的地方，多集中在桃園龍岡的忠貞新村這個前眷村所在地，而其原因，是因為這裡是1954年第一批撤退來台的泰緬孤軍興建的眷村之一。
                            米干，外形酷似似粄條，但口感與香氣截然不同。米干口感綿滑而米香味強烈，粄條則有彈性而米香味較淡。粄條在台灣各地幾乎都可以吃得到，這種客家人將在來米磨成漿蒸熟再切成條狀的食品，在台灣主要可分為「北新埔、南美濃」兩派，其中多以純米漿製成、吃起來滑嫩而容易斷的是新竹新埔粄條，會混合太白粉或番薯粉，口感較有嚼勁的則是高雄美濃粄條。<br /><br />而米干則源自雲南。普洱稱之為「米干」，昆明叫它「卷粉」，廣東人則稱為「腸粉」，也是以在來米漿蒸製而成。不過，台灣賣米干的地方，多集中在桃園龍岡的忠貞新村這個前眷村所在地，而其原因，是因為這裡是1954年第一批撤退來台的泰緬孤軍興建的眷村之一。
                            米干，外形酷似似粄條，但口感與香氣截然不同。米干口感綿滑而米香味強烈，粄條則有彈性而米香味較淡。粄條在台灣各地幾乎都可以吃得到，這種客家人將在來米磨成漿蒸熟再切成條狀的食品，在台灣主要可分為「北新埔、南美濃」兩派，其中多以純米漿製成、吃起來滑嫩而容易斷的是新竹新埔粄條，會混合太白粉或番薯粉，口感較有嚼勁的則是高雄美濃粄條。<br /><br />而米干則源自雲南。普洱稱之為「米干」，昆明叫它「卷粉」，廣東人則稱為「腸粉」，也是以在來米漿蒸製而成。不過，台灣賣米干的地方，多集中在桃園龍岡的忠貞新村這個前眷村所在地，而其原因，是因為這裡是1954年第一批撤退來台的泰緬孤軍興建的眷村之一。
                        </div>
                    </div>

                    <div id="tab2" class="tab-content">
                        <h3>眷村</h3>
                        <p>這裡是 Tab 2 的內容。</p>
                    </div>

                    <div id="tab3" class="tab-content">
                        <h3>新住民</h3>
                        <p>這裡是 Tab 3 的內容。</p>
                    </div>
                    <div id="tab4" class="tab-content">
                        <h3>穆斯林</h3>
                        <p>這裡是 Tab 4 的內容。</p>
                    </div>
                </div>

                <div class="card-container">
                    <a class="card" href="article1.html">
                        <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南過橋米線</div>
                                <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/破酥包.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南破酥包</div>
                                <p>破酥包外皮經發酵、桿薄、抹油多層次的堆疊再包餡...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/牛干巴.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南牛干巴</div>
                                <p>大块牛後腿腌制作，以自家口味加花椒、辣椒粉、五...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/椒麻雞.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南椒麻雞</div>
                                <p>雲南風味美食，在忠貞以雲南風味的椒麻雞為主，香...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/豌豆粉.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南豌豆粉</div>
                                <p>雲南風味美食，由豌豆磨粉製作有4種吃法...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/大薄片.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">大薄片</div>
                                <p>雲南風味美食，五花肉川燙放涼切薄片，佐以...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/胡椒蔥餅.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">眷村胡椒蔥餅</div>
                                <p>眷村風味美味，忠貞市場低調美食...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/紫米粑粑.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南黑糯米粑粑</div>
                                <p>雲南風味美食，炸黑糯米外表焦香酥脆軟中帶Q...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南過橋米線</div>
                                <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南過橋米線</div>
                                <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南過橋米線</div>
                                <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南過橋米線</div>
                                <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                    <div class="divider"></div>
                    <a class="card" href="article1.html">
                        <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
                        <div class="flex-column">
                            <div>
                                <div class="card_tittle">雲南過橋米線</div>
                                <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上...</p>
                            </div>
                            <div class="date">2023/12/10</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
