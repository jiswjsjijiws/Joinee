const barIcon=document.querySelector('.fa-bars')
const sidebar=document.querySelector('.sidebar')
const xmark=document.querySelector('.fa-xmark')
const requests=document.querySelector('.requests')
const myevents=document.querySelector('.myevents')
const home=document.querySelector('.home')
const accounts=document.querySelector('.accounts')
const analytics=document.querySelector('.analytics')
const badges=document.querySelector('.badges')
const logout=document.querySelector('.logout')
const settings=document.querySelector('.settings')

function openSidebar(){
    sidebar.style.display="block"
}

function closeSidebar(){
    sidebar.style.display="none"
}

home.addEventListener('click',function(){
    window.location.href='/admin/home.php'
})

requests.addEventListener('click',function(){
    window.location.href='/admin/requests.php'
})

accounts.addEventListener('click',function(){
    window.location.href='/admin/viewAccounts.php'
})

settings.addEventListener('click',function(){
    window.location.href='/settings.php'
})

myevents.addEventListener('click',function(){
    window.location.href='/admin/viewEvents.php'
})

badges.addEventListener('click',function(){
    window.location.href='/admin/badges.php'
})

analytics.addEventListener('click',function(){
    window.location.href='/admin/userAnalytics.php'
})

logout.addEventListener('click',function(){
    window.location.href='/logout.php'
})
barIcon.addEventListener('click',openSidebar)
xmark.addEventListener('click',closeSidebar)

document.addEventListener('DOMContentLoaded',closeSidebar)