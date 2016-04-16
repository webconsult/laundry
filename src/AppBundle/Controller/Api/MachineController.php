<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;

class MachineController extends Controller {

    /**
     * @return array
     * @View()
     */
    public function getMachinesAction() {

        $view = View::create();

        $machines = $this->getDoctrine()->getRepository('AppBundle:Machine')
            -> findAll();

        $view->setData($machines);

        return $view;

//        return array('machines' => $machines);
    }
}
