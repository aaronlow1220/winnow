<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>新增最新消息 - 文章管理</title>
        <link rel="icon" href="../resources/img/favi.svg" />
        <link rel="stylesheet" href="../resources/css/font.css" />
        <link rel="stylesheet" href="../resources/css/reset.css" />
        <link rel="stylesheet" href="../resources/css/navs.css" />
        <link rel="stylesheet" href="../resources/css/admin-add.css" />
    </head>
    <body>
        <div class="all-content">
            <div class="top-nav">
                <div class="top-nav-content">
                    <div class="top-nav-logo">
                        <a href="" class="top-nav-home">後臺管理系統</a>
                    </div>
                    <div class="top-nav-right">
                        <a href=""><button class="top-nav-btn btn-color">進入網站</button></a>
                        <a href=""><button class="top-nav-btn btn-color">我的帳號</button></a>
                    </div>
                </div>
            </div>
            <div class="app-container">
                <div class="sidebar">
                    <div class="sb-content">
                        <a href="home.html" class="sb-dashboard-home sb-category-gap sb-category-parent">
                            <div class="sb-home-logo">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                    <path
                                        d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"
                                        fill="currentcolor"
                                    />
                                </svg>
                            </div>
                            <div class="sb-home-text sb-category-main-title">
                                <p>首頁</p>
                            </div>
                        </a>
                        <div class="sb-content-manager sb-category-gap">
                            <p class="sb-content-manager-title sb-category-title">內容管理系統</p>
                            <div class="sb-content-manager-category sb-category-parent sb-category-top-margin">
                                <div class="sb-content-manager-article-logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                        <path
                                            d="M280-280h280v-80H280v80Zm0-160h400v-80H280v80Zm0-160h400v-80H280v80Zm-80 480q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"
                                            fill="currentcolor"
                                        />
                                    </svg>
                                </div>
                                <span class="sb-content-manager-article-text sb-category-main-title">文章管理</span>
                            </div>
                            <ul class="sb-content-manager-article-child sb-category-subcat">
                                <a href="latest-news-list.html"><li>最新消息</li></a>
                                <a href="dishes-list.html"><li>忠貞美食</li></a>
                                <a href="attractions-list.html"><li>忠貞景點</li></a>
                                <a href=""><li>忠貞夢想</li></a>
                            </ul>
                        </div>
                        <div class="sb-content-manager sb-category-gap">
                            <div class="sb-content-manager-category sb-category-parent sb-category-top-margin">
                                <div class="sb-content-manager-personnel-logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                        <path
                                            d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"
                                            fill="currentcolor"
                                        />
                                    </svg>
                                </div>
                                <span class="sb-content-manager-personnel-text sb-category-main-title">人員管理</span>
                            </div>
                            <ul class="sb-content-manager-personnel-child sb-category-subcat">
                                <a href="admin-list.html"><li>管理人員</li></a>
                                <a href="user-list.html"><li>使用者</li></a>
                            </ul>
                        </div>
                        <div class="sb-ecommerce-manager">
                            <p class="sb-ecommerce-manager-title sb-category-title">電商平臺</p>
                            <div class="sb-ecommerce-manager-category sb-category-parent sb-category-top-margin">
                                <div class="sb-ecommerce-manager-article-logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                        <path
                                            d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560h-80v120H280v-120h-80v560Zm280-560q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"
                                            fill="currentcolor"
                                        />
                                    </svg>
                                </div>
                                <a href="order-list.html" class="sb-ecommerce-manager-article-text sb-category-main-title">訂單管理</a>
                            </div>
                            <div class="sb-ecommerce-manager-category sb-category-parent sb-category-top-margin">
                                <div class="sb-ecommerce-manager-article-logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                        <path
                                            d="m260-520 220-360 220 360H260ZM700-80q-75 0-127.5-52.5T520-260q0-75 52.5-127.5T700-440q75 0 127.5 52.5T880-260q0 75-52.5 127.5T700-80Zm-580-20v-320h320v320H120Zm580-60q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm-500-20h160v-160H200v160Zm202-420h156l-78-126-78 126Zm78 0ZM360-340Zm340 80Z"
                                            fill="currentcolor"
                                        />
                                    </svg>
                                </div>
                                <a href="product-list.html" class="sb-ecommerce-manager-article-text sb-category-main-title">商品管理</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard content -->
                <div class="main-content">
                    <div class="dashboard">
                        <div class="dashboard-top">
                            <div class="dashboard-title">
                                <p class="dashboard-title-sub">人員管理</p>
                                <p class="dashboard-title-main">管理人員 - 新增</p>
                            </div>
                        </div>
                        <form action="" method="post">
                            <div class="dashboard-function-bar">
                                <div class="dashboard-fb-fn">
                                    <a class="dashboard-fb-fn-btn btn-color">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                            <path
                                                d="M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <p>儲存</p>
                                    </a>
                                    <a class="dashboard-fb-fn-btn btn-color">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                                            <path
                                                d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z"
                                            />
                                        </svg>
                                        <p>取消</p>
                                    </a>
                                </div>
                            </div>
                            <div class="dashboard-list">
                                <div class="dashboard-post">
                                    <div class="profile-picture"></div>
                                    <div class="dashboard-post-settings">
                                        <label for="name">姓名</label>
                                        <input class="dashboard-post-setting" id="name" type="text" />
                                        <label for="username">使用者名稱</label>
                                        <input class="dashboard-post-setting" id="username" type="text" />
                                        <label for="email">電子郵箱</label>
                                        <input class="dashboard-post-setting" id="email" type="text" />
                                    </div>
                                    <div class="dashboard-post-settings">
                                        <label for="name">密碼</label>
                                        <p class="dashboard-post-setting" id="name">密碼預設為 user[user_id]，初次登入請更換密碼</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>