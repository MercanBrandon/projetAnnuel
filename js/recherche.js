function createMarkers(lat, long){
		console.log("j'ai acces");
		let url = `src/api/getdrivers.php?lat=${lat}&lng=${long}`;

		let request = new Request(url, {
			method: 'GET'
		});
		var result;

		fetch(request)
			.then( response => response.json() )
			.then( data => {
				result = data;
				console.log(data)
				for(var item of data)
				{

					//let cordonne = JSON.parse(drv_lat, drv_long);
					//console.log(cordonne.coordinates);
					//console.log(item);
					//pas touche a la popup
				    L.marker([item.drv_lat,item.drv_lng ]).addTo(map)
						.bindPopup('<h1>salut</h1>')
						.on('click', function() { Recherche.clickPopupButtons(item.drv_lat,item.drv_lng) })
						//.openPopup()
					;
				}
				
			})
//		console.log(result);.

	}