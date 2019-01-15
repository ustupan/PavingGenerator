class Paving {
  constructor(width,length,pavingStone,sliderValue) {
    this.width = width;
    this.length = length;
    this.pavingStone = pavingStone;
    this.pavingArr = [];
    this.gray = color(105, 105, 105);
    this.pavingGenerated = false;
  }

  behatonPaving(behatonWidth,behatonLength){
    if (!this.pavingGenerated){
      this.pavingGenerated = true;
      var numberOfStonesWidth = parseInt(this.width/(behatonWidth-10));
      var numberOfStonesLength = parseInt(this.length/behatonLength);
      let y = 0;
      let x = 0;
      for(let j = 0; j < numberOfStonesWidth; j++){
        var tempArr = [];
        if(j % 2 == 0){
          for(let i = 0; i < numberOfStonesLength; i++){
            tempArr[i] = new Behaton(x, y, this.gray);
            y = y + behatonLength;
          }
        }
        else {
          for(let i = 0; i < numberOfStonesLength-1; i++){
            tempArr[i] = new Behaton(x, y, this.gray);
            y = y + behatonLength;
          }
        }
        this.pavingArr.push.apply(this.pavingArr,[tempArr]);
        x = x + behatonWidth - 10;
        y = j % 2 == 0 ? 60 : 0;
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
