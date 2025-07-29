<?php

// renderView('courses_new_get');

$result = getCourses();

renderView('courses_get',[
    'courses' => $result
]);