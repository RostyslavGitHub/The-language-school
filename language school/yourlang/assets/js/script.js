"use strict"

const burgerMenu = document.querySelector('.burger-menu');
const burgerMenuIcon = document.querySelector('.burger-menu-icon');
const headerNavLink = document.getElementsByClassName('header__link');

if (burgerMenu){
  burgerMenuIcon.addEventListener("click", function (e) {
    burgerMenu.classList.toggle('_active-burger-menu');
    burgerMenuIcon.classList.toggle('_closed-burger_menu_icon');
  });
  for (let i = 0; i < headerNavLink.length; i++){
    headerNavLink[i].addEventListener("click", function(e){
      burgerMenu.classList.remove('_active-burger-menu');
      burgerMenuIcon.classList.remove('_closed-burger_menu_icon');
    })
  }
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

const showMoreInfo = document.getElementsByClassName('service__name');
const serviceArrow = document.getElementsByClassName('arrow');
  

if(showMoreInfo){
  for (let i = 0; i < showMoreInfo.length; i++){
    showMoreInfo[i].addEventListener('click', function(){
    const moreInfo = document.getElementsByClassName('service__more-info');
    moreInfo[i].classList.toggle('_show-more-info');
    serviceArrow[i].classList.toggle('_active-arrow');


  });

}};

let inputElement = document.getElementsByClassName("input");

if (inputElement) {
  for (let i = 0; i < inputElement.length; i++) {
    inputElement[i].addEventListener("focus", function() {
      if (inputElement[i].value === "NAME" || inputElement[i].value === "NUMBER OR E-MAIL"){
        inputElement[i].value = "";
      } 
    });
    inputElement[i].addEventListener("blur", function() {
      if (inputElement[i].value === ""){ 
        if(i === 0 ){
          inputElement[i].value = "NAME";
        } else if (i === 1 ){
          inputElement[i].value = "NUMBER OR E-MAIL";
        } else if(i === 2 ){
          inputElement[i].value = "NAME";
        } else if (i === 3 ){
          inputElement[i].value = "NUMBER OR E-MAIL";
        }
      }
    });
  }
}

const popUpButton = document.getElementsByClassName("popup-button");
const successPopUpButton = document.getElementsByClassName("success-popup-button");
const popUp = document.querySelector(".popup")
const popUpArea = document.querySelector(".popup-area");
const successPopUp = document.querySelector(".success-popup")
if(popUpButton){
  for (let i = 0; i < popUpButton.length; i++){
    popUpButton[i].addEventListener("click", function() {
      popUp.classList.toggle("_active-popup");
      popUpArea.classList.toggle("_active-popup");
      
    })
  }
};

let removeSuccessPopUp = () => successPopUp.classList.remove("_active-popup");
if(successPopUpButton){
  for (let i = 0; i < successPopUpButton.length; i++){
    successPopUpButton[i].addEventListener("click", function(){
      popUp.classList.remove("_active-popup");
      successPopUp.classList.add("_active-popup");
      popUpArea.classList.remove("_active-popup");
      setTimeout(removeSuccessPopUp, 1300);
      
  })
}
};

if(popUpArea){
  popUpArea.addEventListener("click", function() {
    popUp.classList.remove("_active-popup");
    successPopUp.classList.remove("_active-popup");
    popUpArea.classList.toggle("_active-popup");

  })
}