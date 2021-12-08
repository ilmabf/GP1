const previous = document.querySelector('.previous');
const next = document.querySelector('.next');
const images = document.querySelector('.slides').children;
const noOfslides = images.length;
let indexNo = 0;

previous.addEventListener('click', () => {
  nextSlide('next');
})

next.addEventListener('click', () => {
  nextSlide('previous');
})

function nextSlide(direction) {
  if(direction == 'previous') {
    indexNo++;
    if(indexNo == noOfslides) {
      indexNo = 0;
    }
  } else {
    if(indexNo == 0) {
      indexNo = noOfslides - 1;
    } else {
      indexNo--;
    }
  }

  for(let i = 0; i < images.length; i++) {
    images[i].classList.remove('main');
  }
  images[indexNo].classList.add('main');
}