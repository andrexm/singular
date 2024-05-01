<?php

namespace Src\Core;

use Src\Models\User;

class Auth
{
	private static $user;
	private static $instance;
	
	private function __construct()
	{}

    /**
     * Returns an Auth instance
     *
     * @return Auth
     */
    public static function getInstance(): Auth
    {
        if (!self::$instance) {
            self::$instance = new Auth;
        }
        return self::$instance;
    }
	
	/**
	* Authentication attempt
	* @return bool
	*/
	public static function attempt(): bool
	{
		if(!csrf_verify(request()->getReqData())) return false; // invalid csrf

		if(isset($_COOKIE['waitAttempt'])) { // wait until 5 minutes to try again
			session()->set("error", "Aguarde para tentar novamente.");
			return false;
		}

		if(self::countAttempts() > 5) { // too much invalid attempts
			session()->set("error", "Muitas tentativas sem sucesso, aguarde alguns minutos para tentar novamente.");
			setcookie("waitAttempt", true, LOGIN_ATTEMPTS_WAITING_TIME, "/");
			session()->set("attempts", 0); // reset attempts counting
			return false;
		}

		$user = (new User())->findByEmail();
		
		if(!isset($user->email)) { // user not found
			session()->set("error", "Email ou senha incorretos!");
			return false;
		}

		if(!password_verify(request()->input("password"), $user->password)) { // invalid password
			session()->set("error", "Email ou senha incorretos!");
			return false;
		}

		session()->set("success", "Login realizado com sucesso!");
		session()->set("email", request()->input("email"));
		session()->set("attempts", 0); // reset attempts counting
		self::$user = $user;

		return true;
	}

	/**
	* Is an anonymous user?
	* @return bool
	*/
	public static function guest(): bool
	{
		return !session()->has("email");
	}

	/**
	* @return User|bool
	*/
	public static function activeUser(): User|bool
	{
		if(session()->has("email")) {
			self::$user = (new User())->findByEmail(session()->email);
		}
		return self::$user ?? false;
	}

	/**
	* @return void
	*/
	public static function logout(): void
	{
		session()->unset("email");
	}

	/**
	* @return int
	*/
	private static function countAttempts(): int
	{
		$count = 0;
		if(session()->has("attempts")) {
			$count = session()->attempts;
		}
		session()->set("attempts", ++$count);
		return $count;
	}
}
