<?php

function customEmpty($arr)
{
	if ($arr[]) {
		return true;
	}
	return false
}

var_dump(customEmpty([1,2,3]))