<?php

    $authState  = function($session) {
        $state  = null;


        if (isset($session['token'])) {
            $token  = $session['token'];
            $cert   = realpath("../server/$token");

            if (!$cert) {
                error_log("(Session Auth) Bad Token: $token");
                $state  = -1;
            } else {

                $cert   = file_get_contents($cert);

                if (!$cert) {
                    error_log("(Session Auth) Bad Cert: $token");
                    $state  = -2;
                } else {
                    $cert   = ($cert == $token);

                    if (!$cert) {
                        error_log("(Session Auth) Token doest match Cert: $cert != $token");
                        $state  = -3;
                    } else {
                        $state  = 1;
                    }
                }
            }

        } elseif (isset($_REQUEST['token']) and $_REQUEST['token'] == 0) {
            $username       = (isset($_REQUEST['username']))
                ? $_REQUEST['username']
                : null
            ;

            $password       = (isset($_REQUEST['password']))
                ? $_REQUEST['password']
                : null
            ;

            if (!$username or !$password) {
                error_log("(Post Auth) Bad username or password");
                $state  = -4;
            }

            $generateToken  = function($username, $password) {
                return md5(sha1($username).$username.sha1($password.$username));
            };

            $token          = $generateToken($username, $password);
            $cert           = realpath("../server/$token");


            if (!$cert) {
                error_log("(Post Auth) Bad Token: $token");
                $state  = -1;
            } else {
                $cert   = file_get_contents($cert);
                if (!$cert) {
                    error_log("(Post Auth) Bad Cert: $token");
                    $state  = -2;
                } else {
                    $cert   = ($cert == $token);
                    if (!$cert) {
                        error_log("(Post Auth) Token doest match Cert: $cert != $token");
                        $state  = -3;
                    } else {
                        $state      = 1;
                        $_SESSION['token']  = $token;
                    }
                }
            }

        } elseif (isset($_REQUEST['token']) and $_REQUEST['token']) {
            $token  = $_REQUEST['token'];
            $cert   = realpath("../server/$token");

            if (!$cert) {
                error_log("(Token Auth) Bad Token: $token");
                $state  = -1;
            } else {
                $cert   = file_get_contents($cert);

                if (!$cert) {
                    error_log("(Token Auth) Bad Cert: $token");
                    $state  = -2;
                } else {
                    $cert   = ($cert == $token);

                    if (!$cert) {
                        error_log("(Token Auth) Token doest match Cert: $cert != $token");
                        $state  = -3;
                    } else {
                        $state  = 1;
                    }
                    
                }
                
            }
        } else {
            $state      = 0;
        }

        return $state;
    };

    $authCheck  = function($stateHandler) {
        session_start();
        $state  = $stateHandler($_SESSION);

        if ($state === 1) {
            define('AUTH', true);
        } elseif ($state === 0) {
            define('AUTH', false);
        } else {
            define('AUTH', 'error');
        }

        if ($state !== 1) unset($_SESSION);
        return $state;
    };

    return $authCheck($authState);

?>