function verif()
        {
        var nom=document.getElementById('nom').value;
        var prenom=document.getElementById('prenom').value;
        var email=document.getElementById('email').value;
        var tel=document.getElementById('tel').value;
        var post=document.getElementById('post').value;
        
        if(nom=="") {
            document.getElementById('mnom').innerHTML="Saisir votre Nom";
            return false;
        }else if(nom!=""){
            document.getElementById('mnom').innerHTML="";
        }
            if(prenom==""){
            document.getElementById('mprenom').innerHTML="Saisir votre Prénom";
            return false;
        }else if(prenom!=""){
            document.getElementById('mprenom').innerHTML="";
        }
         if(email==""){
            document.getElementById('memail').innerHTML="Saisir votre Email !";
            return false;
        }else if(email!=""){
            document.getElementById('mnom').innerHTML="";
        } 
        if ((email!="")&&(f.email.value.indexOf("@")<0)&&(f.email.value.indexOf(".")<0)){
            document.getElementById('memail').innerHTML="Vérifiez votre Email !";
            return false;
        }else if(nom!=""){
            document.getElementById('memail').innerHTML="";
        }
        
        if(tel==""){
            document.getElementById('mtel').innerHTML="Saisir votre Numéro de téléphone";
            return false;
        }else if(tel!=""){
            document.getElementById('mtel').innerHTML="";
        }
        if(isNaN(tel)&&(tel!="")){
            document.getElementById('mtel').innerHTML="Tél est un Champs Numérique !";
            return false;
        }else if(tel!=""){
            document.getElementById('mtel').innerHTML="";
        }
        
        if((f.post.options[0].selected==true))
	{
		document.getElementById('mpost').innerHTML="Veuillez choisir le Poste Actuel"
		return false;
	}else if(post!=""){
            document.getElementById('mpost').innerHTML="";
        }
            return true;
        }