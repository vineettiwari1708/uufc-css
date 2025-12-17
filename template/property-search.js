//  document.addEventListener("DOMContentLoaded", function() {
//     const container = document.getElementById('carouselContainer');
//     const prevBtn = document.getElementById('prevBtn');
//     const nextBtn = document.getElementById('nextBtn');
//     if (!container || !prevBtn || !nextBtn) {
//       console.warn('Carousel elements missing');
//       return;
//     }

//     function getScrollAmount() {
//       const card = container.querySelector('.card');
//       if (!card) return 0;
//       const style = window.getComputedStyle(card);
//       const gap = parseInt(style.marginRight) || 0;
//       return card.offsetWidth + gap;
//     }

//     function updateButtons() {
//       prevBtn.disabled = container.scrollLeft <= 0;
//       nextBtn.disabled = container.scrollLeft + container.clientWidth >= container.scrollWidth - 1;
//     }

//     prevBtn.addEventListener('click', function() {
//       const amt = getScrollAmount();
//       container.scrollBy({
//         left: -amt,
//         behavior: 'smooth'
//       });
//     });
//     nextBtn.addEventListener('click', function() {
//       const amt = getScrollAmount();
//       container.scrollBy({
//         left: amt,
//         behavior: 'smooth'
//       });
//     });

//     container.addEventListener('scroll', updateButtons);
//     window.addEventListener('resize', updateButtons);
//     updateButtons();
//   });
