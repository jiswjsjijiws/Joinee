const all=document.querySelector('.all')
const claimedBadges=document.querySelector('.claimedBadges')

const allBadges=document.querySelector('.allBadges')
const participantBadges=document.querySelector('.participantBadges')

claimedBadges.addEventListener('click',function(){
    claimedBadges.style.borderBottom='2px solid'
    all.style.borderBottom='none'
    participantBadges.style.display="grid"
    allBadges.style.display="none"
})

all.addEventListener('click',function(){
    all.style.borderBottom='2px solid'
    claimedBadges.style.borderBottom='none'
    allBadges.style.display="grid"
    participantBadges.style.display="none"
})

document.addEventListener('DOMContentLoaded',function(){
    all.style.borderBottom='2px solid'
    participantBadges.style.display="none"
})