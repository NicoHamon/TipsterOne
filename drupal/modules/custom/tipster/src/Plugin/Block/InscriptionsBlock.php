<?php

/**
 * @file
 * Contains \Drupal\tipster\Plugin\Block\InscriptionsBlock.
 */

namespace Drupal\tipster\Plugin\Block;



use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Provides a Sessions block.
 *
 * @Block(
 * id = "inscriptions_block",
 * admin_label = @Translation("Bankroll")
 * )
 */


class InscriptionsBlock extends BlockBase{
    /**
     * Implements Drupal\Core\Block\BlockBase::build();
     */

    /* public function blockForm($form, FormStateInterface $form_state) {


         $form['newsletters'] = array(
             '#type' => 'checkboxes',
             '#title' => t('Newsletters'),
             '#options' => array('0'=>'follower','1'=>'tipster'),
             '#required' => TRUE,
         );
         return $form;
     }*/
    public function build(){
        return \Drupal::formBuilder()->getForm('Drupal\tipster\Form\FormChoixProfile');
    }

  /*  protected function blockAccess(AccountInterface $account){
        if ($account->hasPermission('Access Hello')) {
            return AccessResult::allowed();
        }

        return AccessResult::forbidden();
    }*/

}