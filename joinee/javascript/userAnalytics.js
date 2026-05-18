const participants=document.querySelector('.participants')
const organizers=document.querySelector('.organizers')
const admins=document.querySelector('.admins')

const totalP=document.querySelector('.totalP')
const totalO=document.querySelector('.totalO')
const totalA=document.querySelector('.totalA')

participants.addEventListener('click',function(){
    totalP.style.display="block"
    totalO.style.display="none"
    totalA.style.display="none"
    participants.style.borderBottom="2px solid white"
    organizers.style.borderBottom="none"
    admins.style.borderBottom="none"
})

organizers.addEventListener('click',function(){
    totalO.style.display="block"
    totalP.style.display="none"
    totalA.style.display="none"
    organizers.style.borderBottom="2px solid white"
    participants.style.borderBottom="none"
    admins.style.borderBottom="none"
})

admins.addEventListener('click',function(){
    totalA.style.display="block"
    totalO.style.display="none"
    totalP.style.display="none"
    admins.style.borderBottom="2px solid white"
    participants.style.borderBottom="none"
    organizers.style.borderBottom="none"
})

document.addEventListener('DOMContentLoaded',function(){
    totalP.style.display="block"
    totalO.style.display="none"
    totalA.style.display="none"
    participants.style.borderBottom="2px solid white"
    organizers.style.borderBottom="none"
    admins.style.borderBottom="none"   
})
