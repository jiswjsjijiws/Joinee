const submit=document.querySelector('.submit')
const errorspace=document.querySelector('.errorspace')
const thumbnails=document.querySelector('.thumbnails')
const preview=document.querySelector('.preview')

submit.addEventListener('click',function(e){
    if(thumbnails.files.length===0){
        errorspace.innerHTML="No thumbnails uploaded"
        e.preventDefault()
    }
    else{
        errorspace.innerHTML=""
    }
})

thumbnails.addEventListener('change',function(){
    for(let i=0;i<thumbnails.files.length;i++){
        errorspace.innerHTML=""
        preview.innerHTML+=`<p>${thumbnails.files[i].name}</p>`
    }
})



