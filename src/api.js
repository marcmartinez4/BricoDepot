let resultado = fetch("http://localhost/BricoDepot/?controlador=API&action=api")
.then( data => data.json())
.then( resultado => console.log(resultado) );