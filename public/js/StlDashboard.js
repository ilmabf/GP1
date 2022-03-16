var layout1 = {
    title: 'Number of Bookings per Week on past month',
    xaxis: {
        title: 'Week'
    },
    yaxis: {
        title: 'Number of Bookings'
    }
};

Plotly.newPlot('myPlot1', data1, layout1);

var layout2 = {
    title: "Number of Bookings per Wash Package on past month"
};

var data2 = [{
    labels: xArray,
    values: yArray,
    type: "pie"
}];

Plotly.newPlot('myPlot2', data2, layout2);