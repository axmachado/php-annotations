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
  'Sample\\AliasMe' => array(
    array('Sample\\AliasedAnnotation')
  ),
);
