<?php

namespace AppBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;

class MachineController extends Controller {

    /**
     * Get all machines.
     *
     * @View(template="AppBundle:Machine:show.html.twig")
     */
    public function getMachinesAction() {

        $machines = $this->getDoctrine()->getRepository('AppBundle:Machine')
            -> findAll();

        return array('machines' => $machines);
    }
}
