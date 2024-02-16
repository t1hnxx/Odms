<?php

function get_admin($path = ''): string{
  
  if(file_exists($path)){
    return $path;
  }
  return 'unknown.jpg';

}
