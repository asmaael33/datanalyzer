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
    public function indexAction(Request $request)
    {
        //Test connexion à db

        $em = $this->getDoctrine()->getManager();
        $nodeRepo = $em->getRepository(Node::class);
        echo count($nodeRepo->findAll());exit;
        exit('STOP');
        /***********************************************************************/
        /*****************************COLLECTEUR********************************/
        /***********************************************************************/
        $crawler = $this->getAppCrawler();
        $result = $crawler->crawl();



// connexion à une base de données nommée "marie" sur l'hôte "localhost" sur le port "5432"
        /*$conn_string = "host=127.0.0.1 port=5432 dbname=datanalyser user=postgres password=Mq8aw7HJE";
        $dbconn = pg_connect($conn_string) or die ("Nao consegui conectar ao PostGres --> ". pg_last_error($dbconn));
        $select = "SELECT * FROM node";
        $clients = pg_query($dbconn, $select) or die ('Erreur : '.pg_last_error($conn_string));
        $total = pg_num_rows($clients);
        $crawler->crawl();
       */ /*
         $this->results[$url] = array(
                    'url' => $url,
                    'depth' => $depth,
                    'content' => $dom->saveHTML()
                );
         * */
//1 insert data into db datanalyzer
        /*foreach ($this->results as $key => $result) {
            echo $result['url'];exit;
            $sql = "insert into node ()";
        }*/
//2- DRAW WEB GRAPHE


//3 - Calculate
//distance moyenne
//coefficient clusterisation
//degrès de distribution

//4 - Put the code into Symfony2 MVC




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
