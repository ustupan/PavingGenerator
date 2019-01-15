
class Behaton {
  constructor(x, y, color,sliderValue) {
    this.x = x;
    this.y = y;
    this.color = color;
    this.width = 75;
    this.length = 120;
    this.polygon = [[0+this.x,0+this.y],[75+this.x,0+this.y],
    [75+this.x,25+this.y],[65+this.x,35+this.y],[65+this.x,85+this.y],
    [75+this.x,95+this.y],[75+this.x,120+this.y],[0+this.x,120+this.y],
    [0+this.x,95+this.y],[10+this.x,85+this.y],[10+this.x,35+this.y],
    [0+this.x,25+this.y]];
    for (let i in this.polygon){
      this.polygon[i] = this.polygon[i].map(function(element){
        return element/sliderValue;
      });
    }
  }

  show() {
    stroke(250);
    strokeWeight(1);
    beginShape();
    vertex(this.polygon[0][0],this.polygon[0][1]);
    vertex(this.polygon[1][0],this.polygon[1][1]);
    vertex(this.polygon[2][0],this.polygon[2][1]);
    vertex(this.polygon[3][0],this.polygon[3][1]);
    vertex(this.polygon[4][0],this.polygon[4][1]);
    vertex(this.polygon[5][0],this.polygon[5][1]);
    vertex(this.polygon[6][0],this.polygon[6][1]);
    vertex(this.polygon[7][0],this.polygon[7][1]);
    vertex(this.polygon[8][0],this.polygon[8][1]);
    vertex(this.polygon[9][0],this.polygon[9][1]);
    vertex(this.polygon[10][0],this.polygon[10][1]);
    vertex(this.polygon[11][0],this.polygon[11][1]);
    fill(this.color);
    endShape();
  }

  colorChangeClick(color){
    //console.log(this.polygon);
      var point = [mouseX,mouseY];
      var s = this.pointInsidePolygon(point,this.polygon);
    //  console.log(s);
      if(s) this.color = color;
  }

  pointInsidePolygon(point,vs){
    //based on https://github.com/substack/point-in-polygon (MIT license):
    var x = point[0], y = point[1];
    var inside = false;
    for (var i = 0, j = vs.length - 1; i < vs.length; j = i++) {
      var xi = vs[i][0], yi = vs[i][1];
      var xj = vs[j][0], yj = vs[j][1];
      var intersect = ((yi > y) !== (yj > y))
      && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
      if (intersect) inside = !inside;
   }
   return inside;
  }

}
