var layout1 = {
    title: 'Jobs completed per Week in previous month',
    xaxis: {
        title: 'Week'
    },
    yaxis: {
        title: 'Number of Bookings'
    }
};

Plotly.newPlot('myPlot1', data1, layout1);

var layout2 = {
    title: "Jobs completed per Wash Package in previous past month"
};

var data2 = [{
    labels: xArray,
    values: yArray,
    type: "pie"
}];

Plotly.newPlot('myPlot2', data2, layout2);