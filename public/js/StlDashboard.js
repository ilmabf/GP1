var  months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var d = new Date();
var monthName=months[d.getMonth()-1];

var layout1 = {
    title: 'Jobs completed per Week in ' + monthName,
    xaxis: {
        title: 'Week'
    },
    yaxis: {
        title: 'Number of Jobs'
    }
};

Plotly.newPlot('myPlot1', data1, layout1);

var layout2 = {
    title: "Jobs completed per Wash Package in " + monthName
};

var data2 = [{
    labels: xArray,
    values: yArray,
    type: "pie"
}];

Plotly.newPlot('myPlot2', data2, layout2);