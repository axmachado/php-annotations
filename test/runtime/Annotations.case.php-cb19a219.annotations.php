<?php

return array(
  'NoteAnnotation' => array(
    array('Mindplay\\Annotation\\Core\\UsageAnnotation', 'class'=>true, 'property'=>true, 'method'=>true, 'inherited'=>true, 'multiple'=>true)
  ),
  'DocAnnotation' => array(
    array('Mindplay\\Annotation\\Core\\UsageAnnotation', 'class'=>true)
  ),
  'SingleAnnotation' => array(
    array('Mindplay\\Annotation\\Core\\UsageAnnotation', 'property'=>true, 'multiple'=>false)
  ),
  'OverrideAnnotation' => array(
    array('Mindplay\\Annotation\\Core\\UsageAnnotation', 'property'=>true, 'multiple'=>false, 'inherited'=>true)
  ),
  'SampleAnnotation' => array(
    array('Mindplay\\Annotation\\Core\\UsageAnnotation', 'method'=>true)
  ),
  'UninheritableAnnotation' => array(
    array('Mindplay\\Annotation\\Core\\UsageAnnotation', 'class'=>true, 'inherited'=>false)
  ),
  'TestBase' => array(
    array('DocAnnotation', 'value' => 1234),
    array('NoteAnnotation', "Applied to the TestBase class"),
    array('UninheritableAnnotation', 'test'=>'Test cannot inherit this annotation')
  ),
  'TestBase::$sample' => array(
    array('NoteAnnotation', "Applied to a TestBase member")
  ),
  'TestBase::$only_one' => array(
    array('SingleAnnotation', 'test'=>'one is okay'),
    array('SingleAnnotation', 'test'=>'two is one too many')
  ),
  'TestBase::$mixed' => array(
    array('NoteAnnotation', "First note annotation"),
    array('OverrideAnnotation', 'test'=>'This annotation should get filtered')
  ),
  'TestBase::run' => array(
    array('NoteAnnotation', "Applied to a hidden TestBase method"),
    array('SampleAnnotation', 'test'=>'This should get filtered')
  ),
  'Test' => array(
    array('NoteAnnotation', 
"Applied to the Test class (a)"
),
    array('NoteAnnotation', "And another one for good measure (b)")
  ),
  'Test::$hello' => array(
    array('NoteAnnotation', "Applied to a property")
  ),
  'Test::$override_me' => array(
    array('OverrideAnnotation', 'test'=>'This annotation overrides the one in TestBase')
  ),
  'Test::$mixed' => array(
    array('NoteAnnotation', "Second note annotation")
  ),
  'Test::run' => array(
    array('NoteAnnotation', "First Note Applied to the run() method"),
    array('NoteAnnotation', "And a second Note")
  ),
  'ValidationTest::$custom' => array(
    array('Mindplay\\Annotation\\Standard\\ValidateAnnotation', 'ValidationTest', 'validate')
  ),
  'ValidationTest::$url' => array(
    array('TypeAnnotation', 'url')
  ),
  'ValidationTest::$sex' => array(
    array('Mindplay\\Annotation\\Standard\\EnumAnnotation', array('M'=>'Male', 'F'=>'Female'))
  ),
  'ValidationTest::$age' => array(
    array('Mindplay\\Annotation\\Standard\\RequiredAnnotation', ),
    array('Mindplay\\Annotation\\Standard\\RangeAnnotation', 1,100)
  ),
  'ValidationTest::$long' => array(
    array('Mindplay\\Annotation\\Standard\\LengthAnnotation', 100,255)
  ),
  'ValidationTest::$lengthy' => array(
    array('Mindplay\\Annotation\\Standard\\LengthAnnotation', 255)
  ),
  'ValidationTest::$password' => array(
    array('Mindplay\\Annotation\\Standard\\LengthAnnotation', 6,10),
    array('PatternAnnotation', '/[a-z0-9_]+/')
  ),
);
