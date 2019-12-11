document.addEventListener("DOMContentLoaded", function() {
    
    console.log()
     // Tab click events hide and unhide approperiate tabs 
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
    
    // img hover display
    document.querySelector('picture').addEventListener('mouseover',(e) => {
        document.querySelector('#hoverBox').style.display = 'inline-block';

    })
    document.querySelector('picture').addEventListener('mouseout',(e) => {
        document.querySelector('#hoverBox').style.display = 'none';

    })
    document.querySelector('#hoverBox').addEventListener('mouseover',(e) => {
        document.querySelector('#hoverBox').style.display = 'inline-block';

    })
                                                                 
                                                                 
})