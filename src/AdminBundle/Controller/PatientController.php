<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Patient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class PatientController extends Controller
{
    /**
     * @Route("/patient", name = "patient_list")
     */
    public function listAction()
    {
        $patient_list = $this->getDoctrine()->getRepository('AdminBundle:Patient')->findAll();
        return $this->render('AdminBundle:Patient:index.html.twig',array('patient' => $patient_list ));
    }

    /**
     * @Route("/patient/create" , name= "patient_create")
     */
    public function createAction(Request $request)
    {
        $patient = new Patient;

        $form = $this->createFormBuilder($patient)
            ->add('first_name',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('last_name',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('dob',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('gender',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('bsn',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('therapist',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('email',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('land_line',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('mobile_phone',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('address',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('zip_code',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('location',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('country',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('practitioner_name',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('Insurer',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('Policy_Number',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('add_insured',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('got_to_know_from',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('value',TextType::class,array('attr'=> array('class' => 'form-control col-sm-4 control-label')))
            ->add('save',SubmitType::class,array('label'=> 'Add Patient','attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            DIE('Submited');
        }

        return $this->render('AdminBundle:Patient:create.html.twig',array('form' => $form->createView()));
    }

    /**
     * @Route("/patient/edit/{id}" ,name = "patient_edit")
     */
    public function editAction($id, Request $request)
    {

        return $this->render('AdminBundle:Patient:edit.html.twig');
    }

    /**
     * @Route("/patient/detail/{id}" ,name = "patient_edit")
     */
    public function detailAction($id, Request $request)
    {

        return $this->render('AdminBundle:Patient:detail.html.twig');
    }

}
