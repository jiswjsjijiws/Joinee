const saveChanges=document.querySelector('.saveChanges')

saveChanges.addEventListener('click',function(e){
    const usernameInput=document.querySelector('.usernameInput').value
    const passwordInput=document.querySelector('.passwordInput').value
    const errorspace=document.querySelector('.errorspace')
    if(!usernameInput||!passwordInput){
        errorspace.innerHTML+='All fields are required'
        e.preventDefault()
    }
    else{
        errorspace.innerHTML=''
    }
})