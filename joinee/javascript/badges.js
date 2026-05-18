const submit=document.querySelector('.submit')
const errorspace=document.querySelector('.errorspace')
submit.addEventListener('click',function(e){
    const badgeTitle=document.querySelector('.badgeT').value
    const badgePoints=document.querySelector('.badgeP').value
    const badgesDescription=document.querySelector('.badgeD').value

    if(!badgeTitle||!badgePoints||!badgesDescription){
        errorspace.innerHTML='All fields are required'
        e.preventDefault()
    }
    else{
        errorspace.innerHTML=''
    }
    
})