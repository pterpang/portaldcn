$(function () {
    //Widgets count
    $('.count-to').countTo();

    //Sales count to
    $('.sales-count-to').countTo({
        formatter: function (value, options) {
            return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
        }
    });

    // initRealTimeChart();
    // initSparkline();
});


// function initRealTimeChart() {
//     var date = new Date();
//     var min = [];
//     for(i=0;i<7;i++){
//         date.setDate(date.getDate() - 1);
//         min[i] = date.getDate()+'/'+ (date.getMonth()+1) +'/'+date.getFullYear();
//     }
//     //Real time ==========================================================================================
//     var plot = $.plot('#real_time_chart', [getRandomData()], {
//         series: {
//             shadowSize: 0,
//             color: 'rgb(0, 200, 83)',
//             // color: 'rgb(0, 188, 212)'
//         },
//         grid: {
//             borderColor: '#f3f3f3',
//             borderWidth: 1,
//             tickColor: '#f3f3f3',
//             hoverable: true,
//             autoHighlight: true,
//         },
//         lines: {
//             fill: true
//         },
//         yaxis: {
//             min: 0,
//             max: 80
//         },
//         xaxis: {
//             ticks: [[0,min[6]],[1,min[5]],[2,min[4]],[3,min[3]],[4,min[2]],[5,min[1]],[6, min[0]]]
//         },
//     });

// }

function initSparkline() {
    $(".sparkline").each(function () {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });
}

// function initDonutChart() {
//     Morris.Donut({
//         element: 'donut_chart',
//         data: [{
//             label: 'IB',
//             value: 37
//         }, {
//             label: 'SF',
//             value: 30
//         }, {
//             label: 'TP',
//             value: 18
//         }, {
//             label: 'LAN',
//             value: 12
//         }],
//         colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'],
//         formatter: function (y) {
//             return y + '%'
//         }
//     });
// }

// var data = [], totalPoints = 7;
// function getRandomData() {
//     if (data.length > 0) data = data.slice(1);

//     while (data.length < totalPoints) {
//         var prev = data.length > 0 ? data[data.length - 1] : 50, y = prev + Math.random() * 10 - 5;
//         if (y < 0) { y = 0; } else if (y > 100) { y = 100; }

//         data.push(y);
//     }

//     var res = [];
//     for (var i = 0; i < data.length; ++i) {
//         res.push([i, data[i]]);
//     }
//     // var res = [];
//     // res[0] = 99;
//     // res[1] = 55;
//     // res[2] = 60;
    
//     return res;
// }