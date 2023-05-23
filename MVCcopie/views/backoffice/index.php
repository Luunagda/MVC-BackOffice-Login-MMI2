<h1> Bienvenue sur le Back Office</h1>
<style>
img{
	height: 8vh;
}

table { 
	
	width:100%;
	border-collapse: collapse; 
	/*margin:50px auto;*/
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #3498db; 
	color: white; 
	font-weight: bold; 

	}
td{
	text-align :center;
	margin: 0;
}
td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	font-size: 18px;
	}

	form{
		display:flex;
		flex-direction: column;
		justify-content: center;
		align-items:center;
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
	.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
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

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}


}
</style>    
<table>
  <tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Contenu</th>
	<th>Image et alt</th>
    <th>Slug</th>
	<th></th>
  </tr>
  <?php foreach($articles as $article): ?>
  <tr>
    <td><?=$article['id'] ?></td>
    <td><?=$article['titre'] ?></td>
    <td><p><?=substr($article['contenu'],0,30)."..." ?></p></td>
	<td><img src="<?=$article['image'] ?>" alt="<?=$article['alt'] ?>"><p><?=$article['alt'] ?></p></td>
    <td><?=$article['slug'] ?></td>
    <td>
        <form action="/backoffice/update/<?=$article['id'] ?>" method="post">
            <input type="submit" value="Modifier">
        </form>
        <form action="/backoffice/delete/<?=$article['id'] ?>" method="post">
            <input type="submit" value="Supprimer">
        </form>
    </td>
  </tr>
  <?php endforeach ?>
</table>    

  </br>

<form enctype="multipart/form-data" action="/backoffice/insert" method="post">
<fieldset>
    <legend>Insérer un nouvel élément</legend>
	<div>
		<label for="id">ID</label>
		
	</div>
	<div>
		<label for="titre">Titre</label>
		<input type="text" id="titre" name="titre">
	</div>
	<div>
		<label for="contenu">Contenu</label>
		<textarea type="text" id="contenu" name="contenu"></textarea>
	</div>
	<div>
		<label for="slug">Slug</label>
		<input type="text" id="slug" name="slug">
	</div>
	<div>
		<input type="hidden" name="MAX_FILES_SIZE" value="3000000"/>
		<label for="idfile">Envoyer ce fichier</label>
		<input id="idfile" name="userfile" type="file"/>
	</div>
	<div>
		<label for="alt">Alt</label>
		<input type="text" id="alt" name="alt">
	</div>
	<input type="submit" value="Insérer" name='envoi'>
</fieldset>
   
</form>

<a href="/Main"><button class="button-89" role="button" >Retour à la page précédente</button></a>
