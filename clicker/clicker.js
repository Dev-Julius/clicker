var score = 0;
var perdu = false;
function enregistrement_score(a)
	{
	var enregistre = new XMLHttpRequest();
	enregistre.onreadystatechange = function () 
  		{
  		if (this.readyState == 4) 
  			{
  			setTimeout(window.location.reload(), 5000);
  			}
  		}
  	enregistre.open("GET", 'save_score.php?score='+a, true);
  	enregistre.send();
	}

function setActiveStyleSheet(title)
  {
  var i, a, main;
  for (i=0; (a = document.getElementsByTagName("link")[i]);i++0)
      {
      if(a.getAttribute("rel").indexOf("style")!= -1 && a.getAttribute("title"))
          {
          a.disabled = true;
          if (a.getAttribute("title") == title)a.disabled = false; 
          }
      }
  }

        function afficher(url, bloc)
            {
            var req = false;
            if(window.XMLHttpRequest)
                {
                req = new XMLHttpRequest();
                if (req.overrideMimeType)
                    {
                    req.overrideMimeType("text/xml");
                    }
                }
                else
                  {
                  if(window.ActiveXObject)
                      {
                      try
                          {
                          req = new ActiveXObject("Msxml2.XMLHTTP");
                          }
                      catch (e)
                          {
                          try
                              {
                              req = new ActiveXObject("Microsoft.XMLHTTP");
                              }
                          catch (e)
                              {
                              alert('Problème');                  
                              }
                          }
                      }
                  }
                  if(req)
                    {
                    req.onreadystatechange = function()
                      {
                      if (req.readyState == 4)
                          {
                          if (req.status == 200)
                              {
                              var d = document.getElementById(bloc);
                              d.innerHTML = req.responseText;
                              }
                          else
                              {
                              
                              }
                          }
                      }
                    req.open('GET', url, true);
                    req.send(null);
                }
             }

function playSound()
  {
  var sound = document.getElementById("");
  sound.play();
  }