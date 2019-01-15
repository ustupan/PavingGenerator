var canvas;
var paving1;
var sliderChecker;

function setup() {
  canvas =  createCanvas(500, 500);
  createP(' ');
  slider = createSlider(1,10,1);
  costam = slider.value();
  paving1 = new Paving(500, 500, "behaton",slider.value());
}

function draw() {
  background(0,51,0);
  pavingUpdate();
  if(mouseIsPressed) mousePressing();
}

function pavingUpdate(){
  if (sliderChecker !== slider.value()){
    paving1 = new Paving(500, 500, "behaton",slider.value());
    sliderChecker = slider.value();
  }
  paving1.pavingShow();
}

function mousePressing(){
  let inside = color(204, 102, 0);
  for (let i in paving1.pavingArr){
    paving1.pavingArr[i].forEach(function(stone){
      stone.colorChangeClick(inside);
    });
  }
}
