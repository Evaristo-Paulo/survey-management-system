var data = document.getElementById('data_graphic').value
data = JSON.parse(data)

var question = document.getElementById('question').value


/* CONVERTER SEMPRE O 1º ELEMENTO DO VECTOR EM STRING */
for (i = 0; i < data.length; i++){
    data[i][0] = data[i][0] + ''
}

console.log(data)

Highcharts.chart('detail-graphic', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },

    title: {
        text: 'Pergunta: ' + question
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        formatter: function () {
            return this.point.name + ': <b>' + Highcharts.numberFormat(this.percentage, 0) + '%</b>';
        }
    },
    legend: {
        align: 'center',
        verticalAlign: 'bottom',
        layout: 'horizontal'
    },
    plotOptions: {
        pie: {
            showInLegend: true,
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                formatter: function () {
                    return Highcharts.numberFormat(this.percentage, 0) + '%</b>';
                }
            }
        },
    },
    series: [{
        type: 'pie',
        name: 'Percentagem',
        data: data
    }]
});
