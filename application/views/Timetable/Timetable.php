
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



<?php
//var_dump ($sessions->result()); die;

            $row = $sessions->first_row('array');

        #Setting up table 2squares2 fields etc ---- weekdays
            for ($t = 0; $t < 13; $t++):
                for ($d = 0; $d < 5; $d++):

                    $hidden = array (
                        'day'   => $d,
                        'time'  => $t
                    );

            $item = NULL;
            if($d == $row['session_day'] && $t == $row['session_time']){
                $item = $row;
                $row = $sessions->next_row('array');
            }
?>
            <li>
<?php
    if ($item !=  NULL):
?>
        <a href="<?=site_url("timetable/edit/{$item['id']}")?>">
            <?=$item['lecture_name']?><br><?=$item['lecture_location']?>
        </a>
<?php
    else:
?>
        <a href="<?=site_url("timetable/add/$d/$t")?>">+</a>

<?php
    endif;
?>
            </li>
<?php
                endfor;
            endfor;
?>
        </ul>
    </div>
