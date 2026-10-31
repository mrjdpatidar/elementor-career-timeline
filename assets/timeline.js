(function(){
 function init(root){
  root.querySelectorAll('.mct-timeline').forEach(function(timeline){
   if(timeline.dataset.bound==='yes')return;
   timeline.dataset.bound='yes';
   var items=Array.from(timeline.querySelectorAll('.mct-item'));
   var progress=timeline.querySelector('.mct-progress');
   var animate=timeline.dataset.animate==='yes';
   var ticking=false;
   function update(){
    ticking=false;
    if(!animate){items.forEach(function(item){item.classList.add('is-active')});if(progress)progress.style.height='100%';return;}
    var rect=timeline.getBoundingClientRect();
    var cutoff=window.innerHeight*.55;
    var height=Math.max(0,Math.min(rect.height,cutoff-rect.top));
    if(progress)progress.style.height=height+'px';
    items.forEach(function(item){var marker=item.querySelector('.mct-marker');if(marker){item.classList.toggle('is-active',marker.getBoundingClientRect().top<=cutoff);}});
   }
   function request(){if(!ticking){ticking=true;requestAnimationFrame(update)}}
   window.addEventListener('scroll',request,{passive:true});window.addEventListener('resize',request,{passive:true});update();
  });
 }
 if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',function(){init(document)});else init(document);
 if(window.jQuery){window.jQuery(window).on('elementor/frontend/init',function(){if(window.elementorFrontend&&window.elementorFrontend.hooks){window.elementorFrontend.hooks.addAction('frontend/element_ready/career_timeline.default',function($scope){init($scope[0])});}})}
})();
