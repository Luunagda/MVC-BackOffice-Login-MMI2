<!-- Malgré les erreurs qui sont affichées, le code marche. Il insère correctement des valeurs.-->
<form enctype="multipart/form-data" action="/backoffice/updatesave/<?= $article['id'] ?>" method="post">
<fieldset>
    <legend>Insérer un nouvel élément</legend>
	<div>
		<label for="id">ID</label>
		
	</div>
	<div>
		<label for="titre">Titre</label>
		<input type="text" id="titre" name="titre" value="<?= $article['titre'] ?>">
	</div>
	<div>
		<label for="contenu">Contenu</label>
		<input type="text" id="contenu" name="contenu" value="<?= $article['contenu'] ?>">
	</div>
	<div>
		<label for="slug">Slug</label>
		<input type="text" id="slug" name="slug" value="<?= $article['slug'] ?>">
	</div>
	<img src="<?=$article['image'] ?>" alt="<?=$article['alt'] ?>">
	<div>	
		<input type="hidden" name="MAX_FILES_SIZE" value="3000000"/>
		<label for="idfile">Envoyer ce fichier</label>
		<input id="idfile" name="userfile" type="file"/>
	</div>
	<div>
		<label for="alt">Alt</label>
		<input type="text" id="alt" name="alt" value="<?= $article['alt'] ?>">
	</div>
	<input type="submit" value="Mettre à jour" name='envoi'>
</fieldset>

</form>


<a href="/Main"><button class="button-89" role="button" >Retour au Back Office</button></a>


<style>

form{
		display:flex;
		flex-direction: column;
		justify-content: center;
		align-items:center;
	}
img{
	height: 10vh;
}
	fieldset {
	margin-bottom: 15px;
	padding: 10px;
	width:30%;
	}
	
	legend {
	padding: 0px 3px;
	font-weight: bold;
	font-variant: small-caps;
	}
	
	label {
	width: 110px;
	display: inline-block;
	vertical-align: top;
	margin: 6px;
	}
	
	
	
	input:focus , textarea:focus{
	background: #eaffff;
	}
	
	input, textarea {
	width: 249px;
	}
	
	textarea {
	height: 100px;
	}
	
	input[type=submit] {
	width: 150px;
	padding: 10px;
	margin: 5px;
	width:100px;
	background-color: #3498db;
	color: white;
	border: 2px solid #3498db;
	}
	
	input[type=submit]:hover {
	width: 150px;
	padding: 10px;
	margin: 5px;
	width:100px;
	background-color: rgba(255, 255, 128, 0); 
	color: black; 
	border: 2px solid #3498db;
	}

	fieldset{
		background-color: #eee;
	}
	/* CSS */
.button-89 {
  --b: 3px;   /* border thickness */
  --s: .45em; /* size of the corner */
  --color: #373B44;
  
  padding: calc(.5em + var(--s)) calc(.9em + var(--s));
  color: var(--color);
  --_p: var(--s);
  background:
    conic-gradient(from 90deg at var(--b) var(--b),#0000 90deg,var(--color) 0)
    var(--_p) var(--_p)/calc(100% - var(--b) - 2*var(--_p)) calc(100% - var(--b) - 2*var(--_p));
  transition: .3s linear, color 0s, background-color 0s;
  outline: var(--b) solid #0000;
  outline-offset: .6em;
  font-size: 25px;

  border: 0;

  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-89:hover,
.button-89:focus-visible{
  --_p: 0px;
  outline-color: var(--color);
  outline-offset: .05em;
}

.button-89:active {
  background: var(--color);
  color: #fff;
}


a{
	display: flex;
  	justify-content:center;
	margin: 2%;
	text-decoration: none;
}
</style>