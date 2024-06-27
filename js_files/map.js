d3.csv(
    "../arbres.csv",
    function(err, rows) {
        function unpack(rows, key) {
            return rows.map(function(row) {
                return row[key];
            });
        }

        function createText(id, secteur, haut_tot, haut_tronc, revetement, tronc_diam, stade_dev, nomtech, port, feuillage) {
            return `<br>id = ${id}<br><br>secteur = ${secteur}<br>hauteur_totale = ${haut_tot}<br>hauteur_tronc = ${haut_tronc}<br>revetement = ${revetement}<br>diametre_tronc = ${tronc_diam}<br>stade_dev = ${stade_dev}<br>nomtech = ${nomtech}<br>port = ${port}<br>feuillage = ${feuillage}`;
        }

        var ids = unpack(rows, "id");
        var secteurs = unpack(rows, "clc_secteur");
        var hauteurs_totales = unpack(rows, "haut_tot");
        var hauteurs_troncs = unpack(rows, "haut_tronc");
        var revetements = unpack(rows, "fk_revetement");
        var diametres_troncs = unpack(rows, "tronc_diam");
        var stades_dev = unpack(rows, "fk_stadedev");
        var noms_tech = unpack(rows, "fk_nomtech");
        var ports = unpack(rows, "fk_port");
        var feuillages = unpack(rows, "feuillage");

        var texts = [];

        for (var i = 0; i < ids.length; i++) {
            texts.push(createText(ids[i], secteurs[i], hauteurs_totales[i], hauteurs_troncs[i], revetements[i], diametres_troncs[i], stades_dev[i], noms_tech[i], ports[i], feuillages[i]));
        }

        var data = [
            {
                type: "scattermapbox",
                text: texts,
                lon: unpack(rows, "longitude"),
				lat: unpack(rows, "latitude"),
                marker: { color: "green", size: 8 }
            }
        ];

        var layout = {
            dragmode: "zoom",
            mapbox: { style: "open-street-map", center: { lat: 49.8489, lon: 3.2876 }, zoom: 12 },
            margin: { r: 0, t: 0, b: 0, l: 0 }
        };

        Plotly.newPlot("MAP_arbres", data, layout);
    }
);




d3.csv(
	"../clusters.csv",
	function(err, rows) {
		function unpack(rows, key) {
			return rows.map(function(row) {
				return row[key];
			});
		}

		function createText(id, cluster, feuillage, haut_tot, stade_dev, fk_nomtech, haut_tronc) {
			return `<br>id = ${id}<br>cluster = ${cluster}<br><br>hauteur_totale= ${haut_tot}<br>stade_dev= ${stade_dev}<br>nomtech= ${fk_nomtech}<br>feuillage = ${feuillage}<br>hauteur_tronc= ${haut_tronc}`;
		}

		var ids = unpack(rows, "id");
		var clusters = unpack(rows, "cluster");
		var feuillages = unpack(rows, "feuillage");
		var haut_totales = unpack(rows, "haut_tot");
		var stades_dev = unpack(rows, "fk_stadedev");
		var noms_tech = unpack(rows, "fk_nomtech");
		var hauteurs_tronc = unpack(rows, "haut_tronc");

		var texts = [];

		for (var i = 0; i < ids.length; i++) {
			texts.push(createText(ids[i], clusters[i], feuillages[i], haut_totales[i], stades_dev[i], noms_tech[i], hauteurs_tronc[i]));
		}

		var colorScale = [
			"#636EFA", "#EF553B", "#00CC96", "#AB63FA", "#FFA15A",
			"#19D3F3", "#FF6692", "#B6E880", "#FF97FF", "#FECB52"
		];

		var uniqueClusters = [...new Set(clusters)];
		var clusterColors = clusters.map(cluster => colorScale[uniqueClusters.indexOf(cluster) % colorScale.length]);

		var data = [
			{
				type: "scattermapbox",
				text: texts,
				lon: unpack(rows, "longitude"),
				lat: unpack(rows, "latitude"),
				marker: { color: clusterColors, size: 8 }
			}
		];

		var layout = {
			dragmode: "zoom",
			mapbox: { style: "open-street-map", center: { lat: 49.8489, lon: 3.2876 }, zoom: 12 },
			margin: { r: 0, t: 0, b: 0, l: 0 }
		};

		Plotly.newPlot("MAP_1", data, layout);
	}
);



d3.csv(
	"../clusters2.csv",
	function(err, rows) {
		function unpack(rows, key) {
			return rows.map(function(row) {
				return row[key];
			});
		}

		function createText(id, cluster, feuillage, haut_tot, stade_dev, fk_nomtech, haut_tronc) {
			return `<br>id = ${id}<br>cluster = ${cluster}<br><br>hauteur_totale= ${haut_tot}<br>stade_dev= ${stade_dev}<br>nomtech= ${fk_nomtech}<br>feuillage = ${feuillage}<br>hauteur_tronc= ${haut_tronc}`;
		}

		var ids = unpack(rows, "id");
		var clusters = unpack(rows, "cluster");
		var feuillages = unpack(rows, "feuillage");
		var haut_totales = unpack(rows, "haut_tot");
		var stades_dev = unpack(rows, "stade_dev");
		var noms_tech = unpack(rows, "fk_nomtech");
		var hauteurs_tronc = unpack(rows, "haut_tronc");

		var texts = [];

		for (var i = 0; i < ids.length; i++) {
			texts.push(createText(ids[i], clusters[i], feuillages[i], haut_totales[i], stades_dev[i], noms_tech[i], hauteurs_tronc[i]));
		}

		var colorScale = [
			"#636EFA", "#EF553B", "#00CC96", "#AB63FA", "#FFA15A",
			"#19D3F3", "#FF6692", "#B6E880", "#FF97FF", "#FECB52"
		];

		var uniqueClusters = [...new Set(clusters)];
		var clusterColors = clusters.map(cluster => colorScale[uniqueClusters.indexOf(cluster) % colorScale.length]);

		var data = [
			{
				type: "scattermapbox",
				text: texts,
				lon: unpack(rows, "longitude"),
				lat: unpack(rows, "latitude"),
				marker: { color: clusterColors, size: 8 }
			}
		];

		var layout = {
			dragmode: "zoom",
			mapbox: { style: "open-street-map", center: { lat: 49.8489, lon: 3.2876 }, zoom: 12 },
			margin: { r: 0, t: 0, b: 0, l: 0 }
		};

		Plotly.newPlot("MAP_2", data, layout);
	}
);

