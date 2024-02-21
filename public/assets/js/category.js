function openTab(evt, tabName) {
    var i, tabcontent, tabbuttons;

    // 獲取所有的標籤內容並隱藏它們
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // 獲取所有標籤頁籤並移除 "active" 類
    tabbuttons = document.getElementsByClassName("tab-button");
    for (i = 0; i < tabbuttons.length; i++) {
        tabbuttons[i].className = tabbuttons[i].className.replace(" active-tab", "");
    }

    // 顯示當前選中的標籤內容並添加 "active" 類到按鈕
    document.getElementById(tabName).style.display = "flex";
    evt.currentTarget.className += " active-tab";
}

// 默認顯示第一個標籤內容
tabcontent = document.getElementsByClassName("tab-content");
for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
}
document.getElementById("tab1").style.display = "flex";



document.addEventListener("DOMContentLoaded", function () {
    var elements = document.querySelectorAll(".card p");
    var len = 30;

    elements.forEach(function (element) {
        if (element.textContent.length > len) {
            element.setAttribute("title", element.textContent);
            element.textContent = element.textContent.substring(0, len - 1) + "...";
        }
    });
});

// const navLinks = document.querySelectorAll('nav div a');
// if (navLinks && navLinks.length >= 3) {
//   navLinks[2].classList.add('text-main');
// }