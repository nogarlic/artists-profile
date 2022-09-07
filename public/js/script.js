var myCarousel = document.getElementById('albumCarousel');

myCarousel.addEventListener('slide.bs.carousel', function (ev) {
  var id = ev.relatedTarget.id;
  for (let i = 1; i <= nAlbum; i++) {
    if (id == i) console.log('this is slide ' + i);
  }
})