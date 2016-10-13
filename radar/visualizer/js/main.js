// Authors: Catalin Tiseanu, Mihai Gheorghe, Mihai Ciucu

ACCESS_TOKEN = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw';
MB_ATTR = 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
    '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery © <a href="http://mapbox.com">Mapbox</a>';
MB_URL = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + ACCESS_TOKEN;
OSM_URL = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
OSM_ATTRIB = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors';

var sirutaPopMap = {};
var sirutaRegMap = {};
var sirutaWeaMap = {};
var sirutaInvestmentMap = {};

var grayscale = L.tileLayer(MB_URL, {id: 'mapbox.light', attribution: MB_ATTR});
var streets = L.tileLayer(MB_URL, {id: 'mapbox.streets', attribution: MB_ATTR});

class BaseLayerGroup {
    constructor(jsonPath) {
        this.layerGroup = new L.layerGroup();
        this.layerGroup.getLegendHTML = function () {
            return "";
        };
    }

    addTo(map) {
        this.layerGroup.addTo(map);
    }

    setStyle(style) {
        this.innerLayer.setStyle(style);
    }

    redraw() {
        let startTime = performance.now();
        this.setStyle(this.getStyle());
        console.log("Redraw duration: ", (performance.now() - startTime));
    }

    setMouseOverStyle(target) {
        target.setStyle({
            weight: 4,
            color: 'grey',
            dashArray: '',
            fillOpacity: 0.0
        });

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            target.bringToFront();
        }
    }

    setTooltipData(feature) { }

    mouseOverFeature(e) {
        if (this.lastTarget) {
            this.innerLayer.resetStyle(this.lastTarget);
        }

        this.lastTarget = e.target;

        this.setMouseOverStyle(this.lastTarget);

        this.setTooltipData(this.lastTarget.feature);
    }

    mouseOutFeature(e) {
        tooltipDataDiv.html(defaultInfo);
        this.innerLayer.resetStyle(this.lastTarget);
    }

    clickFeature(e) {}

    setData(data) {
        let myOnEachFeature = (feature, layer) => {
            layer.on({
                click: (e) => {
                    this.clickFeature(e);
                },
                mouseover: (e) => {
                    this.mouseOverFeature(e);
                },
                mouseout: (e) => {
                    this.mouseOutFeature(e);
                },
            });
        };

        this.innerLayer = L.geoJson(data, {
            style: this.getStyle(),
            onEachFeature: myOnEachFeature,
        }).addTo(this.layerGroup);
    }
}

class DemographicsLayer extends BaseLayerGroup {
    constructor() {
        super();
        this.FIRST_DATA_YEAR = this.FIRST_YEAR = 1992;
        this.LAST_DATA_YEAR = this.LAST_YEAR = 2015;
        this.chromaScale = chroma.scale(["red", "green"]).domain([-0.25, 0.25], 50);

        this.layerGroup.getLegendHTML = function () {
            // debugger;
            let grades = [];
            let minGrade = -0.25;
            let maxGrade = 0.30;
            let gradeCount = 11;
            let diffGrade = (maxGrade - minGrade) / gradeCount;
            for (let i = 0; i < gradeCount; i ++) {
                grades.push((minGrade + diffGrade * i).toFixed(2));
            }

            let innerHTML = "<b>Legenda</b><br>";

            // loop through our density intervals and generate a label with a colored square for each interval
            for (let i = 0; i < grades.length; i++) {
                let scale = chroma.scale(['red', 'green']).domain([-0.25, 0.25], 50);
                let getColor = (value) => {return scale(value).hex()};
                let opacity = (value) => {return Math.min(Math.abs(value) * 3, 1.0)};

                innerHTML += '<i style="background:' + getColor(grades[i]) + '; opacity:' + opacity(grades[i]) + '; "></i> ' +
                    grades[i]*100 + "%" + (grades[i + 1] ? ' &ndash; ' + grades[i + 1]*100 + "%" + '<br>' : '+');
            }

            return innerHTML;
        }
    }

    setFirstYear(year) {
        if (year == this.FIRST_YEAR) {
            return;
        }
        this.FIRST_YEAR = year;
        this.redraw();
    }

    setLastYear(year) {
        if (year == this.LAST_YEAR) {
            return;
        }
        this.LAST_YEAR = year;
        window.currentYearDiv.html(parseInt(this.FIRST_YEAR) + "<br/>" + parseInt(this.LAST_YEAR));
        this.redraw();
    }

    getPopulationTween(d, year) {
        if (year == Math.round(year)) {
            return d["pop" + year];
        }
        let floor = Math.floor(year);
        let ceil = Math.ceil(year);
        let frac = year - Math.floor(year);
        let floorPop = d["pop" + floor];
        let ceilPop = d["pop" + ceil];
        // floorPop |= ceilPop;
        // ceilPop |= floorPop;
        return floorPop * (1 - frac) + ceilPop * frac;
    }

    getStyle() {
        let getPercentChange = (d) => {
            let firstPopYear = this.FIRST_YEAR;
            while (!d["pop" + firstPopYear] && firstPopYear < this.LAST_YEAR) {
                firstPopYear++;
            }
            if (firstPopYear == this.LAST_YEAR) {
                return 0;
            }
            let lastYearPop = this.getPopulationTween(d, this.LAST_YEAR);
            return (lastYearPop - d["pop" + firstPopYear]) / lastYearPop;
        };

        let getOpacity = (d) => {
            return Math.min(Math.abs(getPercentChange(d)) * 3, 1.0);
        };

        let getColor = (d) => {
            let strength = getPercentChange(d);
            return this.chromaScale(2 * strength).hex();
        };

        return function style(feature) {
            return {
                weight: 0.5,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: getOpacity(feature.properties),
                fillColor: getColor(feature.properties)
            };
        }
    }

    setTooltipData(feature) {
        let tooltipHTML = "<h3>Informatii regiune</h3>";
        let validKeys = [["name", "Nume"], ["natLevName", "Tip"], ["county", "Judet"]];
        for (let [key, alt] of validKeys) {
            if (key.startsWith("pop")) {
                continue;
            }
            let value = feature.properties[key];
            tooltipHTML += "<h4>" + alt + ": " + value + "</h4>";
            // tooltipHTML += '  <div class="panel panel-default"> ' +
            //     '<div class="panel-heading"><b>'+ alt + '<b></div> ' +
            //     '<div class="panel-body">' + value + '</div>' +
            // '</div>';
        }

        let addPopulation = () => {
            let firstKey, firstValue, lastKey, lastValue;
            firstKey = "pop" + this.FIRST_YEAR;
            firstValue = feature.properties[firstKey];
            tooltipHTML += "<h4>Populatie " + (this.FIRST_YEAR || "-") + ": " + firstValue + "</h4>";
            lastKey = "pop" + this.LAST_YEAR;
            lastValue = feature.properties[lastKey];
            tooltipHTML += "<h4>Populatie " + this.LAST_YEAR  + ": " + lastValue + "</h4>";

            tooltipHTML += "<h4>Diferenta " + (lastValue - firstValue) + "</h4>";
        };
        addPopulation();


        tooltipDataDiv.html(tooltipHTML);
        let yearlyPopulation = [];
        for (let year = this.FIRST_DATA_YEAR; year <= this.LAST_DATA_YEAR; year += 1) {
            let population = feature.properties["pop" + year];
            if (population) {
                yearlyPopulation.push({year:year, population: population});
            }
        }

        $("#popChart").show();

        window.populationChart = window.populationChart || nv.addGraph(function () {
            let chart = nv.models.lineChart()
                    .x(function (d) {
                        return d.year
                    })
                    .y(function (d) {
                        return d.population
                    })
                    .color(d3.scale.category10().range())
                    .useInteractiveGuideline(true);

            chart.xAxis
                .tickValues([1992, 2000,  2007, 2015]);
            //     // .tickFormat(function (d) {
            //     //     return d3.time.format('%x')(new Date(d))
            //     // });

            // chart.yAxis
            //     .tickFormat(d3.format(',.1%'));

            d3.select('#popChart svg')
                .datum([{values: yearlyPopulation}])
                .call(chart);

            nv.utils.windowResize(chart.update);

            return chart;
        });

        d3.select(".nv-legend-symbol").remove();
    }

    mouseOutFeature(e) {
        super.mouseOutFeature(e);
        $("#popChart").hide();
    }

    clickFeature(e) {
        let url = this.getKibanaRegionChartUrl(this.lastTarget.feature);
        window.open(url,'_blank');
    }

    getKibanaRegionChartUrl(feature) {
        return "http://radar:radar2016@193.230.8.27:10081/app/kibana#/visualize/edit/Top-judete-ca-populatie-dupa-ani?_g=(filters:!(),refreshInterval:(display:Off,pause:!f,value:0),time:(from:now-15m,mode:quick,to:now))&_a=(filters:!(('$state':(store:appState),meta:(alias:!n,apply:!t,disabled:!f,index:radar-population,key:siruta,negate:!f,value:'" + feature.properties.siruta + "'),query:(match:(siruta:(query:" + feature.properties.siruta + ",type:phrase))))),linked:!f,query:(query_string:(analyze_wildcard:!t,query:'*')),uiState:(),vis:(aggs:!((id:'1',params:(field:population),schema:metric,type:sum),(id:'2',params:(field:year,order:asc,orderBy:_term,size:26),schema:segment,type:terms),(id:'3',params:(field:siruta,order:desc,orderBy:'1',size:5),schema:group,type:terms)),listeners:(),params:(addLegend:!t,addTimeMarker:!f,addTooltip:!t,defaultYExtents:!t,mode:stacked,scale:linear,setYExtents:!f,shareYAxis:!t,times:!(),yAxis:(max:23500000,min:22000000)),title:'Top%20judete%20ca%20populatie%20dupa%20ani',type:histogram))";
    }

    startAnimation(firstDataYear=this.FIRST_YEAR, lastDataYear=this.LAST_DATA_YEAR, yearlyStep=1) {
        let currentLastYear = firstDataYear;
        this.animationStep = () => {
            if (currentLastYear > this.LAST_DATA_YEAR) {
                this.stopAnimation();
                return;
            }
            this.setLastYear(parseInt(currentLastYear));
            let speed = speedSlider.speed || 2;
            let speedSteps = [0.1, 0.2, 0.5];
            currentLastYear += speedSteps[speed - 1];
            if (this.animationStep) {
                requestAnimationFrame(this.animationStep);
            }
        };

        requestAnimationFrame(this.animationStep);
    }

    stopAnimation() {
        this.animationStep = null;
    }
}

class InvestmentLayer extends BaseLayerGroup {
    constructor() {
        super();
        this.FIRST_DATA_YEAR = 2016;
        this.LAST_DATA_YEAR = 2016;
        this.chromaScale = chroma.scale(['green', 'white']).domain([0.0, 3.0], 6, 'log');

        this.layerGroup.getLegendHTML = function () {
            // debugger;
            let grades = [];
            let minGrade = 0.0;
            let maxGrade = 3.0;
            let gradeCount = 6;
            let diffGrade = (maxGrade - minGrade) / gradeCount;
            maxGrade += diffGrade;
            gradeCount += 1;

            for (let i = 0; i < gradeCount; i ++) {
                grades.push((minGrade + diffGrade * i).toFixed(2));
            }

            let innerHTML = "<b>Legenda</b><br>";

            // loop through our density intervals and generate a label with a colored square for each interval
            for (let i = 0; i < grades.length; i++) {
                // let scale = this.chromaScale;
                let scale = chroma.scale(['green', 'white']).domain([0.0, 3.0], 6, 'log');
                let getColor = (value) => {return scale(value).hex()};
                let opacity = (value) => {return 1.0};

                innerHTML += '<i style="background:' + getColor(grades[i]) + '; opacity:' + opacity(grades[i]) + '; "></i> ' +
                    grades[i]*100 + "%" + (grades[i + 1] ? ' &ndash; ' + grades[i + 1]*100 + "%" + '<br>' : '');
            }

            window.currentYearDiv.html("2016");

            return innerHTML;
        }
    }

    getStyle() {
        let getOpacity = (d) => {
            // return Math.min(Math.abs(d.turnout) * 3, 1.0);
            // return d.turnout;
            return 1.0;
        };

        let getColor = (d) => {
            let strength = d.indice;
            return this.chromaScale(strength).hex();
        };

        return function style(feature) {
            return {
                weight: 0.5,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: getOpacity(feature.properties),
                fillColor: getColor(feature.properties)
            };
        }
    }

    setTooltipData(feature) {
        let tooltipHTML = "<h3>Informatii regiune</h3>";
        tooltipHTML += "<h4> Indice sustenabilitate: " + parseInt(100 * feature.properties.indice) + "% cheltuieli personal / venit propriu</h4>";
        tooltipHTML += "<h4> Nume: " + feature.properties.name + "</h4>";
        tooltipHTML += "<h4> Judet: " + feature.properties.county + "</h4>";
        tooltipHTML += "<h4> Votanti inscrisi pe lista: " + feature.extra.a + "</h4>";

        tooltipDataDiv.html(tooltipHTML);
    }
}

class TurnoutLayer extends BaseLayerGroup {
    constructor() {
        super();
        this.FIRST_DATA_YEAR = 2016;
        this.LAST_DATA_YEAR = 2016;
        this.chromaScale = chroma.scale(['white', 'green']).domain([0.0, 1.0], 5);

        this.layerGroup.getLegendHTML = function () {
            // debugger;
            let grades = [];
            let minGrade = 0.0;
            let maxGrade = 1.0;
            let gradeCount = 5;
            let diffGrade = (maxGrade - minGrade) / gradeCount;
            maxGrade += diffGrade;
            gradeCount += 1;

            for (let i = 0; i < gradeCount; i ++) {
                grades.push((minGrade + diffGrade * i).toFixed(2));
            }

            let innerHTML = "<b>Legenda</b><br>";

            // loop through our density intervals and generate a label with a colored square for each interval
            for (let i = 0; i < grades.length; i++) {
                // let scale = this.chromaScale;
                let scale = chroma.scale(['white', 'green']).domain([0.0, 1.0], 5);
                let getColor = (value) => {return scale(value).hex()};
                let opacity = (value) => {return 1.0};

                innerHTML += '<i style="background:' + getColor(grades[i]) + '; opacity:' + opacity(grades[i]) + '; "></i> ' +
                    grades[i]*100 + "%" + (grades[i + 1] ? ' &ndash; ' + grades[i + 1]*100 + "%" + '<br>' : '');
            }

            window.currentYearDiv.html("2016");

            return innerHTML;
        }
    }

    getStyle() {
        let getOpacity = (d) => {
            // return Math.min(Math.abs(d.turnout) * 3, 1.0);
            // return d.turnout;
            return 1.0;
        };

        let getColor = (d) => {
            let strength = d.turnout;
            return this.chromaScale(strength).hex();
        };

        return function style(feature) {
            return {
                weight: 0.5,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: getOpacity(feature.properties),
                fillColor: getColor(feature.properties)
            };
        }
    }

    setTooltipData(feature) {
        let tooltipHTML = "<h3>Informatii regiune</h3>";
        tooltipHTML += "<h4> Procent prezenta la vot: " + parseInt(100 * feature.properties.turnout) + "%</h4>";
        tooltipHTML += "<h4> Nume: " + feature.properties.name + "</h4>";
        tooltipHTML += "<h4> Judet: " + feature.properties.county + "</h4>";
        tooltipHTML += "<h4> Votanti inscrisi pe lista: " + feature.extra.a + "</h4>";

        tooltipDataDiv.html(tooltipHTML);
    }
}

class NullVoteLayer extends BaseLayerGroup {
    constructor() {
        super();
        this.FIRST_DATA_YEAR = 2016;
        this.LAST_DATA_YEAR = 2016;
        this.chromaScale = chroma.scale(['white', 'red']).domain([0.0, 0.3], 4, 'log');

        this.layerGroup.getLegendHTML = function () {
            // debugger;
            let grades = [];
            let minGrade = 0.0;
            let maxGrade = 0.3;
            let gradeCount = 4;
            let diffGrade = (maxGrade - minGrade) / gradeCount;
            maxGrade += diffGrade;
            gradeCount += 1;

            for (let i = 0; i < gradeCount; i ++) {
                grades.push(parseInt(100 * (minGrade + diffGrade * i).toFixed(2)));
            }

            let innerHTML = "<b>Legenda</b><br>";

            // loop through our density intervals and generate a label with a colored square for each interval
            for (let i = 0; i < grades.length; i++) {
                // let scale = this.chromaScale;
                let scale = chroma.scale(['white', 'red']).domain([0.0, 0.3], 4, 'log');
                let getColor = (value) => {return scale(value).hex()};
                let opacity = (value) => {return 1.0};

                innerHTML += '<i style="background:' + getColor(grades[i] / 100.0) + '; opacity:' + opacity(grades[i] / 100.0) + '; "></i> ' +
                    grades[i] + "" + (grades[i + 1] ? ' &ndash; ' + grades[i + 1] + "%" + '<br>' : '+');
            }

            window.currentYearDiv.html("2016");

            return innerHTML;
        };
        // this.chromaScale = chroma.scale(['white', 'red']).domain([0.01, 0.02, 0.04, 0.08, 0.16, 1.0]);
    }

    getStyle() {
        let getOpacity = (d) => {
            // return Math.min(Math.abs(d.turnout) * 3, 1.0);
            return 1.0;
            // return d.nullvote;
        };

        let getColor = (d) => {
            let strength = d.nullvote;
            return this.chromaScale(strength).hex();
        };

        return function style(feature) {
            return {
                weight: 0.5,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: getOpacity(feature.properties),
                fillColor: getColor(feature.properties)
            };
        }
    }

    setTooltipData(feature) {
        let tooltipHTML = "<h3>Informatii regiune</h3>";
        tooltipHTML += "<h4> Procent vot nul: " + parseInt(100 * feature.properties.nullvote) + "%</h4>";
        tooltipHTML += "<h4> Nume: " + feature.properties.name + "</h4>";
        tooltipHTML += "<h4> Judet: " + feature.properties.county + "</h4>";
        tooltipHTML += "<h4> Votanti inscrisi pe lista: " + feature.extra.a + "</h4>";

        tooltipDataDiv.html(tooltipHTML);
    }
}

class WeatherLayer extends BaseLayerGroup {
    constructor() {
        super();
        this.FIRST_DATA_YEAR = 2016;
        this.LAST_DATA_YEAR = 2016;
        this.chromaScale = chroma.scale(['white', 'blue']).domain([0.0, 20], 5);

        // this.chromaScale = chroma.scale(['white', 'red']).domain([0.01, 0.02, 0.04, 0.08, 0.16, 1.0]);
    }

    getStyle() {
        let getOpacity = (d) => {
            return Math.min(Math.abs(d.precipitation) / 10, 1.0);
            // return 1.0;
            // return d.nullvote;
        };

        let getColor = (d) => {
            let strength = d.precipitation;
            // let strength = 1.0 / (100.0  * d.turnout / (d.precipitation + 0.01));


            return this.chromaScale(strength).hex();
        };

        return function style(feature) {
            return {
                weight: 0.5,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: getOpacity(feature.properties),
                fillColor: getColor(feature.properties)
            };
        }
    }

    setTooltipData(feature) {
        let tooltipHTML = "<h3>Informatii regiune</h3>";
        tooltipHTML += "<h4> Precipitatie: " + feature.properties.precipitation.toFixed(4) + " mm / zi</h4>";
        tooltipHTML += "<h4> Nume: " + feature.properties.name + "</h4>";
        tooltipHTML += "<h4> Judet: " + feature.properties.county + "</h4>";

        tooltipDataDiv.html(tooltipHTML);
    }
}

var demographicsLayer = new DemographicsLayer();
var turnoutLayer = new TurnoutLayer();
var nullVoteLayer = new NullVoteLayer();
var weatherLayer = new WeatherLayer();
var investmentLayer = new InvestmentLayer();

var last_target;

var layer;
var datasetLabel;

// Controls
var info;
var about;
var legend;
var sliderContainer = $("#sliderContainer");
var playButton = $("#playButton");

playButton.click(() => {
    demographicsLayer.startAnimation();
});

var map = L.map('map', {
    center: [45.9267674, 25.1025384],
    zoom: 7,
    zoomControl: false,
    layers: [grayscale],
});

map.on('overlayadd', function(a) {
    if (a.name == 'Demografie') {
        sliderContainer.show();
    }
    legend._container.innerHTML = a.layer.getLegendHTML();
});

map.on('overlayremove', function(a) {
    if (a.name == 'Demografie') {
        sliderContainer.hide();
    }
    legend.getContainer().innerHTML='';
});

// var defaultInfo = '<h4>Informatii<br>Schimba afisajul din stanga</h4>' + "<p>Muta mouseul/Tap <br> pe un obiect de interes</p>";
var defaultInfo = "<h3>Muta mouseul/Tap <br> pe un obiect de interes</h3>";
// var mapboxAccessToken = "pk.eyJ1IjoiY2F0YWxpbnQiLCJhIjoiY2lzbmEzaHJrMDAwczJ4bWVoZTY1YmJ2NyJ9._QXsrLfaJfmE79a8HLuFSQ";

$.getJSON("data/ro_uat_poligon_small.json", function (data) {
    window.data = data;
    window.features = data.features;

    $.getJSON("data/siruta_population.json", (popData) => {
        for (let pop of popData) {
            let siruta = pop.SIRUTA + "";
            sirutaPopMap[siruta] = sirutaPopMap[siruta] || [];
            sirutaPopMap[siruta].push(pop);
        }
        for (let feature of data.features) {
            let siruta = feature.properties.natcode + "";
            feature.properties.siruta = feature.properties.natcode;
            if (sirutaPopMap[siruta]) {
                for (let popEntry of sirutaPopMap[siruta]) {
                    feature.properties["pop" + popEntry.Year] = popEntry.Population;
                }
            } else {
                console.log("Missing siruta info for ", feature);
            }
        }

        demographicsLayer.setData(data);
    });

    $.getJSON("data/extra_locality_regions_data.json", (regData) => {
        for (let key of Object.keys(regData)) {
            let siruta = key + "";
            sirutaRegMap[siruta] = regData[key];
        }

        for (let feature of data.features) {
            let siruta = feature.properties.natcode + "";
            if (sirutaRegMap[siruta]) {
                feature.extra = sirutaRegMap[siruta];
                feature.properties.turnout = 1.0 * feature.extra.b / feature.extra.a;
                feature.properties.nullvote = 1.0 * feature.extra.d / feature.extra.b;
                // console.log(feature.turnout);
            } else {
                console.log("Missing region siruta info for ", feature);
            }
        }

        turnoutLayer.setData (data);
        nullVoteLayer.setData (data);
    });

    $.getJSON("data/locatii_cu_meteo_locale_2016.json", (newData) => {
        for (let entry of newData) {
            let siruta = entry.SIRUTA + "";
            sirutaWeaMap[siruta] = entry;
        }

        for (let feature of data.features) {
            let siruta = feature.properties.natcode + "";
            if (sirutaWeaMap[siruta]) {
                feature.properties.precipitation = sirutaWeaMap[siruta].Precipitation;
            } else {
                console.log("Missing siruta info for ", feature);
            }
        }
        
        weatherLayer.setData(data);
    });

    $.getJSON("data/venituri_2011_2015.json", (newData) => {
        for (let entry of newData) {

            if (entry.Year == 2015) {
                // console.log(entry);
                let siruta = entry.SIRUTA + "";
                sirutaInvestmentMap[siruta] = entry;
            }
        }

        for (let feature of data.features) {
            let siruta = feature.properties.natcode + "";
            if (sirutaInvestmentMap[siruta]) {
                feature.properties.indice = 1.0 * sirutaInvestmentMap[siruta].Cheltuieli_personal / sirutaInvestmentMap[siruta].Venit_propriu;
            } else {
                console.log("Missing siruta info for ", feature);
            }
        }
        
        investmentLayer.setData(data);
    });
});

var baseMaps = {
    "Fara": L.tileLayer("", {opacity: 0.0}),
    "Strazi": streets,
    "Grayscale": grayscale,
};

var overlays = {
    "Demografie": demographicsLayer.layerGroup,
    "Prezenta vot locale 2016": turnoutLayer.layerGroup,
    "Vot nul locale 2016": nullVoteLayer.layerGroup,
    "Indicator sustenabilitate 2015:": investmentLayer.layerGroup,
    "Vremea locale 2016": weatherLayer.layerGroup,
};

demographicsLayer.addTo(map);
// turnoutLayer.addTo (map);
// nullVoteLayer.addTo(map);
// weatherLayer.addTo(map);

var layerControl = L.control.layers(baseMaps, overlays, {position: 'topleft', collapsed: true}).addTo(map);

// Settings Menu
let tooltipDataDiv = $("#tooltipDataDiv");
let legendDiv = $("#legendDiv");
window.currentYearDiv = $("#currentYearDiv");

tooltipDataDiv.html(defaultInfo);
$("#dataset").on("change", function() {
    datasetLabel = this.value;
    // TODO: load new json + redraw
    // tooltipDataDiv.html(this.value);

    if (this.value != "populatie") {
        currentYearDiv.hide();
    } else {
        currentYearDiv.show();
    }

    if (this.value === "populatie") {
        // TODO: hardcode this values
        legendDiv.html(datasetLabel);
    } else if (this.value === "electoral") {

    }
});



// Legend
legend = L.control({position: 'topright'});

legend.onAdd = function (map) {
    let div = L.DomUtil.create('div', 'info legend');

    // div.innerHTML += '<i style="background-color:' + "blue" + '"></i> ' + "-0.25" + '<br>' : '+');


    return div;
};
legend.addTo(map);

var firstYearDiv = $("#firstYearDiv");
var lastYearDiv = $("#lastYearDiv");

var slider = $("#slider").slider({});
var speedSlider = $("#speedSlider").slider({});
speedSlider.speed = 2;

function changeYear(startYear, endYear) {
    demographicsLayer.stopAnimation();
    demographicsLayer.setFirstYear(parseInt(startYear));
    demographicsLayer.setLastYear(parseInt(endYear));
}

sliderContainer.hide();
slider.on("slide", (event) => {
   // debugger;
    let firstYear = event.value[0];
    let lastYear = event.value[1];
    // console.log(event.value);
    firstYearDiv.html(firstYear);
    lastYearDiv.html(lastYear);
    changeYear(event.value[0], event.value[1]);
    slider.value = event.value;
});
slider.on("slideStop", (event) => {
   //  changeYear(event.value[0], event.value[1]);
});

speedSlider.on("slideStop", (event) => {
    speedSlider.speed = event.value;
    // console.log(event.value);
});
