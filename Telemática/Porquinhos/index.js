const borda = document.querySelectorAll('.borda');
const prev = document.getElementById('prev');
const next = document.getElementById('next');

let  currentSlide =0;
function mideSlider(){
    borda.forEach(item => item.classList.remove('active'))
}
function showSlider(){
    borda[currentSlide].classList.add('active')
}
function nextSlider(){
    mideSlider()
    if(currentSlide == borda.length -1){
        currentSlide=0
    } else{
        currentSlide++
    }
    showSlider()
}

function prevSlider(){
    mideSlider()
    if(currentSlide ==0){
        currentSlide=  borda.length -1
    } else{
        currentSlide--
    }
    showSlider()
}


prev.addEventListener("click", prevSlider)
next.addEventListener("click", nextSlider)