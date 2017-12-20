<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Node;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\Crawler;
use AppBundle\Manager\DefaultManager;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function collectAction(Request $request)
    {
        /***********************************************************************/
        /*****************************COLLECTEUR********************************/
        /***********************************************************************/
        $crawler = $this->getAppCrawler();
        $result = $crawler->crawl();


        //1 - DRAW WEB GRAPHE

        //2 - Calculate
        //distance moyenne
        //coefficient clusterisation
        //degrès de distribution


        /***********************************************************************/
        /*****************************EXTRACTEUR********************************/
        /***********************************************************************/




        /***********************************************************************/
        /*****************************INTEGRATEUR*******************************/
        /***********************************************************************/



        /***********************************************************************/
        /*****************************INDEXEUR**********************************/
        /***********************************************************************/



        /***********************************************************************/
        /*****************************STOCKER***********************************/
        /***********************************************************************/



        /***********************************************************************/
        /*****************************EXPORTER**********************************/
        /***********************************************************************/


        /***********************************************************************/
        /*****************************ANALYSER**********************************/
        /***********************************************************************/
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

    public function getAppCrawler() {
        return $this->get('app.crawler');
    }
}
