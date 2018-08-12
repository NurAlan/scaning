<?php
  use Illuminate\Support\Facades\Response;

  function is_ajax($ajax)
  {
  	if(!$ajax)
  	{
  		return FALSE;
    }
    else
    {
      return TRUE;
  }

 ?>
