<?php

namespace App\Controllers;

use Svv\Framework\Controller;
use App\Models\ContactForm;
use Svv\Framework\Http\Request;

class SiteController extends Controller
{

    public function home ()
    {
        $params = [
            "name" => "Sébou",
        ];

        return $this->render("home", $params);
    }

    public function contact (Request $request)
    {
        $contact = new ContactForm();
        if ($request->isPost())
        {
            $contact->loadData($request->getBody());
            if ($contact->isValid() && $contact->send())
            {
                $this->session()->setFlash("success", "Thanks for contacting us!");
                return $this->redirect("/contact");
            }
        }
        return $this->render("contact", [
            "model" => $contact,
        ]);
    }

}
