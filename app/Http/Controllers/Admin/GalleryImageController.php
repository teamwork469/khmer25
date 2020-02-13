<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


class GalleryImageController extends CrudController {

  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

  public function setup() 
  {
      $this->crud->setModel("App\Models\Gallery");
      $this->crud->setRoute("admin/gallery");
      $this->crud->setEntityNameStrings('gallery', 'gallery');

      $this->crud->enableExportButtons();
      //$this->crud->setActionsColumnPriority(10000);
      //$this->crud->enableBulkActions();
      $this->crud->enableDetailsRow();
  }

  public function setupListOperation()
  {

    


    $this->crud->addColumn([
      'name' => 'gallery_name', // The db column name
      'label' => "Image", // Table column heading
      'type' => 'Text'
    ]);
    $this->crud->addColumn([
      'name' => 'created_at', // The db column name
      'label' => "created_at", // Table column heading
      'type' => 'Text'
    ]);
    $this->crud->addColumn([
      'name' => 'updated_at', // The db column name
      'label' => "updated_at", // Table column heading
      'type' => 'Text'
    ]);
  }

  public function setupCreateOperation()
  {

    $fields1 = [
        [
          'tab'=>'Gallery',
          'name' => 'gallery_name', // The db column name
          'label' => "Image", // Table column heading
          'type' => 'Text',

          'attributes' => [
            'placeholder' => 'Enter Name',
            'autocomplete'=>'off',
          ],
          'wrapperAttributes' => [
            'class' => 'form-group col-md-12'
          ],
        ],
        [
          'tab'=>'Gallery',
          'name' => 'created_at', // The db column name
          'label' => "created_at", // Table column heading
          'type' => 'date'
        ],
        [
          'tab'=>'Gallery',
          'name' => 'updated_at', // The db column name
          'label' => "updated_at", // Table column heading
          'type' => 'date'
        ],


    ];

    $fields2=[
        [
          ////Field gallery Name
          'tab'=>'Gallery Detail',
          'name' => 'gallery_id',
          'type' => 'text',
          'label' => "Image",
          'attributes' => [
            'placeholder' => 'Some text when empty',
          ],
          'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
          ],
      ]
  ];

    $this->crud->addFields($fields1);
    $this->crud->addFields($fields2);
  }

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}