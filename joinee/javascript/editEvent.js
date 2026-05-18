document.addEventListener('DOMContentLoaded',function(){
    const deleteThumbnails=document.querySelectorAll('.fa-trash')
    const uploadedThumbnails=document.querySelectorAll('.uploadedThumbnails')
    const thumbnailName=document.querySelectorAll('.thumbnailName')
    const submit=document.querySelector('.submit')
    const deleteEvent=document.querySelector('.deleteEvent')
    let thumbnailToDelete=[];

    deleteEvent.addEventListener('click',function(){
        for(let i=0;i<thumbnailName.length;i++){
            thumbnailToDelete.push(thumbnailName[i].textContent)
        }
        const encoded = encodeURIComponent(JSON.stringify(thumbnailToDelete));
        window.location.href=`/joinee/organizer/deleteEvent.php?thumbnailToDelete=${encoded}`
    })

    deleteThumbnails.forEach((deleteButton,i)=>{
        deleteButton.addEventListener('click',function(){
            uploadedThumbnails[i].remove()
            thumbnailToDelete.push(thumbnailName[i].textContent)
        })
    })

    submit.addEventListener('click',function(){
        if(thumbnailToDelete.length!=0){
            const encoded = encodeURIComponent(JSON.stringify(thumbnailToDelete));
            window.location.href=`/joinee/organizer/deleteThumbnails.php?thumbnailToDelete=${encoded}`
        }
        console.log(thumbnailToDelete)
    })

})