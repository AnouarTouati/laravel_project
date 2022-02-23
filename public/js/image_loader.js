
var loadFile = function(event) {
    var image_display = document.getElementById('image_display');
    image_display.src = URL.createObjectURL(event.target.files[0]);
    image_display.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
