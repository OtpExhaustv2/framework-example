<?php

namespace App\Controllers;

use Svv\Framework\Controller;
use App\Models\User;
use App\Models\LoginForm;
use Svv\Framework\App;
use Svv\Framework\Middlewares\AuthMiddleware;
use Svv\Framework\Http\Request;

class AuthController extends Controller
{

    public function __construct ()
    {
        $this->registerMiddleware(new AuthMiddleware(["profile"]));
    }

    public function login (Request $request)
    {
        $loginForm = new LoginForm();
        if ($request->isPost())
        {
            $loginForm->loadData($request->getBody());
            if ($loginForm->isValid() && $loginForm->login())
            {
                $this->redirect("/");
                return;
            }
        }
        //$this->setLayout("auth");
        return $this->render("login", [
            "model" => $loginForm,
        ]);
    }

    public function register (Request $request)
    {
        $user = new User();

        if ($request->isPost())
        {
            $user->loadData($request->getBody());

            if ($user->isValid() && $user->save())
            {
                $this->session()->setFlash("success", "Thanks for registration");
                $this->redirect("/");
            }

            return $this->render("register", [
                "model" => $user,
            ]);
        }

        //$this->setLayout("auth");
        return $this->render("register", [
            "model" => $user,
        ]);
    }

    public function logout (Request $request)
    {
        App::$app->logout();
        $this->redirect("/");
    }

    public function profile ()
    {
        return $this->render("profile", [
            "user" => $this->getUser(),
        ]);
    }
}
