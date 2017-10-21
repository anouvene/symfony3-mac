<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Ob\HighchartsBundle\Highcharts\Highchart;


class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index1Action(Request $request)
    {
        return $this->render('AppBundle:default:index1.html.twig', []);
    }

    public function index1lightAction(Request $request)
    {
        return $this->render('AppBundle:default:index1_light.html.twig', []);
    }

    public function index2Action(Request $request)
    {
        return $this->render('AppBundle:default:index2.html.twig', []);
    }

    public function index3Action(Request $request)
    {
        return $this->render('AppBundle:default:index3.html.twig', []);
    }

    public function docAction(Request $request)
    {
        return $this->render('AppBundle:default:doc.html.twig', []);
    }


    public function pecAction() {
        return $this->render('AppBundle:default:chart_pec.html.twig', array('chart' => $this->graph()));
    }

    public function resAction() {
        return $this->render('AppBundle:default:chart_res.html.twig', array('chart' => $this->graph()));
    }


    public function graph(){
        $series = array(
            array(
                'name'  => 'Rainfall',
                'type'  => 'column',
                'color' => '#4572A7',
                'yAxis' => 1,
                'data'  => array(49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4),
            ),
            array(
                'name'  => 'Temperature',
                'type'  => 'spline',
                'color' => '#AA4643',
                'data'  => array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6),
            ),
        );

        $yData = array(
            array(
                'labels' => array(
                    'style'     => array('color' => '#AA4643')
                ),
                'title' => array(
                    'text'  => 'Temperature',
                    'style' => array('color' => '#AA4643')
                ),
                'opposite' => true,
            ),
            array(
                'labels' => array(
                    'style'     => array('color' => '#4572A7')
                ),
                'gridLineWidth' => 0,
                'title' => array(
                    'text'  => 'Rainfall',
                    'style' => array('color' => '#4572A7')
                ),
            ),
        );

        $categories = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');

        $ob = new Highchart();
        $ob->chart->renderTo('linechart'); // The #id of the div where to render the chart
        $ob->chart->type('column');
        $ob->title->text('Average Monthly Weather Data for Tokyo');
        $ob->xAxis->categories($categories);
        $ob->yAxis($yData);
        $ob->legend->enabled(false);
        $ob->series($series);

        return $ob;


    }




}
