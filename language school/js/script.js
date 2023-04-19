const burgerMenu = document.querySelector('.burger-menu');
const burgerMenuIcon = document.querySelector('.burger-menu-icon');
if (burgerMenu){
  burgerMenuIcon.addEventListener("click", function (e) {
    burgerMenu.classList.toggle('_active-burger-menu');
    burgerMenuIcon.classList.toggle('_closed-burger_menu_icon');
  });
};

const slider = document.querySelector('.slider');
const sliderItems = document.querySelectorAll('.slider__item');
const sliderPrevBtn = document.querySelector('.slider-prev');
const sliderNextBtn = document.querySelector('.slider-next');

let adaptivePercentForSlides
 if( innerWidth < 567 ) {
  adaptivePercentForSlides = 100;
} else if(innerWidth < 1020 & innerWidth > 567){
  adaptivePercentForSlides = 50;
} else if ( innerWidth > 1019){
  adaptivePercentForSlides = 25;
}

const sliderWidth = slider.clientWidth;
const slidePercentWidth = adaptivePercentForSlides;
let currentSlide = 0;

slider.style.transform = `translateX(${-slidePercentWidth * sliderWidth * currentSlide / 100}px)`;

sliderPrevBtn.addEventListener('click', () => {
  if (currentSlide === 0) {
    currentSlide = Math.floor(sliderItems.length - 100 / slidePercentWidth);
    slider.style.transform = `translateX(${-slidePercentWidth * sliderWidth * currentSlide / 100}px)`;
  } else {
    currentSlide--;
    slider.style.transform = `translateX(${-slidePercentWidth * sliderWidth * currentSlide / 100}px)`;
  }
});

sliderNextBtn.addEventListener('click', () => {
  if (currentSlide === Math.floor(sliderItems.length - 100 / slidePercentWidth)) {
    currentSlide = 0;
    slider.style.transform = `translateX(${-slidePercentWidth * sliderWidth * currentSlide / 100}px)`;
  } else {
    currentSlide++;
    slider.style.transform = `translateX(${-slidePercentWidth * sliderWidth * currentSlide / 100}px)`;
  }
});

const showMoreInfo = document.getElementsByClassName('service__item__name');
/*const downArrow = document.getElementsByClassName('arrow-down');*/
  

if(showMoreInfo){
  for (let i = 0; i < showMoreInfo.length; i++){
    showMoreInfo[i].addEventListener('click', function(){
    const moreInfo = document.getElementsByClassName('service__item__more-info');
    moreInfo[i].classList.toggle('_show-more-info');
    /*downArrow[i].classList.toggle('rotate225');*/


  });

}};