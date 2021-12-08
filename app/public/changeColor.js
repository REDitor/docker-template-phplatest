function changeBackgroundColor() {
    //get the values
    var red = document.getElementById("red").value;
    var green = document.getElementById("green").value;
    var blue = document.getElementById("blue").value;

    //convert values to hex
    var redHex = red.toString(16);
    var greenHex = green.toString(16);
    var blueHex = blue.toString(16);

    //add hex values to 1 hex value
    var result = redHex + greenHex + blueHex;

    //set background color to hex color
    document.body.style.background = result;
}