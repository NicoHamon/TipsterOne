<?php

/**
 * @file
 * Contains \Drupal\tipster\Form\FormChoixProfile.
 */

namespace Drupal\tipster\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Entity\User;
use Drupal\user\UserInterface;
use Drupal\Core\Session\AccountProxyInterface;
use \Drupal\Core\Url;
/**
 * Class FormChoixProfile.
 *
 * @package Drupal\tipster\Form
 */
class FormChoixProfile extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'form_create_bankroll';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $form['button_submit'] = array(
            '#type'=>           'submit',
            '#value'=>          t('Créer ma bankroll'),
        );
        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $current_user = \Drupal::currentUser();
        
    //die()


        $tab_role = $current_user->getRoles();
        if(in_array('tipster',$tab_role)) {
            $profile = 'tipster';
        }
        if(in_array('follower',$tab_role)) {
            $profile = 'follower';
        }
        $url = Url::fromRoute('entity.profile.type.follower.user_profile_form',array('profile_type'=>$profile,'user'=>$current_user->id()));
        $form_state->setRedirect($url->toString());
        $form_state->setRedirecturl($url);
    //          $form_state->setRedirect('entity.profile.add_form');
     //           $_REQUEST['destination'] = '/user/'.$current_user_id.'/'.$profile;

    }
}