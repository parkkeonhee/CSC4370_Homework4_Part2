<!doctype html>
<!--
    Created by Keon Hee Park 
    Assignment 4: Part 2
    date_assignment4_part2.html
	Course: CSC 4370 - Web Programming
	Instructor: Louis Henry
	Date: October 8, 2016
-->
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Assignment 4</title>
</head>

<body>
    <div class="container">
        <?php
            date_default_timezone_set('America/New_York');
        ?>
            <h1>
                <b>Assignment 4 - Part 2:</b>
                <br>Calendar Page
            </h1>
            <hr/>
            <h1>
                <?php
                print "<br>";
                print "<b>";
                print "Today is ";
                print "</b>";
                print date('l') . ".";
                print "<br>";
                print "<b>";
                print "Time is ";
                print "</b>";
                print date('g') . ":" . date('i') . " " . $currentPeriod . " " . date('A') . " " . date('T') . ".";
                ?>
            </h1>
            <br>
            <br>
            <table id="event_table">
                <tr>
                    <th class="table_header"><b>Clock Hour</b></th>
                    <th class="table_header"><b>Hours added</b></th>
                </tr>

                <?php
                    addHours();
                ?>
                    <?php
                function addHours(){
                    for($hours_to_add=0; $hours_to_add<=12; $hours_to_add++){
                        $currentHour = date('G');
                        //$currentHour = 18;
                        $currentPeriod = date('A');
                        //$currentPeriod = "PM";
                        $modifiedHour = $currentHour + $hours_to_add;
                        colorRows($hours_to_add);
                        if($currentHour > 12 && $modifiedHour < 24){
                            $modifiedHour -= 12;
                            print $modifiedHour . ":00 " . "PM";
                        }else if($currentHour < 12 && $modifiedHour < 12){
                            print $modifiedHour . ":00 " . "AM";
                        } else if($currentHour <= 12 && $modifiedHour < 24){
                            if($modifiedHour < 12){
                                print $modifiedHour . ":00 " . "AM";
                            }else{
                                if($modifiedHour != 12){
                                    $modifiedHour -= 12;
                                }
                                print $modifiedHour . ":00 " . "PM";
                            }
                        } else if($currentHour > 12 && $modifiedHour > 24){
                            $modifiedHour -= 24;
                            if($modifiedHour == 12){
                                print $modifiedHour . ":00 " . "PM";
                            }else{
                                print $modifiedHour . ":00 " . "AM";
                            }
                        }
                        else{
                            $modifiedHour = $modifiedHour - 24;
                            if($modifiedHour == 12){
                                print $modifiedHour . ":00 " . "PM";
                            }else{
                                print $modifiedHour . ":00 " . "AM";
                            }
                        }
                        print "</td>";
                        print "<td class='hr_td'>";
                        if($hours_to_add == 0){
                            print "+". $hours_to_add . ":00 (hr)";
                        } else{
                            print "+". $hours_to_add . ":00 (hrs)";
                        }
                        print "</td>";
                        print "</tr>";
                    }
                }
                
                function colorRows($value){
                    if($value % 2 == 0){
                        print "<tr class='even_row hr_td'>";
                    } else{
                        print "<tr class='odd_row hr_td'>";
                    }
                    print "<td class='hr_td'>";
                }
                ?>
            </table>
    </div>

    <footer>
        <div class="centering">
            <img src="https://www.w3.org/Icons/valid-html401" alt="Valid HTML!" />
            <img src="https://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" />
        </div>
    </footer>

</body>

</html>