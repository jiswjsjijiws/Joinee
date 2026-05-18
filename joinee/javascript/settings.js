const accountDetails=document.querySelector('.accountDetails')
const editAccount=document.querySelector('.editAccount')
const deleteAccount=document.querySelector('.deleteAccount')
const content=document.querySelector('.content')
const changeContent=document.querySelector('.changeContent')
const deleteAcc=document.querySelector('.deleteAcc')
const save=document.querySelector('.save')
const deleteBtn=document.querySelector('.deleteBtn')
const errorspace=document.querySelector('.errorspace')
const dltErrorspace=document.querySelector('.dltErrorspace')
const reveal=document.querySelector('.reveal')

document.addEventListener('DOMContentLoaded',function(){
    accountDetails.style.borderBottom="2px solid white"
    changeContent.style.display="none"
    deleteAcc.style.display="none"

    accountDetails.addEventListener('click',function(){
        accountDetails.style.borderBottom="2px solid white"
        content.style.display="block"
        editAccount.style.borderBottom="none"
        deleteAccount.style.borderBottom="none"
        changeContent.style.display="none"
        deleteAcc.style.display="none"
    })

    editAccount.addEventListener('click',function(){
        editAccount.style.borderBottom="2px solid white"
        content.style.display="none"
        changeContent.style.display="block"
        accountDetails.style.borderBottom="none"
        deleteAccount.style.borderBottom="none"
        deleteAcc.style.display="none"
    })

    deleteAccount.addEventListener('click',function(){
        deleteAccount.style.borderBottom="2px solid white"
        deleteAcc.style.display="block" 
        editAccount.style.borderBottom="none"
        accountDetails.style.borderBottom="none"
        content.style.display="none"
        changeContent.style.display="none"

    })

    save.addEventListener('click',function(e){
        const newUsername=document.querySelector('.newUsername').value
        const newPassword=document.querySelector('.newPassword').value

        if(!newUsername||!newPassword){
            errorspace.innerHTML='All fields are required'
            e.preventDefault()
        }
        else{
            errorspace.innerHTML=''
        }
    })

    deleteBtn.addEventListener('click',function(e){
        const confirmPassword=document.querySelector('.confirmPassword').value
        if(!confirmPassword){
            dltErrorspace.innerHTML='All fields are required'
            e.preventDefault()
        }
        else{
            dltErrorspace.innerHTML='';
        }
    })

    reveal.addEventListener('click',function(){
        const readPassword=document.querySelector('.readPassword')
        if(readPassword.type==="password"){
            readPassword.type="text"
        }
        else{
            readPassword.type="password"
        }
    })
})