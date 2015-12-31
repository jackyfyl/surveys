function addLoadEvent(func)
{
	var oldonload=window.onload;
	if(typeof window.onload != 'function')
	{
		window.onload=func;
	}
	else
	{
		window.onload=function(){oldonload();func();}
	}
}
 
function Focus(){
  function byid(id) {return document.getElementById(id);}
  function bytag(tag,obj){return (typeof obj=='object'?obj:byid(obj)).getElementsByTagName(tag);}
  var timer = null;
  var oFocus = byid('tFocus');
  var oBtn = byid('tFocus-btn');
  var oBtnLis = bytag('li',oBtn);
  var iActive = 0; 
  
  
  
  function changePic()
  {for(var i=0;i<oBtnLis.length;i++){oBtnLis[i].className = '';};oBtnLis[iActive].className = 'active';	 
  if(iActive==0){doMove(bytag('ul',oBtn)[0],'left',0);}else if(iActive>=oBtnLis.length-2){doMove(bytag('ul',oBtn)[0],'left',-(oBtnLis.length-4)*(oBtnLis[0].offsetWidth));
  }else{doMove(bytag('ul',oBtn)[0],'left',-(iActive-1)*(oBtnLis[0].offsetWidth)); }};
  
  function autoplay()
  {
	  if(iActive>=oBtnLis.length- 2)
	  {
		  iActive=0;
	  }
	  else
	  {
		  iActive++;
	  }
	  changePic();
  };
  
  aTimer = setInterval(autoplay,2000);
  
  
  function getStyle(obj, attr)
  {
	  if(obj.currentStyle)
	  {
		  return obj.currentStyle[attr];
	  }
	  else
	  {
		  return getComputedStyle(obj, false)[attr];
	  }	
  };
  
  function doMove(obj,attr,iTarget)
  {
	  clearInterval(obj.timer);
	  obj.timer=setInterval(function ()
	  {
		  var iCur=0;
		  if(attr=='opacity')
		  {
			  iCur=parseInt(parseFloat(getStyle(obj, attr))*100);
		  }
		  else
		  {
			  iCur=parseInt(getStyle(obj, attr));
		  }
		  var iSpeed=(iTarget-iCur)/8;
		  iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
		  
		  if(iCur==iTarget)
		  {
			  clearInterval(obj.timer);
		  }
		  else
		  {
			  if(attr=='opacity')
			  {
				  obj.style.filter='alpha(opacity:'+(iCur+iSpeed)+')';
				  obj.style.opacity=(iCur+iSpeed)/100;
			  }
			  else
			  {
				  obj.style[attr]=iCur+iSpeed+'px';
			  }
		  }
	   }, 30);
	   };
  
}