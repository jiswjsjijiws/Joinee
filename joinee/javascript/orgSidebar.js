const barIcon=document.querySelector('.fa-bars')
const sidebar=document.querySelector('.sidebar')
const xmark=document.querySelector('.fa-xmark')
const create=document.querySelector('.create')
const myevents=document.querySelector('.myevents')
const home=document.querySelector('.home')
const attendance=document.querySelector('.attendance')
const settings=document.querySelector('.settings')
const logout=document.querySelector('.logout')

function openSidebar(){
    sidebar.style.display="block"
}

function closeSidebar(){
    sidebar.style.display="none"
}

home.addEventListener('click',function(){
    window.location.href='/organizer/home.php'
})

create.addEventListener('click',function(){
    window.location.href='/organizer/createEventp1.php'
})

myevents.addEventListener('click',function(){
    window.location.href='/organizer/eventsOrg.php'
})

attendance.addEventListener('click',function(){
    window.location.href='/organizer/attendance.php'
})

settings.addEventListener('click',function(){
    window.location.href='/settings.php'
})

logout.addEventListener('click',function(){
    window.location.href='/logout.php'
})
barIcon.addEventListener('click',openSidebar)
xmark.addEventListener('click',closeSidebar)

document.addEventListener('DOMContentLoaded',closeSidebar)