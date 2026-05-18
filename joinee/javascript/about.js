const aboutUs=document.querySelector('.aboutUs')
const ourTeam=document.querySelector('.ourTeam')
const joinee=document.querySelector('.joinee')
const team=document.querySelector('.team')

const weihan=document.querySelector('.weihan')
const education=document.querySelector('.education')
const projects=document.querySelector('.project')

const weihanContent=document.querySelector('.weihanContent')
const educationContent=document.querySelector('.educationContent')
const projectsContent=document.querySelector('.projectsContent')

ourTeam.addEventListener('click',function(){
    ourTeam.style.borderBottom='2px solid'
    aboutUs.style.borderBottom='none'
    joinee.style.display='none'
    team.style.display='flex'
})

aboutUs.addEventListener('click',function(){
    aboutUs.style.borderBottom='2px solid'
    ourTeam.style.borderBottom='none'
    joinee.style.display='flex'
    team.style.display='none'
})

document.addEventListener('DOMContentLoaded',function(){
    aboutUs.style.borderBottom='2px solid'
    ourTeam.style.borderBottom='none'
    joinee.style.display='flex'
    team.style.display='none'
})

weihan.addEventListener('click',function(){
    weihan.style.borderBottom='2px solid'
    education.style.borderBottom='none'
    projects.style.borderBottom='none'

    weihanContent.style.display='flex'
    educationContent.style.display='none'
    projectsContent.style.display='none'
})

education.addEventListener('click',function(){
    education.style.borderBottom='2px solid'
    weihan.style.borderBottom='none'
    projects.style.borderBottom='none'

    educationContent.style.display='flex'
    weihanContent.style.display='none'
    projectsContent.style.display='none'

})

projects.addEventListener('click',function(){
    projects.style.borderBottom='2px solid'
    weihan.style.borderBottom='none'
    education.style.borderBottom='none'

    projectsContent.style.display='flex'
    weihanContent.style.display='none'
    educationContent.style.display='none'

})

document.addEventListener('DOMContentLoaded',function(){
    aboutUs.style.borderBottom='2px solid'
    ourTeam.style.borderBottom='none'
    joinee.style.display='flex'
    team.style.display='none'

    weihan.style.borderBottom='2px solid'
    education.style.borderBottom='none'
    projects.style.borderBottom='none'

    weihanContent.style.display='flex'
    educationContent.style.display='none'
    projectsContent.style.display='none'
})