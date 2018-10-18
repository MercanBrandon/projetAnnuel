// Interval d'appel 1000ms * 60 secondes * x minutes
const interval = 1000 * 60 * 1
// le endpoint mettre l'url de l'api
const url = 'https://randomuser.me/api/'

setInterval(function () {
	// la fonction fetch appel l'API et renvoie la réponse en promesse
	fetch(url)
	// json() va renvoyer le body json de la réponse en promesse
	.then(function(res) {return res.json()})
	// On reçoit le json ici
	.then(function(result) {
		console.log('résultat:', result)
	})
	// En cas d'erreur au long de la chaîne de promesses, on va la 'catch'er ici
	.catch(function(err) { console.log('Erreur:', err)})
}, interval)
