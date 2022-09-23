<?php

namespace Src\Core;

class Session
{
    /**
     * Constructor
     */
    public function __construct()
    {
        if (!session_id()) session_start();
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function __isset(string $name): bool
    {
        return $this->has($name);
    }

    /**
     * Gets an item from session
     *
     * @param string $name
     * @return string|null
     */
    public function __get(string $name): string|null
    {
        return !empty($_SESSION[$name]) ? $_SESSION[$name] : null;
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function has(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    /**
     * Sets a new value to the session
     *
     * @param string $name
     * @param mixed $value
     * @return Session
     */
    public function set(string $name, mixed $value): Session
    {
        $_SESSION[$name] = is_array($value) ? (object)$value : $value;
        return $this;
    }

    /**
     * Removes an item from the session
     *
     * @param string $name
     * @return void
     */
    public function unset(string $name): void
    {
        unset($_SESSION[$name]);
    }

    /**
     * Regenerates the current session
     *
     * @return Session
     */
    public function regenerate(): Session
    {
        session_regenerate_id(true);
        return $this;
    }

    /**
     * Destroys the current session
     *
     * @return Session
     */
    public function destroy(): Session
    {
        session_destroy();
        return $this;
    }

    /**
     * Returns and deletes flash messages
     *
     * @param string $name
     * @return void
     */
    public function flash(string $name)
    {
        if ($this->has($name)) {
            $flash = $this->$name;
            $this->unset($name);
            return $flash;
        }
        return null;
    }

    /**
     * CSRF Token
     *
     * @return void
     */
    public function csrf(): void
    {
        $_SESSION['csrf_token'] = md5(uniqid(rand(), true));
    }
}
