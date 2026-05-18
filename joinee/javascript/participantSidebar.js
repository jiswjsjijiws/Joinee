const barIcon=document.querySelector('.fa-bars')
const sidebar=document.querySelector('.sidebar')
const xmark=document.querySelector('.fa-xmark')
const myevents=document.querySelector('.myevents')
const attendance=document.querySelector('.attendance')
const home=document.querySelector('.home')
const about=document.querySelector('.about')
const impact=document.querySelector('.analytics')
const badges=document.querySelector('.badges')
const leaderboard=document.querySelector('.leaderboard')
const logout=document.querySelector('.logout')
const settings=document.querySelector('.settings')

function openSidebar(){
    sidebar.style.display="block"
}

function closeSidebar(){
    sidebar.style.display="none"
}

home.addEventListener('click',function(){
    window.location.href='/participant/home.php'
})

about.addEventListener('click',function(){
    window.location.href='/participant/about.php'
})

settings.addEventListener('click',function(){
    window.location.href='/settings.php'
})

myevents.addEventListener('click',function(){
    window.location.href='/participant/myEvents.php'
})

attendance.addEventListener('click',function(){
    window.location.href='/participant/attendance.php'
})

badges.addEventListener('click',function(){
    window.location.href='/participant/badges.php'
})

impact.addEventListener('click',function(){
    window.location.href='/participant/impact.php'
})

leaderboard.addEventListener('click',function(){
    window.location.href='/participant/leaderboard.php'
})

logout.addEventListener('click',function(){
    window.location.href='/logout.php'
})
barIcon.addEventListener('click',openSidebar)
xmark.addEventListener('click',closeSidebar)

document.addEventListener('DOMContentLoaded',closeSidebar)