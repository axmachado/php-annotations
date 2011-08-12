<?php

return array(
  'Sample\\SampleAnnotation' => array(
    array('Mindplay\\Annotation\\Core\\UsageAnnotation', 'class'=>true)
  ),
  'Sample\\SampleClass' => array(
    array('Sample\\SampleAnnotation')
  ),
  'Sample\\AnnotationInDefaultNamespace' => array(
    array('Sample\\DefaultSampleAnnotation')
  ),
  'Sample\\IgnoreMe' => array(
    array('Sample\\IgnoredAnnotation')
  ),
  'Sample\\AliasMe' => array(
    array('Sample\\SampleAnnotation')
  ),
);
