<?php

namespace Drupal\annonce\Entity\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\Language;

/**
 * Form controller for the Annonce entity edit forms.
 *
 * @ingroup pronostique
 */
class AnnonceForm extends ContentEntityForm {
  /**
   * Overrides Drupal\Core\Entity\EntityFormController::buildForm().
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\annonce\Entity\Annonce */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;

    $form['example_select'] = array(
      '#type' => 'select',
      '#title' => $this->t('Choisissez un sport'),
      '#required' => TRUE,
      '#options' => array(
        'foot' => $this->t('Football'),
        'tennis' => $this->t('Tennis'),
        'rugby' => $this->t('Rugby'),
        'basket' => $this->t('Basket'),
      ),
    );

    $form['championnat'] = array(
      '#type' => 'textfield',
      '#title' => t('Championnat'),
      '#placeholder' => t('Ligue 1, Top14, Rolland Garros...'),
    );

    $form['type_de_pronostique'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t('Type de pronostique'),
      '#placeholder' => t('Victoire, Double Chance, Handicap...'),
    );

    $form['combine'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t('Combiné'),
    );

    $form['opposant_1'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t('Opposant 1'),
      '#placeholder' => t('Arsenal, Federer, Chicago Bulls...'),
    );

    $form['opposant_2'] = array(
      '#type' => 'textfield',
      '#required' => TRUE,
      '#title' => t('Opposant 2'),
      '#placeholder' => t('Manchester United, Gasquet, Spurs...'),
    );

    $form['cote'] = array(
      '#type' => 'number',
      '#required' => TRUE,
      '#title' => t('Côte'),
      '#placeholder' => t('1.36, 2.04, 0.5...'),
    );

    $form['nbr_unite'] = array(
      '#type' => 'number',
      '#required' => TRUE,
      '#title' => t('Nombre d\'unité'),
    );

    $form['date'] = array(
      '#type' => 'datetime',
      '#required' => TRUE,
      '#title' => t('Date et heure'),
    );

    $form['analyse'] = array(
      '#type' => 'textarea',
      '#title' => t('Analyse'),
    );

    return $form;
  }

  /**
   * Overrides \Drupal\Core\Entity\EntityFormController::submit().
   */
  public function submit(array $form, FormStateInterface $form_state) {
    // Build the entity object from the submitted values.
    $entity = parent::submit($form, $form_state);

    return $entity;
  }

  /**
   * Overrides Drupal\Core\Entity\EntityFormController::save().
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = $entity->save();

    if ($status) {
      drupal_set_message($this->t('Saved the %label pronostique.', array(
        '%label' => $entity->label(),
      )));
    }
    else {
      drupal_set_message($this->t('The %label pronostique was not saved.', array(
        '%label' => $entity->label(),
      )));
    }
    $form_state->setRedirect('entity.annonce.canonical', ['annonce' => $entity->id()]);
  }

}
