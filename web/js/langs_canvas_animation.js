$(function(){
    var canvas = $("#langs-canvas");
    var ctx = canvas[0].getContext("2d");
    var langs = [
        new Text('C++'),
        new Text('C'),
        new Text('Java')
    ]
    // TEXT CLASS --------------------------------------------------------------
    function Text(text,x,y,vx,vy){
        this.text = text || "text" ;
        this.x = x || canvas.width()/2;
        this.y = y || canvas.height()/2;
        this.vx = vx || 0;
        this.vy = vy || 0;
    }
    // THE LOOP ----------------------------------------------------------------
    ctx.font = "40px Arial";
    ctx.fillStyle = "black";
    ctx.strokeStyle = "black" ;
    ctx.shadowColor = "#3893A7";
    
    var t = 0;
    setInterval(function(){
        ctx.shadowBlur = (Math.cos(t) + 1 ) * 10 ;
        t+=0.02;
      
        // clear
        ctx.clearRect(0,0,canvas[0].width,canvas[0].height);
        
        // update
        var inc = 0;
        for( i in langs ){
            langs[i].x = Math.cos(t + inc)*90 +canvas.innerWidth()/4+29;
            langs[i].y = Math.sin(t + inc)*60 +canvas.innerHeight()/4+50;
            inc+=2;
        } 

        // draw
        ctx.lineWidth = 0.5 ;
        ctx.beginPath();
        ctx.moveTo(langs[0].x+20, langs[0].y)
        ctx.lineTo(langs[1].x+20, langs[1].y);
        ctx.lineTo(langs[2].x+20, langs[2].y);
        ctx.closePath();
        ctx.fillStyle = 'rgba(255,255,255,0.3)';
        ctx.stroke();
        ctx.fill();

        ctx.fillStyle = 'black';
        for( i in langs ){
            ctx.fillText(langs[i].text, langs[i].x, langs[i].y);
        }

    },30)
    

});
