@extends('layout/layout')

@section('page-title', $cat->name)

@push('category')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}" />
    <script src="{{ asset('assets/js/category.js') }}" defer></script>
@endpush

@section('main-content')
<main>
    <div id="sub-main">
      <h3 id="page_title">{{ $cat->name }}</h3>

      <div class="tabs">
        @foreach ($subCat as $sub)
                    <button @if ($loop->iteration === 1) class="tab-button active-tab" @else class="tab-button" @endif
                        onclick="openTab(event, 'tab{{ $loop->iteration }}')">{{ $sub->name }}</button>
                @endforeach
      </div>

      <div>
        <div id="tab1" class="tab-content">
          <div class="article">
            <img src="../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="" />
            <div class="row-column">
              <h3 class="title">雲南米干線</h3>
              <!-- <div class="date">2023/12/10</div> -->
            </div>
            <div class="content body1">
              米干，外形酷似似粄條，但口感與香氣截然不同。米干口感綿滑而米香味強烈，粄條則有彈性而米香味較淡。粄條在台灣各地幾乎都可以吃得到，這種客家人將在來米磨成漿蒸熟再切成條狀的食品，在台灣主要可分為「北新埔、南美濃」兩派，其中多以純米漿製成、吃起來滑嫩而容易斷的是新竹新埔粄條，會混合太白粉或番薯粉，口感較有嚼勁的則是高雄美濃粄條。<br /><br />而米干則源自雲南。普洱稱之為「米干」，昆明叫它「卷粉」，廣東人則稱為「腸粉」，也是以在來米漿蒸製而成。不過，台灣賣米干的地方，多集中在桃園龍岡的忠貞新村這個前眷村所在地，而其原因，是因為這裡是1954年第一批撤退來台的泰緬孤軍興建的眷村之一。
              米干，外形酷似似粄條，但口感與香氣截然不同。米干口感綿滑而米香味強烈，粄條則有彈性而米香味較淡。粄條在台灣各地幾乎都可以吃得到，這種客家人將在來米磨成漿蒸熟再切成條狀的食品，在台灣主要可分為「北新埔、南美濃」兩派，其中多以純米漿製成、吃起來滑嫩而容易斷的是新竹新埔粄條，會混合太白粉或番薯粉，口感較有嚼勁的則是高雄美濃粄條。<br /><br />而米干則源自雲南。普洱稱之為「米干」，昆明叫它「卷粉」，廣東人則稱為「腸粉」，也是以在來米漿蒸製而成。不過，台灣賣米干的地方，多集中在桃園龍岡的忠貞新村這個前眷村所在地，而其原因，是因為這裡是1954年第一批撤退來台的泰緬孤軍興建的眷村之一。
              米干，外形酷似似粄條，但口感與香氣截然不同。米干口感綿滑而米香味強烈，粄條則有彈性而米香味較淡。粄條在台灣各地幾乎都可以吃得到，這種客家人將在來米磨成漿蒸熟再切成條狀的食品，在台灣主要可分為「北新埔、南美濃」兩派，其中多以純米漿製成、吃起來滑嫩而容易斷的是新竹新埔粄條，會混合太白粉或番薯粉，口感較有嚼勁的則是高雄美濃粄條。<br /><br />而米干則源自雲南。普洱稱之為「米干」，昆明叫它「卷粉」，廣東人則稱為「腸粉」，也是以在來米漿蒸製而成。不過，台灣賣米干的地方，多集中在桃園龍岡的忠貞新村這個前眷村所在地，而其原因，是因為這裡是1954年第一批撤退來台的泰緬孤軍興建的眷村之一。
              米干，外形酷似似粄條，但口感與香氣截然不同。米干口感綿滑而米香味強烈，粄條則有彈性而米香味較淡。粄條在台灣各地幾乎都可以吃得到，這種客家人將在來米磨成漿蒸熟再切成條狀的食品，在台灣主要可分為「北新埔、南美濃」兩派，其中多以純米漿製成、吃起來滑嫩而容易斷的是新竹新埔粄條，會混合太白粉或番薯粉，口感較有嚼勁的則是高雄美濃粄條。<br /><br />而米干則源自雲南。普洱稱之為「米干」，昆明叫它「卷粉」，廣東人則稱為「腸粉」，也是以在來米漿蒸製而成。不過，台灣賣米干的地方，多集中在桃園龍岡的忠貞新村這個前眷村所在地，而其原因，是因為這裡是1954年第一批撤退來台的泰緬孤軍興建的眷村之一。
            </div>
          </div>


          <div class="card-container">
            <a class="card" href="article1.html">
              <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
              <div class="flex-column">
                <div>
                  <div class="card_tittle">雲南過橋米線</div>
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
                </div>
                <div class="date">2023/12/10</div>
              </div>
            </a>

            <a class="m_card" href="m_article1.html">
              <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
              <div class="flex-column">
                <div>
                  <div class="card_tittle">雲南過橋米線</div>
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
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
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
                </div>
                <div class="date">2023/12/10</div>
              </div>
            </a>

            <a class="m_card" href="m_article1.html">
              <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
              <div class="flex-column">
                <div>
                  <div class="card_tittle">雲南過橋米線</div>
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
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
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
                </div>
                <div class="date">2023/12/10</div>
              </div>
            </a>

            <a class="m_card" href="m_article1.html">
              <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
              <div class="flex-column">
                <div>
                  <div class="card_tittle">雲南過橋米線</div>
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
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
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
                </div>
                <div class="date">2023/12/10</div>
              </div>
            </a>

            <a class="m_card" href="m_article1.html">
              <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
              <div class="flex-column">
                <div>
                  <div class="card_tittle">雲南過橋米線</div>
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
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
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
                </div>
                <div class="date">2023/12/10</div>
              </div>
            </a>

            <a class="m_card" href="m_article1.html">
              <img src=" ../img/12a5a26058762163a8c73e6b56d2fb3b.png" alt="">
              <div class="flex-column">
                <div>
                  <div class="card_tittle">雲南過橋米線</div>
                  <p>雲南特色美食，傳說賢惠的妻子為了讓丈夫能在寒冬吃上又有營養又能祛寒的食物，以雞湯或豬骨頭湯佐以米線及其它配料裝在砂鍋裏，保溫美味又營養。</p>
                </div>
                <div class="date">2023/12/10</div>
              </div>
            </a>

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
      </div>
  </main>
@endsection
