const gallery = document.getElementById('gallery');

document.getElementById('show_gallery').onclick = function () {
    gallery.show()
}

document.getElementById('hide_gallery').onclick = function () {
    gallery.close()
}

let sketches = document.querySelectorAll('.gallery_sketch');

sketches.forEach(function (sketch) {
    sketch.onclick = function () {
        sketch.classList.contains("chosen_sketch") ? sketch.classList.remove("chosen_sketch") : sketch.classList.add("chosen_sketch");
    }
})