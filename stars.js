(function(){
  const LAYERS = [
    { cls:'layer1', count:120, speed:1 },
    { cls:'layer2', count:160, speed:0.8 },
    { cls:'layer3', count:200, speed:0.6 }
  ];

  function createLayer(def){
    const layer=document.createElement('div');
    layer.className='stars-layer '+def.cls;
    for(let i=0;i<def.count;i++){
      const s=document.createElement('span');
      const x=Math.random()*100, y=Math.random()*100;
      const sizeRand=Math.random();
      const size = sizeRand < 0.7 ? 2 : (sizeRand < 0.9 ? 3 : 4);
      s.style.left=x+'%';
      s.style.top=y+'%';
      s.style.setProperty('--sz', size+'px');
      const tw=4 + Math.random()*10;
      const fl=10 + Math.random()*14;
      s.style.setProperty('--tw', (tw/def.speed)+'s');
      s.style.setProperty('--fl', (fl/def.speed)+'s');
      s.style.setProperty('--dx', (Math.random()*12-6)+'px');
      s.style.setProperty('--dy', (Math.random()*16-8)+'px');
      s.style.setProperty('--sc', (0.8 + Math.random()*0.6).toFixed(2));
      s.style.animationDelay = (Math.random()*tw)+'s';
      layer.appendChild(s);
    }
    return layer;
  }

  document.addEventListener('DOMContentLoaded', ()=>{
    let overlay=document.getElementById('stars-overlay');
    if(!overlay){
      overlay=document.createElement('div');
      overlay.id='stars-overlay';
      document.body.appendChild(overlay);
    }
    LAYERS.forEach(l=> overlay.appendChild(createLayer(l)));
  });

  function spawnShooting(){
    const el=document.createElement('div');
    el.className='shooting';
    const sx=Math.random()*window.innerWidth*0.8; 
    const sy=Math.random()*window.innerHeight*0.5; 
    const dx=300+Math.random()*500; 
    const dy=120+Math.random()*180; 
    el.style.setProperty('--sx',sx+'px');
    el.style.setProperty('--sy',sy+'px');
    el.style.setProperty('--dx',dx+'px');
    el.style.setProperty('--dy',dy+'px');
  const overlay=document.getElementById('stars-overlay');
  (overlay||document.body).appendChild(el);
    setTimeout(()=> el.remove(), 3000);
  }

  function spawnFalling(){
    const el=document.createElement('div');
    el.className='falling';
    const sx=Math.random()*window.innerWidth; 
    const sy=-40; 
    const dx=-40 + Math.random()*80; 
    const dy= window.innerHeight * 0.9; 
    el.style.setProperty('--sx',sx+'px');
    el.style.setProperty('--sy',sy+'px');
    el.style.setProperty('--dx',dx+'px');
    el.style.setProperty('--dy',dy+'px');
  const overlay=document.getElementById('stars-overlay');
  (overlay||document.body).appendChild(el);
    setTimeout(()=> el.remove(), 2800);
  }

 
  setInterval(spawnShooting, 1800 + Math.random()*1200);
  setInterval(spawnFalling, 2600 + Math.random()*2000);
})();
