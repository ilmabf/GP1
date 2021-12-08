<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calendar</title>
    <link rel="icon" href="/public/images/drop.png">
    <link rel="stylesheet" href="/public/css/actors/customer/BookAWashCalendar.css" />
    <link rel="stylesheet" href="/public/css/components/Buttons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="container" id = "cal1">
        <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">
                    <h1></h1>
                    <p></p>
                    <h3>Select an available time <b>( Green - available )</b></h3>
                </div>
                <i class="fas fa-angle-right next"></i>
            </div>
            <div class="weekdays">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="days"></div>
        </div>
        <!-- <div class="button-calendar">
            <button class="next-button">

                <a href="/booking/details" style="color: white; text-decoration: none; z-index:2;">Next</a></button>

        </div> -->
    </div>
    <script src="/public/js/CustomerCalendar.js"></script>
</body>

</html>