class Paving {
  constructor(width,length,pavingStone,sliderValue) {
    this.sliderValue = sliderValue;
    this.width = width;
    this.length = length;
    this.pavingStone = pavingStone;
    this.pavingArr = [];
    this.gray = color(105, 105, 105);
    this.pavingGenerated = false;
    console.log(width);
  }

  behatonPaving(behatonWidth,behatonLength){
    if (!this.pavingGenerated){
      this.pavingGenerated = true;
      var numberOfStonesWidth = parseInt(this.width/(behatonWidth-10)) * this.sliderValue;
      console.log(this.sliderValue);
      var numberOfStonesLength = parseInt(this.length/behatonLength) * this.sliderValue;
      console.log(numberOfStonesWidth);
      console.log(numberOfStonesLength);

      let y = 0;
      let x = 0;
      for(let j = 0; j < numberOfStonesWidth; j++){
        var tempArr = [];
          for(let i = 0; i < numberOfStonesLength; i++){
            tempArr[i] = new Behaton(x, y, this.gray,this.sliderValue);
            y = y + (behatonLength/this.sliderValue);
            console.log(y);
            console.log(x);
          }
        this.pavingArr.push.apply(this.pavingArr,[tempArr]);
        x = x + ((behatonWidth - 10)/1);
        y = j % 2 == 0 ? (60/this.sliderValue) : 0;
      }
  }
  }

  pavingShow(){
    this.behatonPaving(75,120);
    for (let i in this.pavingArr){
      this.pavingArr[i].forEach(function(stone){
        stone.show();
      });
    }
  }

  //different stone paving methods.
}
