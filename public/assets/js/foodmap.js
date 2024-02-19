var displayedImage = document.getElementById('displayedImage');
var imageText = document.getElementById('imageText');

  var currentIndex = 0;
  var clickCount = 0;
  var imageList = document.getElementById('imageList');
  var imageItems = document.querySelectorAll('.image-item');
  
var initialImageSrc = imageItems[0].src; // 获取第一张图片的 src
document.getElementById('displayedImage').src = initialImageSrc;
  var numItems = imageItems.length;
  var slideButtons2 = document.querySelectorAll(".ph-foodbtn .slide-button");
  var slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
  var prevButton=document.getElementById('prev-slide');

  var textArray = [
    "<div class='foodT'><h1 class='Main-Titlecontent PH-Main-Titlecontent'>Title for the first image</h1><p class='Last PH-Last foodC'>SecondTitle</p></div><p class='content'>Subtitle for the first image1</p>",
    "<div class='foodT'><h1 class='Main-Titlecontent PH-Main-Titlecontent'>Title for the first image</h1><p class='Last PH-Last foodC'>SecondTitle</p></div><p class='content'>Subtitle for the first image2</p>",
    "<div class='foodT'><h1 class='Main-Titlecontent PH-Main-Titlecontent'>Title for the first image</h1><p class='Last PH-Last foodC'>SecondTitle</p></div><p class='content'>Subtitle for the first image3</p>",
    "<div class='foodT'><h1 class='Main-Titlecontent PH-Main-Titlecontent'>Title for the first image</h1><p class='Last PH-Last foodC'>SecondTitle</p></div><p class='content'>Subtitle for the first image1</p>",
    "<div class='foodT'><h1 class='Main-Titlecontent PH-Main-Titlecontent'>Title for the first image</h1><p class='Last PH-Last foodC'>SecondTitle</p></div><p class='content'>Subtitle for the first image2</p>",
    "<div class='foodT'><h1 class='Main-Titlecontent PH-Main-Titlecontent'>Title for the first image</h1><p class='Last PH-Last foodC'>SecondTitle</p></div><p class='content'>Subtitle for the first image3</p>",
    "<div class='foodT'><h1 class='Main-Titlecontent PH-Main-Titlecontent'>Title for the first image</h1><p class='Last PH-Last foodC'>SecondTitle</p></div><p class='content'>Subtitle for the first image1</p>",
    "<div class='foodT'><h1 class='Main-Titlecontent PH-Main-Titlecontent'>Title for the first image</h1><p class='Last PH-Last foodC'>SecondTitle</p></div><p class='content'>Subtitle for the first image2</p>",
    "<div class='foodT'><h1 class='Main-Titlecontent PH-Main-Titlecontent'>Title for the first image</h1><p class='Last PH-Last foodC'>SecondTitle</p></div><p class='content'>Subtitle for the first image3</p>",
    // Add more text for each image as needed
];
document.getElementById('imageText').innerHTML = textArray[0];
  
  function displayImage() {
    
      displayedImage.src = imageItems[currentIndex].src;
      
      imageText.innerHTML = textArray[currentIndex];


      if (currentIndex === 0) {
        document.getElementById("prev-slide").style.opacity = "0.2";
        document.getElementById("prev-slide2").style.opacity = "0.2";
    } else {
        document.getElementById("prev-slide").style.opacity = "1";
        document.getElementById("prev-slide2").style.opacity = "1";
    }


  
    //   // 根据当前索引决定是否隐藏左右按钮
    //   slideButtons[0].style.display = currentIndex === 0 ? "none" : "flex";
    //   slideButtons[1].style.display = currentIndex === numItems - 1 ? "none" : "flex";
  }


  const initSlider = () => {
    const imageList = document.querySelector(".slider-wrapper .image-list");
    const slideButtons2 = document.querySelectorAll(".ph-foodbtn .slide-button");
    const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
    const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
    

    // Slide images according to the slide button clicks
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {

           

        const direction = button.id === "prev-slide" ? -1 : 1;
        
        currentIndex += direction;
        // 更新 currentIndex，确保在合法范围内
        if (currentIndex < 0) {
            currentIndex = 0;
        } else if (currentIndex >= numItems) {
            currentIndex = numItems - 1;
        }
       // currentIndex = (currentIndex + direction + numItems) % numItems;


        // 更新 displayImage
        displayImage();
        
            const imageWidth = imageItems[0].offsetWidth;
            const scrollAmount = imageWidth * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        
        });
    });

    slideButtons2.forEach(button => {
        button.addEventListener("click", () => {
            // 判断按钮的方向，prev-slide2 表示向前跳转，next-slide2 表示向后跳转
            const direction = button.id === "prev-slide2" ? -1 : 1;
    
            // 更新 currentIndex，确保在合法范围内
            currentIndex += direction;
            if (currentIndex < 0) {
                currentIndex = 0;
            } else if (currentIndex >= numItems) {
                currentIndex = numItems - 1;
            }
    
            // 更新 displayImage
            displayImage();
    
            // 计算要滚动的距离
            const imageWidth = imageItems[0].offsetWidth; // 获取单张图片的宽度
            const scrollAmount = imageWidth * direction; // 计算滚动距离
    
            // 滚动图片列表
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

     // Call these two functions when image list scrolls
};

// // 根据当前索引决定是否隐藏左右按钮
// const handleSlideButtons = () => {
//     slideButtons[0].style.display = currentIndex === 0 ? "none" : "flex";
//     slideButtons[1].style.display = currentIndex === numItems - 1 ? "none" : "flex";
// };

//window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);
