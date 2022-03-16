$('#CustomerCompletedDate').datepicker({
    dateFormat: 'yy-mm-dd',
    onSelect: function(date) {

        document.getElementById("customerCompletedReservations").innerHTML = '';

        var i = 0;
        var list = [];

        for (i = 0; i < orders.length; i++) {
            if (orders[i]['Date'] == date) {
                var order = [];
                order['Reservation_ID'] = orders[i]['Reservation_ID'];
                order['Vehicle_ID'] = orders[i]['Vehicle_ID'];
                order['Time'] = orders[i]['Time'];
                list.push(order);
            }
        }
        var x = document.getElementById("customerCompletedReservations");

        for (j = 0; j < list.length; j++) {

            if (list[j]['Reservation_ID'].length == 1) {
                var id = "000" + list[j]['Reservation_ID'];
            } else if (list[j]['Reservation_ID'].length == 2) {
                var id = "00" + list[j]['Reservation_ID'];
            } else if (list[j]['Reservation_ID'].length == 3) {
                var id = "0" + list[j]['Reservation_ID'];
            } else var id = list[j]['Reservation_ID'];

            x.innerHTML += "<div class='sub-box1' >" +
                "<div class='order'>" +
                "<div class='orderitem'>Order ID</div>" +
                "<div class='orderitem1'>" + id + "</div>" +
                "</div>" +
                "<div class='order'>" +
                "<div class='orderitem'>Vehicle No</div>" +
                "<div class='orderitem1'>" + list[j]['Vehicle_ID'] + "</div>" +
                "</div>" +
                "<div class='order'>" +
                "<div class='orderitem'>Time</div>" +
                "<div class='orderitem1'>" + list[j]['Time'] + "</div>" +
                "</div>" +
                "<div class='orderView'>" +
                "<p class='viewLink'><a href='/booking/completedOrder/" + list[j]['Reservation_ID'] +
                "'>View Invoice</a></p>" +
                "</div>" +
                "</div>";

        }

    }
});