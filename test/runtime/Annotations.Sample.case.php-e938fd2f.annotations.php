<?php

return array(
  'Sample\\SampleAnnotation' => array(
    array('Mindplay\\Annotation\\Core\\UsageAnnotation', 'class'=>true)
  ),
  'Sample\\SampleClass' => array(
    array('Sample\\SampleAnnotation')
  ),
  'Sample\\AnnotationInDefaultNamespace' => array(
    array('DefaultSampleAnnotation')
  ),
  'Sample\\IgnoreMe' => array(
    array('IgnoredAnnotation')
  ),
  'Sample\\AliasMe' => array(
    array('AliasedAnnotation')
  ),
);
