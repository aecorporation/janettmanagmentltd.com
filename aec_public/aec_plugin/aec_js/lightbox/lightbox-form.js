

function gradient(id, level)
{
	var box = document.getElementById(id);
	box.style.opacity = level;
	box.style.MozOpacity = level;
	box.style.KhtmlOpacity = level;
	box.style.filter = "alpha(opacity=" + level * 100 + ")";
	box.style.display="block";
	return;
}


function fadein(id) 
{
	var level = 0;
	while(level <= 1)
	{
		setTimeout( "gradient('" + id + "'," + level + ")", (level* 1000) + 10);
		level += 0.01;
	}
}


// Open the lightbox


function openbox(formtitle, fadin)
{
  var box = document.getElementById('affichage_actu1'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_actu1", 0);
	 fadein("affichage_actu1");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_2(formtitle, fadin)
{
  var box = document.getElementById('affichage_actu2'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle2');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_actu2", 0);
	 fadein("affichage_actu2");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_3(formtitle, fadin)
{
  var box = document.getElementById('affichage_actu3'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle3');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_actu3", 0);
	 fadein("affichage_actu3");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_4(formtitle, fadin)
{
  var box = document.getElementById('affichage_actu4'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle4');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_actu4", 0);
	 fadein("affichage_actu4");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_5(formtitle, fadin)
{
  var box = document.getElementById('affichage_actu5'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle5');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_actu5", 0);
	 fadein("affichage_actu5");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_6(formtitle, fadin)
{
  var box = document.getElementById('affichage_actu6'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle6');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_actu6", 0);
	 fadein("affichage_actu6");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_7(formtitle, fadin)
{
  var box = document.getElementById('affichage_actu7'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle7');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_actu7", 0);
	 fadein("affichage_actu7");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_8(formtitle, fadin)
{
  var box = document.getElementById('affichage_actu8'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle8');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_actu8", 0);
	 fadein("affichage_actu8");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_ecole(formtitle, fadin)
{
  var box = document.getElementById('affichage_ecole'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle3');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_ecole", 0);
	 fadein("affichage_ecole");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_tableau(formtitle, fadin)
{
  var box = document.getElementById('affichage_tableau'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle4');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_tableau", 0);
	 fadein("affichage_tableau");
  }
  else
  { 	
    box.style.display='block';
  }  	
}

function openbox_formation(formtitle, fadin)
{
  var box = document.getElementById('affichage_formation'); 
  document.getElementById('background').style.display='block';

  var btitle = document.getElementById('boxtitle5');
  btitle.innerHTML = formtitle;
  
  if(fadin)
  {
	 gradient("affichage_formation", 0);
	 fadein("affichage_formation");
  }
  else
  { 	
    box.style.display='block';
  }  	
}



// Close the lightbox

function close()
{
   document.getElementById('affichage_actu1').style.display='none';
   document.getElementById('background').style.display='none';
}



