const next=document.querySelector('.next')
const errorspace=document.querySelector('.errorspace')
const inputs=document.querySelectorAll('input,textarea')

next.addEventListener('click',function(e){
    inputs.forEach(input=>{
        if(!input.value){
            errorspace.innerHTML="All fields must be entered"
            e.preventDefault()
        }
        else{
            errorspace.innerHTML=""
        }
    }
    )
})


