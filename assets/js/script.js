document.addEventListener("DOMContentLoaded", (event) => {


  const menuBars = document.querySelector("#open-close--menu");
  const navigation = document.querySelector(".header .navigation");
  const closeMenuBars = document.querySelector("#close-menu--bars");



    menuBars.addEventListener('click', (e) => {
        e.preventDefault();
        navigation.classList.toggle('open');
    });

    closeMenuBars.addEventListener("click", (e) => {
        e.preventDefault();
        navigation.classList.toggle('open');
    });
  // Study Abroad Journey Timeline
    
    document.addEventListener('click', function(event) {
        const timelineContent = event.target.closest('.timeline-content');
        if (timelineContent) {
            event.preventDefault();
            
            const stepNumber = timelineContent.getAttribute('data-step');
            if (stepNumber) {
                toggleDetails(parseInt(stepNumber));
            }
        }
    });
    
    // Toggle details function
    function toggleDetails(stepNumber) {
        if (!document.getElementById(`details-${stepNumber}`)) return;
        const detailsElement = document.getElementById(`details-${stepNumber}`);
        if (!detailsElement) {
            console.error(`Element details-${stepNumber} not found`);
            return;
        }
        
        const isActive = detailsElement.classList.contains('active');
        
        document.querySelectorAll('.details.active').forEach(detail => {
            if (detail.id !== `details-${stepNumber}`) {
                detail.classList.remove('active');
            }
        });
        
        if (!isActive) {
            detailsElement.classList.add('active');
        }
        
        const timelineItem = detailsElement.closest('.timeline-item');
        if (timelineItem) {
            timelineItem.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
        }
    }
    
    window.toggleDetails = toggleDetails;
    
    setTimeout(() => {
        toggleDetails(1);
    }, 300);
    

});
