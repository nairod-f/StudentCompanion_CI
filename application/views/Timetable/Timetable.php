
<div class="schedule">
        <ul class="times">
            <li></li>
            <li>08:00</li>
            <li>09:00</li>
            <li>10:00</li>
            <li>11:00</li>
            <li>12:00</li>
            <li>13:00</li>
            <li>14:00</li>
            <li>15:00</li>
            <li>16:00</li>
            <li>17:00</li>
            <li>18:00</li>
            <li>19:00</li>
            <li>20:00</li>
        </ul>
        <ul class="timetable">
            <li class="weekdays">Monday</li>
            <li class="weekdays">Tuesday</li>
            <li class="weekdays">Wednesday</li>
            <li class="weekdays">Thursday</li>
            <li class="weekdays">Friday</li>

            <li class="template invisible">
                <form>
                    <input type="text" class="add-subject">

                    <button type="submit">Add</button>
                     <button type="button" class="delete">Delete</button>
                </form>
            </li>

<?php
        #Setting up table 2squares2 fields etc ---- weekdays
            for ($t = 0; $t < 13; $t++):
                for ($d = 0; $d < 5; $d++):

                    $hidden = array (
                        'day'   => $d,
                        'time'  => $t
                    );

?>
            <li>
                <?=form_open('timetable/edit_timeslot', NULL, $hidden);?>
                    <?=form_input($form['lecture'])?>
                    <?=form_input($form['location'])?>
                    <?=form_submit('Send')?>
                <?=form_close();?>
            </li>
<?php
                endfor;
            endfor;
?>
        </ul>
    </div>
