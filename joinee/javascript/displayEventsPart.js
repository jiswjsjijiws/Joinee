const thumbnails=document.querySelectorAll('.thumbnails')
const previous=document.querySelector('.previous')
const next=document.querySelector('.next')
const descriptionContent=document.querySelector('.descriptionContent')
const arrow=document.querySelector('.fa-angle-down')
let thumbnailIndex=0

function closeDescription(){
    descriptionContent.style.display="none"
}

function initializeThumbnails(){
    thumbnails[thumbnailIndex].classList.add("displayThumbnails")
}

function showThumbnails(i){

    if(i>=thumbnails.length||i<0){
        thumbnailIndex=0
    }

    thumbnails.forEach(thumbnail=>{
        thumbnail.classList.remove("displayThumbnails")
    })
    thumbnails[thumbnailIndex].classList.add("displayThumbnails")
}

next.addEventListener('click',function(){
    thumbnailIndex++
    showThumbnails(thumbnailIndex) 
})

previous.addEventListener('click',function(){
    thumbnailIndex--
    showThumbnails(thumbnailIndex) 
})

arrow.addEventListener('click',function(){
    if(descriptionContent.style.display=="block"){
        descriptionContent.style.display="none"
    }
    else{
        descriptionContent.style.display="block"
    }
})



document.addEventListener('DOMContentLoaded',function(){
    closeDescription()
    initializeThumbnails()
})
