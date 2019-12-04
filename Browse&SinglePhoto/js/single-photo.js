document.addEventListener("DOMContentLoaded", function() {
    
    console.log()
     // Tab click events hide and unhide approperiate sections 
    document.querySelector('.detailTab').addEventListener('click',(e)=>{
        document.querySelector('#mapData').style.display = 'none';
        document.querySelector('#detailData').style.display = 'unset';
        document.querySelector('#descriptionData').style.display = 'none';
    })

    document.querySelector('.mapTab').addEventListener('click',(e)=>{
        document.querySelector('#mapData').style.display = 'unset';
        document.querySelector('#detailData').style.display = 'none';
        document.querySelector('#descriptionData').style.display = 'none';
    }) 

    document.querySelector('.descriptionTab').addEventListener('click',(e)=>{
        document.querySelector('#mapData').style.display = 'none';
        document.querySelector('#detailData').style.display = 'none';
        document.querySelector('#descriptionData').style.display = 'unset';
    })
})