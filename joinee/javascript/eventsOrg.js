const eventStatus=document.querySelectorAll('.eventStatus')
const editEvent=document.querySelectorAll('.editEvent')

function changeEvent(){
    for(let i=0;i<eventStatus.length;i++){
        if(eventStatus[i].textContent==="rejected"){
            eventStatus[i].style.backgroundColor="red"
            editEvent[i].remove()
        }

        if(eventStatus[i].textContent==="accepted"){
            eventStatus[i].style.backgroundColor="green"
            editEvent[i].remove()
        }
    }
}


document.addEventListener('DOMContentLoaded',function(){
    changeEvent()
})

