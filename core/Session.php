<?php

class Session
{
	public function __construct()
	{
		session_start();
	}

	public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
		var_dump($_SESSION);
		echo '<br>';
        return $_SESSION[$key] ?? false;
    }

    public function del($key)
    {
        unset($_SESSION[$key]);
    }
}