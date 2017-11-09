<?php

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/Components/Hero.php';

echo "Testing Empty Case:\n\n" . tbhHeroShortcode([]) . "\n\n"; // Empty Case

echo "Testing Single Image Case:\n\n" . tbhHeroShortcode([
  'images'=>[
    'http://s2.quickmeme.com/img/7a/7afc1dd7a08b30be0958e48a7ec39d7951859d449ca763de004107d9da52e45d.jpg'
  ]
]) . "\n\n"; // Single Image Case

echo "Testing Multi-Image Case:\n\n" . tbhHeroShortcode([
  'images'=>[
    'http://s2.quickmeme.com/img/7a/7afc1dd7a08b30be0958e48a7ec39d7951859d449ca763de004107d9da52e45d.jpg',
    'http://s.quickmeme.com/img/1d/1deba2460a28ea1899dd8b7fdb78ed901f948f0ad4c7706f3d3a70c388f0417c.jpg'
  ]
]) . "\n\n"; // Multi-Image Case
