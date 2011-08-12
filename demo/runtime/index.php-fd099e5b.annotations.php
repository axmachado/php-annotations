<?php

return array(
  'Person::$name' => array(
    array('Mindplay\\Annotation\\Standard\\VarAnnotation', 'type' => 'string'),
    array('Mindplay\\Annotation\\Standard\\RequiredAnnotation'),
    array('Mindplay\\Annotation\\Standard\\LengthAnnotation', 50),
    array('Mindplay\\Annotation\\Standard\\TextAnnotation', 'label' => 'Full Name')
  ),
  'Person::$address' => array(
    array('Mindplay\\Annotation\\Standard\\VarAnnotation', 'type' => 'string'),
    array('Mindplay\\Annotation\\Standard\\LengthAnnotation', 50),
    array('Mindplay\\Annotation\\Standard\\TextAnnotation', 'label' => 'Street Address')
  ),
  'Person::$age' => array(
    array('Mindplay\\Annotation\\Standard\\VarAnnotation', 'type' => 'int'),
    array('Mindplay\\Annotation\\Standard\\RangeAnnotation', 0, 100)
  ),
);
