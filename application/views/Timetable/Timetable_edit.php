<main id="edit-timetable-page">

    <?=form_open('timetable/edit_timeslot', NULL, $form['hidden']);?>
        <?=form_input($form['lecture'])?>
        <?=form_input($form['location'])?>
        <?=form_submit(NULL, 'Add')?>
    <?=form_close();?>
