var layout1 = {
  title: "Number of Bookings per Week on past month",
  xaxis: {
    title: "Week",
  },
  yaxis: {
    title: "Number of Bookings",
  },
};

Plotly.newPlot("myPlot1", data1, layout1);

var layout2 = {
  title: "Revenue per Week on past month",
  xaxis: {
    title: "Week",
  },
  yaxis: {
    title: "Revenue (Rs.)",
  },
};

Plotly.newPlot("myPlot2", data2, layout2);

var layout3 = {
  title: "Type of Bookings on the past month",
};

var data3 = [
  {
    labels: xArray,
    values: yArray,
    type: "pie",
  },
];

Plotly.newPlot("myPlot3", data3, layout3);

var layout4 = {
  title: "Service Teams' bookings on the past month",
};

var data4 = [
  {
    labels: xArray2,
    values: yArray2,
    type: "pie",
  },
];

Plotly.newPlot("myPlot4", data4, layout4);
