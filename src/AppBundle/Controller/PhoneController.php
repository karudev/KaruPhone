<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GuzzleHttp\Client;


class PhoneController extends Controller
{
    /**
     * @Route("/phones")
     * @Template()
     */
    public function indexAction()
    {
        $c = new Client();
        $response = $c->request('GET','http://192.168.33.10/sf3/web/app_dev.php/phones.json');
        $phones = \GuzzleHttp\json_decode($response->getBody()->getContents());

        //dump($phones);

        return ['phones' => $phones];
    }

}
