<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timetable extends SC_Controller {

	public function index()
	{
		$this->build('Timetable/Timetable');
	}
    public function edit_timeslot($day, $time){

        $data = array (
            'formdata'  => array (
                'action'        => 'add_lecture',
                'attributes'    => array (
                'id'            => 'lecture'
                )
            ),
			'form'		=> array (
				'Lesson'		=> array (
					'type'			=> 'text',
					'name'			=> 'input-lesson',
					'placeholder'	=> 'Eg. English',
                    'id'            => 'input-lesson',

				),
				'place'			=> array (
					'type'			=> 'text',
					'name'			=> 'input-place',
					'placeholder'	=> 'Eg. Resource room',
                    'id'            => 'input-place',
				)
		);
    }
}
