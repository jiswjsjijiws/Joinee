const submit=document.querySelector('.submit')
const errormessage=document.querySelector('.errormessage')
submit.addEventListener('click',function(e){
    const first=document.querySelector('.first').value
    const second=document.querySelector('.second').value
    const third=document.querySelector('.third').value
    
    if(!first||!second||!third){
        e.preventDefault()
        errormessage.innerHTML='All fields are required'
    }
})