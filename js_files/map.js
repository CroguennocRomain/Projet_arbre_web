d3.csv(
	"../arbres.csv",
	function(err, rows) {
		function unpack(rows, key) {
			return rows.map(function(row) {
				return row[key];
			});
		}

		var data = [
			{
				type: "scattermapbox",
				text: unpack(rows, "id"),
				lon: unpack(rows, "longitude"),
				lat: unpack(rows, "latitude"),
				marker: { color: "green", size: 6 }
			}
		];

		var layout = {
			dragmode: "zoom",
			mapbox: { style: "open-street-map", center: { lat: 49.8489, lon: 3.2876 }, zoom: 11 },
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

		var data = [
			{
				type: "scattermapbox",
				text: unpack(rows, "id"),
				lon: unpack(rows, "longitude"),
				lat: unpack(rows, "latitude"),
				marker: { color: "red", size: 6 }
			}
		];

		var layout = {
			dragmode: "zoom",
			mapbox: { style: "open-street-map", center: { lat: 49.8489, lon: 3.2876 }, zoom: 11 },
			margin: { r: 0, t: 0, b: 0, l: 0 }
		};

		Plotly.newPlot("MAP_1", data, layout);
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

		var data = [
			{
				type: "scattermapbox",
				text: unpack(rows, "id"),
				lon: unpack(rows, "longitude"),
				lat: unpack(rows, "latitude"),
				marker: { color: "red", size: 5 }
			}
		];

		var layout = {
			dragmode: "zoom",
			mapbox: { style: "open-street-map", center: { lat: 49.8489, lon: 3.2876 }, zoom: 11 },
			margin: { r: 0, t: 0, b: 0, l: 0 }
		};

		Plotly.newPlot("MAP_2", data, layout);
	}
);
